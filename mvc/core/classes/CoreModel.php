<?php
namespace Core\Classes;

class CoreModel
{
    protected $use_orm = false;
    protected $primary_key = null;
    protected $table = null;
    protected $db_driver = null; // valid types are MySQL,MSSQL

    private function isOrm()
    {
        if (!$this->use_orm) {
            throw new \Exception('ORM is not enable!');
        }
    }
    
    public function db($driver = null)
    {
        $this->isOrm();

        if(!empty($driver)){
            $this->db_driver = $driver;
        }
        $db_driver = "\\" . $this->db_driver;
        return new $db_driver();
    }
    
    public function select($what = '*', $fetch_mode = null)
    {
        $this->isOrm();
        $select = $this->db()->select($what)->from($this->table);
        
        if(!empty($fetch_mode)){
            $build = $select->build(true, $fetch_mode);
        } else {
           $build = $select->build(true);
        }
        
        return $build;
    }
}
