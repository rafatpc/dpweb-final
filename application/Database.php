<?php

namespace DPWeb\Application;

class Database {

    private $pdo = null;
    private $instance = NULL;
    private $query_string = NULL;
    private $data = NULL;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (self::$instance === NULL) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function connect($host, $username, $password, $database) {
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->pdo = new \PDO('odbc:Driver={SQL Server};Server=' . $host . ';Database=' . $database, $username, $password, $options);
        } catch (Exception $sql_err) {
            die('SYS Error: Please contact the system administrator!!!');
        }
        return $this->pdo;
    }

    /**
     * query()
     *
     * @param string
     * @param array
     * @return object
     */
    public function query($sql, $data)
    {
        $this->query_string = $sql;
        $this->data = $data;
        return $this;
    }

    /**
     * select()
     *
     * @param string
     * @return object
     */
    public function select($what="*")
    {
        $this->query_string = "SELECT " . $what;
        return $this;
    }

    /**
     * from()
     *
     * @param string 
     * @return object
     */
    public function from($table)
    {
        $this->query_string = $this->query_string . " FROM " . $table;
        return $this;
    }
    
    /**
     * where()
     *
     * @param string 
     * @param string 
     * @param array
     * @return object
     */
    public function where($what, $sign, $value)
    {
        $value_key = strtolower($what);
        $this->query_string = $this->query_string . " WHERE " . $what . $sign .":" . $value_key;
        $this->data = array_merge($this->data, array($value_key => $value));
        return $this;
    }
    
    /**
     * andWhere()
     *
     * @param string 
     * @param string 
     * @param array
     * @return object
     */
    public function andWhere($what, $sign, $value)
    {
        $value_key = strtolower($what);
        $this->query_string = $this->query_string . " AND " . $what . $sign .":" . $value_key;
        $this->data = array_merge($this->data, array($value_key => $value));
        return $this;
    }
    
    /**
     * orWhere()
     *
     * @param string 
     * @param string 
     * @param array
     * @return object
     */
    public function orWhere($what, $sign, $value)
    {
        $value_key = strtolower($what);
        $this->query_string = $this->query_string . " OR " . $what . $sign .":" . $value_key;
        $this->data = array_merge($this->data, array($value_key => $value));
        return $this;
    }

    /**
     * insert()
     * 
     * @param string 
     * @param array
     * @return object
     */
    public function insert($table, $data)
    {
        $columns = ' ';
        $values = ' ';
        foreach ($data as $field_name => $field_value) {
            $columns .= '[' . $field_name . '], ';
            $values .= ':' . strtolower($field_name) . ', ';
        }
        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');
        
        $this->query_string = 'INSERT INTO ' . $table . ' (' . $columns . ') VALUES (' . $values . ')';
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    /**
     * update()
     * 
     * @param string
     * @param string $where = "Username=:username"
     * @param array
     * @return object
     */
    public function update($table, $where, $data) {
        $fields = ' ';
        foreach ($data as $field_name => $field_value) {
            $fields .= $field_name . '= :' . $field_name . ', ';
        }
        
        $fields = rtrim($fields, ', ');
        
        $this->query_string = 'UPDATE ' . $table . ' SET ' . $fields . ' WHERE ' . $where;
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    /**
     * numRows()
     * 
     * @param string 
     * @param string
     * @param array 
     * @return integer
     */
    public function numRows($table, $where = null, $data = array()) {
        $sql = 'SELECT COUNT(*) FROM ' . $table . ' ' . $where;
        $query = $this->_query($sql, $data);
        $num = $query->fetchColumn();
        return $num;
    }

    /**
     * delete()
     * 
     * @param string
     * @param string
     * @param array
     * @return true
     */
    public function delete($table, $where, $data = array()) {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where;
        $this->_query($sql, $data);
        return true;
    }

    /**
     * _query() - private
     *
     * @param string
     * @param array
     * @return Query string
     */
    private function _query($sql = null, $data = array())
    {
        $query = $this->pdo->prepare($sql);
        
        $value_type = NULL;
        foreach ($data as $key => $value) {
            if (is_null($value_type)) {
                switch ($value) {
                    case is_int($value):
                        $value_type = \PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $value_type = \PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $value_type = \PDO::PARAM_NULL;
                        break;
                    default:
                        $value_type = \PDO::PARAM_STR;
                        break;
                }
            }
            $key = trim($key, ':');
            $query->bindValue(':' . $key, $value, $value_type);
        }

        return $query->execute();
    }
    
    public function execute($fetch = false, $mode = \PDO::FETCH_ASSOC)
    {
        $query = $this->_query($this->query_string, $this->data);
        
        if($fetch === true) {
            $query = $query->fetchAll($mode);
        }
        
        return $query;
    }
    
}
