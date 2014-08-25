<?php

class Database {

    private $pdo = null;
    private $instance = NULL;

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
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->pdo = new PDO('odbc:Driver={SQL Server};Server=' . $host . ';Database=' . $database, $username, $password, $options);
        } catch (Exception $sql_err) {
            die('SYS Error: Please contact the system administrator!!!');
        }
        return $this->pdo;
    }

    /**
     * dbQuery()
     *
     * @param string $sql An SQL string
     * @param array $data Paramters to bind
     * @return Query string
     */
    public function dbQuery($sql, $data) {
        $query = $this->_query($sql, $data);
        return $query;
    }

    /**
     * select()
     *
     * @param string $sql An SQL string
     * @param array $data Paramters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return array or false
     */
    public function select($sql, $data = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $query = $this->_query($sql, $data);
        $query->setFetchMode($fetchMode);
        $rows = array();
        while ($row = $query->fetch()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * insert()
     * 
     * @param string $table A name of a table
     * @param string $columns Affected columns (username,password,email)
     * @param string $values Values inserted into the columns (:username,:password,:email) or (?,?,?)
     * @param array $data Paramters to bind (array('username' => 'myusername')) or(array('myusername'))
     * @return true
     */
    public function insert($table, $data) {
        $columns = ' ';
        $values = ' ';
        foreach ($data as $field_name => $field_value) {
            if ($field_name != 'id') {
                $columns .= '`' . $field_name . '`, ';
                $values .= ':' . $field_name . ', ';
            }
        }
        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');
        $sql = 'INSERT INTO ' . $table . ' (' . $columns . ') VALUES (' . $values . ')';
        $this->_query($sql, $data);
        return true;
    }

    /**
     * update()
     * 
     * @param string $table A name of a table
     * @param string $fields Affected columns and their values (test=:test) or (test=?)
     * @param string $where the "WHERE" query part doesn't need "WHERE" (username=:username) or (username=?)
     * @param array $data Paramters to bind (array('username' => 'myusername')) or(array('myusername'))
     * @return true
     */
    public function update($table, $where, $data) {
        $fields = ' ';
        foreach ($data as $field_name => $field_value) {
            if ($field_name != 'id') {
                $fields .= $field_name . '= :' . $field_name . ', ';
            }
        }
        $fields = rtrim($fields, ', ');
        $sql = 'UPDATE ' . $table . ' SET ' . $fields . ' WHERE ' . $where;
        $this->_query($sql, $data);
        return true;
    }

    /**
     * numRows()
     * 
     * @param string $table A name of a table
     * @param string $where the "WHERE" query part !!!Needs!!! "WHERE" (WHERE username=:username) or (WHERE username=?)
     * @param array $data Paramters to bind
     * @return integer Counted Rows
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
     * @param string $table A name of a table
     * @param string $where the "WHERE" query part doesn't need "WHERE" (username=:username) or (username=?)
     * @param integer $limit
     * @return true
     */
    public function delete($table, $where, $data = array(), $limit = 1) {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where . ' LIMIT ' . $limit;
        $this->_query($sql, $data);
        return true;
    }

    /**
     * _query() - private
     *
     * @param string $sql An SQL string
     * @param array $data Paramters to bind
     * @return Query string
     */
    private function _query($sql, $data) {
        $query = $this->pdo->prepare($sql);
        $value_type = NULL;
        foreach ($data as $key => $value) {
            if (is_null($value_type)) {
                switch ($value) {
                    case is_int($value):
                        $value_type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $value_type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $value_type = PDO::PARAM_NULL;
                        break;
                    default:
                        $value_type = PDO::PARAM_STR;
                }
            }
            $key = trim($key, ':');
            $query->bindValue(':' . $key, $value, $value_type);
        }

        $query->execute();
        return $query;
    }

}
