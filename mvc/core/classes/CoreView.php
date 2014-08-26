<?php

namespace Core\Classes;

class CoreView 
{
    public $views_folder = null;
    public $file_path = null;
    public $template = null;
    public $data = array();
    
    
    public static function make($name = null, $data = array(), $template = 'template') {
        return new static($name, $data, $template);
    }
    
    public function __construct($name = null, $data = array(), $template = null)
    {
        $this->views_folder = \Config::get('paths.views');
        
        $this->setData($data);
        $this->setTemplate($template);
        $this->setFile($name);
        $this->render();
    }
    
    public function setData($data = array())
    {
        if(is_array($this->data)) {
            $this->data = $data;
        }
        return $this;
    }
    public function setTemplate($name)
    {
        $this->template = $name;
        return $this;
    }
    
    public function setFile($name)
    {
        $file_path = $this->views_folder . $name . '.php';
        if (!file_exists($file_path)) {
            throw new \Exception('non_existent_file');
        }
        $this->file_path = $file_path;
        return $this;
    }
    
    public function render()
    {
        if (empty($this->template)) {

            extract($this->data, EXTR_REFS);
            
            require $this->file_path;

        } else {
            
            $content = $this->process();
            require $this->views_folder . $this->template . '.php';
            
        }
    }
    
    private function process()
    {
        extract($this->data, EXTR_REFS);
        
        ob_start();

        try
        {
            include $this->file_path;
        }
        catch (\Exception $err)
        {
            ob_end_clean();

            throw $err;
        }

        return ob_get_clean();
    }
}
