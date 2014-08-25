<?php
namespace Core\Classes;

class CoreModelORM
{
    protected $primary_key = null;
    protected $table = null;
    protected $db_driver = null; // valid types are MySQL,MSSQL

    public function db($driver = null)
    {
        if(!empty($driver)){
            $this->db_driver = $driver;
        }
        $db_driver = "\\" . $this->db_driver;
        return new $db_driver();
    }
    
    function select($what = '*', $fetch_mode = null)
    {
        $select = $this->db()->select($what)->from($this->table);
        
        if(!empty($fetch_mode)){
            $build = $select->build(true, $fetch_mode);
        } else {
           $build = $select->build(true);
        }
        
        return $build;
    }

}
