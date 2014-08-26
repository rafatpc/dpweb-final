<?php
namespace Core\Classes;

class HttpRequest {

    protected $controllers_folder = null;
    protected $sub_folder = null;
    protected $uri_parts = array();
    protected $controller = null;
    protected $current = null;
    protected $action = null;
    protected $params = array();

    public function __construct(){}
    
    public function setConfig($data = array())
    {
        $this->sub_folder = $data['sub_web_folder'];
        $this->controller = $data['default_controller'];
        $this->action = $data['default_method'];
        $this->controllers_folder = $data['controllers_folder'];
        return $this;
    }
    
    public function httpLoader()
    {
        $this->explodeHttpRequest()->parseHttpRequest()->routeRequest();
    }
    
    private function explodeHttpRequest()
    {
        $string = $_SERVER['REQUEST_URI'];
        
        if(preg_match('/[^a-zA-Z0-9_\/]/', $string)) {
            throw new \Exception('The requested page is not found.',404);
        }
        
        if (strpos($string, $this->sub_folder) === 0){
            $string = substr($string, strlen($this->sub_folder));
        }
        
        $this->uri_parts = $string ? explode('/', rtrim($string,'/')) : array();
        return $this;
    }

    private function parseHttpRequest()
    {
        $this->params = array();
        $page = $this->uri_parts;
        if (isset($page[0])) {
            $this->controller = ucfirst($page[0]);
        }
        if (isset($page[1])) {
            $this->action = (isset($page[1])) ? $page[1] : 'index';;
        }
        if (isset($page[2])) {
            $this->params = array_slice($page, 2);
        }
        return $this;
    }

    private function routeRequest()
    {
        $file_path = $this->controllers_folder . $this->controller . '.php';

        if(file_exists($file_path))
        {
            require_once $file_path;

            if(class_exists($this->controller)) {
                $this->current = new $this->controller();

                if(is_subclass_of($this->current, 'Controller')) {
                    
                    if((method_exists($this->current, $this->action)) && (strncmp($this->action, '_', 1) != 0)) {
                        $this->methodParameters();
                    } else {
                        throw new \Exception('The method '. $this->controller . '::' . $this->action . ' doesn&#39;t exists!', 404);
                    }
                } else {
                    throw new \Exception($this->controller .' doesn&#39;t extends Controller!', 404);
                }
            } else { 
                throw new \Exception('Controller class doesn&#39;t exists: ' . $this->controller, 404); 
            }
        } else {
            throw new \Exception('Controller file not found: ' . $this->controller, 404);
        }
        return $this;
    }
    
    private function methodParameters()
    {
        $total_pages = count($this->params);
        switch($total_pages)
        {
            case 1:
                $this->current->{$this->action}($this->params[0]);
                break;
            case 2:
                $this->current->{$this->action}($this->params[0], $this->params[1]);
                break;
            case 3:
                $this->current->{$this->action}($this->params[0], $this->params[1], $this->params[2]);
                break;
            case 4:
                $this->current->{$this->action}($this->params[0], $this->params[1], $this->params[2], $this->params[3]);
                break;
            case 5:
                $this->current->{$this->action}($this->params[0], $this->params[1], $this->params[2], $this->params[3], $this->params[4]);
                break;
            default:
                $this->current->{$this->action}();
                break;
        }
    }

}
