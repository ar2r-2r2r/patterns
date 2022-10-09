<?php
namespace Core;

use App\Config;
use PDO;

class Database
{
    public static $instance;
    private $link;
    private $db;

    private function __construct()
    {
    }
    public static function getInstance()
    {
        if(self::$instance===null){
            self::$instance=new self();
            
        }
        return self::$instance;
    }
    
    private function __clone()
    {
    }
    private function __wakeup()
    {
       
    }
    
    

    public function connect()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
            $this->link = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

            // Throw an Exception when an error occurs
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->link;
    }

    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    public function query($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if ($result == false) {
            return [];
        }
        return $result;
    }
}
