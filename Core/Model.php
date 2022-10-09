<?php

namespace Core;

use Core\Database;

class Model
{
    protected $db;
    /**
     * Get the PDO database connection
     *
     * @return mixed
     */

    public function __construct()
    {
        $base=Database::getInstance();
        $this->db=$base->connect();
    }
    
    protected function getConnect(): Database{
        return $this->db;
    }

    public function sortAscDB(string $column, string $table){
        
        $result = $this->db->query("SELECT * FROM `".$table."` ORDER BY " . $column . " ASC ");
        return $result;
    }
    public function sortDescDB(string $column, string $table)
    {
        $result = $this->db->query("SELECT * FROM `".$table."` ORDER BY " . $column . " DESC ");
        return $result;
    }
    
}
