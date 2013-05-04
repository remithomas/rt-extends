<?php

namespace RtExtends\Db\Sql;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\StatementContainerInterface;
use Zend\Db\Adapter\ParameterContainer;
use Zend\Db\Adapter\Platform\PlatformInterface;
use Zend\Db\Adapter\Platform\Sql92;

use Zend\Db\Sql\Insert as ZendInsert;

class DuplicateInsert extends ZendInsert{
    
    /**
     * Constants 
     */
    const SPECIFICATION_INSERTDUPLICATEKEY = 'insert';
    const VALUES_DUPLICATEKEY = "duplicatekey";
    
    /**
     * @var array Specification array
     */
    protected $duplicatespecifications = array(
        self::SPECIFICATION_INSERTDUPLICATEKEY => 'INSERT INTO %1$s (%2$s) VALUES (%3$s) ON DUPLICATE KEY UPDATE %4$s'
    );
    
    /**
     * Constructor
     *
     * @param  null|string|TableIdentifier $table
     */
    public function __construct($table = null)
    {
        parent::__construct($table);
    }
    
    /**
     * Prepare statement
     *
     * @param  AdapterInterface $adapter
     * @param  StatementContainerInterface $statementContainer
     * @return void
     */
    public function prepareStatement(AdapterInterface $adapter, StatementContainerInterface $statementContainer)
    {
        $driver   = $adapter->getDriver();
        $platform = $adapter->getPlatform();
        $parameterContainer = $statementContainer->getParameterContainer();

        if (!$parameterContainer instanceof ParameterContainer) {
            $parameterContainer = new ParameterContainer();
            $statementContainer->setParameterContainer($parameterContainer);
        }

        $table = $this->table;
        $schema = null;

        // create quoted table name to use in insert processing
        if ($table instanceof TableIdentifier) {
            list($table, $schema) = $table->getTableAndSchema();
        }

        $table = $platform->quoteIdentifier($table);

        if ($schema) {
            $table = $platform->quoteIdentifier($schema) . $platform->getIdentifierSeparator() . $table;
        }

        $columns = array();
        $values  = array();

        foreach ($this->columns as $cIndex => $column) {
            $columns[$cIndex] = $platform->quoteIdentifier($column);
            if (isset($this->values[$cIndex]) && $this->values[$cIndex] instanceof Expression) {
                $exprData = $this->processExpression($this->values[$cIndex], $platform, $driver);
                $values[$cIndex] = $exprData->getSql();
                $parameterContainer->merge($exprData->getParameterContainer());
            } else {
                $values[$cIndex] = $driver->formatParameterName($column);
                if (isset($this->values[$cIndex])) {
                    $parameterContainer->offsetSet($column, $this->values[$cIndex]);
                } else {
                    $parameterContainer->offsetSet($column, null);
                }
            }
        }

        $sql = sprintf(
            $this->duplicatespecifications[self::SPECIFICATION_INSERTDUPLICATEKEY],
            $table,
            implode(', ', $columns),
            implode(', ', $values),
            implode(",", array_map(array($this, "mapValue"), $columns))
        );

        $statementContainer->setSql($sql);
    }

    /**
     * Get SQL string for this statement
     *
     * @param  null|PlatformInterface $adapterPlatform Defaults to Sql92 if none provided
     * @return string
     */
    public function getSqlString(PlatformInterface $adapterPlatform = null)
    {
        $adapterPlatform = ($adapterPlatform) ?: new Sql92;
        $table = $this->table;
        $schema = null;

        // create quoted table name to use in insert processing
        if ($table instanceof TableIdentifier) {
            list($table, $schema) = $table->getTableAndSchema();
        }

        $table = $adapterPlatform->quoteIdentifier($table);

        if ($schema) {
            $table = $adapterPlatform->quoteIdentifier($schema) . $adapterPlatform->getIdentifierSeparator() . $table;
        }

        $columns = array_map(array($adapterPlatform, 'quoteIdentifier'), $this->columns);
        $columns = implode(', ', $columns);

        $values = array();
        foreach ($this->values as $value) {
            if ($value instanceof Expression) {
                $exprData = $this->processExpression($value, $adapterPlatform);
                $values[] = $exprData->getSql();
            } elseif ($value === null) {
                $values[] = 'NULL';
            } else {
                $values[] = $adapterPlatform->quoteValue($value);
            }
        }

        $values = implode(', ', $values);
        $valuesDuplicate = implode(",", array_map(array($this, "mapValue"), $columns));

        return sprintf($this->duplicatespecifications[self::SPECIFICATION_INSERTDUPLICATEKEY], $table, $columns, $values, $valuesDuplicate);
    }
    
    private function mapValue($columns){
        return $columns."=VALUES(".$columns.")";
    }
}