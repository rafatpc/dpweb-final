<?php
namespace Core\Classes\DB;

class PDODriver extends \PDO 
{
    private $query = null;
    private $params = array();
    
    public function __construct()
    {
	$username = \Config::get('database.username');
	$password = \Config::get('database.password');
	$dsn = \Config::get('database.dsn');
        $options = \Config::get('database.options');
        
        parent::__construct($dsn, $username, $password, $options);
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
        $field_value = strtolower($field);
        
        $params = array($field_value => $value);
        
        $this->params = array_merge($this->params, $params);
        
        $this->query = $this->query . ' WHERE ' . $field . $sign . ':' . $field_value;
        
        return $this;
    }
    
    public function insert($table, $data = array())
    {
        $params = array_change_key_case($data, CASE_LOWER);
        
        $this->query = 'INSERT INTO ' . $table;
        $this->query .= " ([".implode("], [", array_keys($data))."])";
        $this->query .= " VALUES (:" . implode(", :", array_keys($params)) . ") ";
        
        $this->params = array_merge($this->params, $params);
        
        return $this;
    }
    
    public function update($table, $data = array())
    {
        $params = array_change_key_case($data, CASE_LOWER);
        
        $this->query = 'UPDATE ' . $table . ' SET ';
        $sets = null; 
        foreach(array_keys($data) as $key) {
            $sets .= $key. '=:'. strtolower($key) .', ';
        }
        $this->query .= rtrim($sets, ', ');
        $this->params = array_merge($this->params, $params);
        
        return $this;
    }
    
    public function build($fetch = false, $fetch_mode = \PDO::FETCH_ASSOC)
    {
        try {
            $stmt = $this->prepare($this->query);

            foreach ($this->params as $key => $value) {
                $key = trim($key, ':');
                $stmt->bindValue(':' . $key, $value);
            }

            $stmt->execute();
            if($fetch === true) {
                return $stmt->fetchAll($fetch_mode);
            }
        } catch (\Exception $err) {
            throw new \Exception($err->getMessage(), (int) $err->getCode());
        }
        return $stmt;
    }
}
