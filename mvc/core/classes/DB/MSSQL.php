<?php
namespace Core\Classes\DB;

class MSSQL extends \PDO 
{
    private $query = null;
    private $params = array();
    
    public function __construct()
    {
    	$host = \Config::get('database.host');
    	$username = \Config::get('database.username');
    	$password = \Config::get('database.password');
    	$database = \Config::get('database.dbname');
    	
        $options = array(
                \PDO::ATTR_PERSISTENT => true, 
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );
        
	mssql_connect($host, $username, $password);
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
    
    public function build($fetch = true, $fetch_mode = 'assoc')
    {
        $query = $this->query;
        foreach ($this->params as $key => $value) {
			$query = str_replace(':'. $key, $value, $this->query);
        }
        $stmt = mssql_query($query);

        if($fetch === true) {
    	 	$fetching = 'mssql_' . $fetch_mode();
            return $fetching($stmt);
        }
        return $stmt;
    }
}
