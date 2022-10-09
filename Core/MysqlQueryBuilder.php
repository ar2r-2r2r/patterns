<?php
namespace Core;
use Core\SQLQueryBuilder;

class MysqlQueryBuilder implements SQLQueryBuilder
{
    protected $query;
    protected function reset():void
    {
        $this->query=new \stdClass();
    }
    public function select(string $table, array $fields):SQLQueryBuilder
    {
        $this->reset();
        $this->query->base="SELECT".implode(",",$fields)." FROM " . $table;
        $this->query->type= 'select';
    
        return $this;
    }
 
    public function delete(string $table, string $fields):SQLQueryBuilder
    {
        $this->reset();
        $this->query->base="DELETE". $fields ." FROM " . $table;
        $this->query->type= 'delete';
    
        return $this;
    }

    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        if(!in_array($this->query->type, ['select', 'delete'])){
            throw new \Exception("WHERE can only be added to SELECT, DELETE");
        }
        $this->query->where[]="$field $operator '$value'";
        return $this;
    }

    public function getSQL(): string
    {
        $query=$this->query;
        $sql=$query->base;
        if(!empty($query->where)){
            $sql.=" WHERE " . implode(' AND ', $query->where);
        }
        $sql .=";";
        return $sql;
    }
}