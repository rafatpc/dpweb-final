<?php

namespace DPWeb\Application;

class Database {

    private $cnf = null;
    private $dblink = array();
    public $escape = array(';', '\'', '--', '/', '*', '[', ']', '%', '\\');
    public static $instance = null;

    private function __construct() {
        $this->cnf = \DPWeb\Application\Config::getInstance()->main;
        $this->connect($this->cnf['host'], $this->cnf['user'], $this->cnf['pass']);
        $this->setDatabase($this->cnf['database']);
    }

    public function connect($host, $user, $pass) {
        $this->dblink[] = mssql_connect($host, $user, $pass);
        return (count($this->dblink) - 1);
    }

    public function setDatabase($db, $link = 0) {
        if (!isset($this->link[$link])) {
            $link = 0;
        }

        mssql_select_db($db, $this->dblink[$link]);
    }

    public function query($query, $easing = 0, $link = 0) {
        $result = mssql_query($query, $this->dblink[$link]);

        if (!$result) {
            throw new \Exception('Query failed: ' . mssql_get_last_message());
        }

        if ($easing === 1) {
            $result = $this->numRows($result);
        } else if ($easing === 2) {
            $result = $this->fetchArray($result);
        }

        return $result;
    }

    public function fetchArray($mssql_resource) {
        if (!is_resource($mssql_resource)) {
            throw new \Exception('fetchArray() expected argument one to be resource, ' . gettype($mssql_resource) . ' given.');
        }

        $result = mssql_fetch_array($mssql_resource);

        return $result;
    }

    public function numRows($mssql_resource) {
        if (!is_resource($mssql_resource)) {
            throw new \Exception('numRows() expected argument one to be resource, ' . gettype($mssql_resource) . ' given.');
        }

        $result = mssql_num_rows($mssql_resource);

        return $result;
    }
    
    public function escape($string) {
        $clone = $string;
        $string = str_replace($this->escape, '', strtolower($string));
        
        if(strtolower($clone) === $string){
            return $clone;
        } else {
            return false;
        }
    }

    public function __destruct() {
        for ($i = 0; $i < count($this->dblink); $i++) {
            mssql_close($this->dblink[$i]);
        }
    }

    /**
     * 
     * @return Database
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database;
        }

        return self::$instance;
    }

}
