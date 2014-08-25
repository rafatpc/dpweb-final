<?php
namespace Core\Classes;

class CoreController 
{
    public $models = array();
    public $db = NULL;
    public $models_folder = null;
    public $view = null;

    public function __construct() {
        $this->models_folder = APP . 'models/';
        $driver = '\\' . \Config::get('database.driver');
        $this->db = new $driver();
    }

    public function loadModel($name)
    {
        $model = ucfirst($name);
        $file_path = $this->models_folder . $name . '.php';
        
        if (empty($name))
        {
            throw new \Exception('empty_name');
        }
        if(is_subclass_of($name, 'Model'))
        {
            throw new \Exception($model . ' doesn&#39;t extends Model.');
        }
        
        if (in_array(lcfirst($name), $this->models)) {
            throw new \Exception('already_is_loaded');
        }

        if (file_exists($file_path)) {
            require $file_path;
            $this->models[lcfirst($name)] = new $model();
        } else {
            throw new \Exception('non_existent_file');
        }
    }
}
