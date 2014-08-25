<?php
namespace Core\Classes\DB;

class MySQL extends \PDO 
{
    private $query = null;
    private $params = array();
    
    public function __construct()
    {
	$host = '127.0.0.1';
	$username = 'root';
	$password = 'toor';
	$database = 'test';
        
        $options = array(
                \PDO::ATTR_PERSISTENT => true, 
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );
	parent::__construct('mysql:host='.$host.';dbname='.$database, $username, $password, $options);
    }
    
    public function select($what = '*')
    {
        $this->query = 'SELECT ' . $what;
        return $this;
    }
    
    public function from($table)
    {
        $this->query = $this->query . ' FROM ' . $table;
        return $this;
    }
    
    public function where($field, $sign, $value)
    {
        $field_value = lcfirst($field);
        $params = array($field_value => $value);
        $this->params = array_merge($this->params, $params);
        $this->query = $this->query . ' WHERE ' . $field . $sign . ':' . $field_value;
        return $this;
    }
    
    public function build($fetch = true, $fetch_mode = \PDO::FETCH_ASSOC)
    {
        $stmt = $this->prepare($this->query);
        
        foreach ($this->params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        $stmt->execute();
        if($fetch === true) {
            return $stmt->fetchAll($fetch_mode);
        }
        return $stmt;
    }
}
