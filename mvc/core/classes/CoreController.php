<?php
namespace Core\Classes;

class CoreController 
{
    private $models = array();
    public $db = NULL;
    public $models_folder = null;
    public $view = null;

    public function __construct() {
        $this->models_folder = \Config::get('paths.models');
        $driver = '\\' . \Config::get('database.driver');
        $this->db = new $driver();
    }

    public function model($name)
    {
        $model = ucfirst($name);
        $file_path = $this->models_folder . $name . '.php';
        
        if (empty($name))
        {
            throw new \Exception('empty_name');
        }
        
        if (array_key_exists(strtolower($name), $this->models)) {
            return $this->models[strtolower($name)];
        }

        if (file_exists($file_path)) {
            require $file_path;
            if(!is_subclass_of($name, 'Model'))
            {
                throw new \Exception($model . ' doesn&#39;t extends Model.');
            }
            return $this->models[strtolower($name)] = new $model();
        } else {
            throw new \Exception('non_existent_file');
        }
    }
}
