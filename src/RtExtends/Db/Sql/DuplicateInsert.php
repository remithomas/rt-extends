<?php

/**
 * Insert on duplicate class
 * 
 * @author Remi THOMAS
 */

namespace RtExtends\Db\Sql;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\StatementContainerInterface;
use Zend\Db\Adapter\ParameterContainer;
use Zend\Db\Adapter\Platform\PlatformInterface;
use Zend\Db\Adapter\Platform\Sql92;

use Zend\Db\Sql\Insert as ZendInsert;

/**
 * DuplicateInsert class
 */
class DuplicateInsert extends ZendInsert{
    
    /**
     * Duplicate columns
     * @var array 
     */
    protected $duplicateColumns;
    
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
        parent::prepareStatement($adapter, $statementContainer);
        $statementContainer->setSql($sql . "ON DUPLICATE KEY UPDATE ".implode(",", array_map(array($this, "mapValue"), $this->duplicateColumns)));
    }

    /**
     * Get SQL string for this statement
     *
     * @param  null|PlatformInterface $adapterPlatform Defaults to Sql92 if none provided
     * @return string
     */
    public function getSqlString(PlatformInterface $adapterPlatform = null)
    {
        return parent::getSqlString($adapterPlatform)  . " ON DUPLICATE KEY UPDATE ".implode(",", array_map(array($this, "mapValue"), $this->duplicateColumns));
    }
    
    /**
     * Map action
     * @param string $columns
     * @return string 
     */
    private function mapValue($columns){
        return "`".$columns."`=VALUES(`".$columns."`)";
    }
    
    public function duplicateColumns($columns = array()){
        $this->duplicateColumns = $columns;
        return $this;
    }
}