<?php
namespace Core;

interface SQLQueryBuilder
{
    public function select(string $table, array $fields): SQLQueryBuilder;
    public function delete(string $table, string $fields): SQLQueryBuilder;
    public function where(string $field, string $value, string $operator = '='):SQLQueryBuilder;
    public function getSQL():string;
}
