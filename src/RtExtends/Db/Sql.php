<?php

namespace RtExtends\Db;

use Zend\Db\Sql\Sql as ZendSql;

use RtExtends\Db\Sql\DuplicateInsert;

class Sql extends ZendSql {
    
    /**
     * 
     * @param string $table
     * @return \RtExtends\Db\Sql\DuplicateInsert
     * @throws Exception\InvalidArgumentException
     */
    public function duplicateInsert($table = null){
        if ($this->table !== null && $table !== null) {
            throw new Exception\InvalidArgumentException(sprintf(
                'This Sql object is intended to work with only the table "%s" provided at construction time.',
                $this->table
            ));
        }
        return new DuplicateInsert(($table) ?: $this->table);
    }
}