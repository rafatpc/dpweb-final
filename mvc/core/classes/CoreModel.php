<?php
namespace Core\Classes;

class CoreModel
{
    public $db = null;

    public function __construct($driver = null)
    {
        $driver = '\\' .\Config::get('database.driver');
        $this->db = new $driver();
    }
}
