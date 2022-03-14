<?php

class Router {

    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $routeConfig = require __DIR__ . '/../config/route.php';
        foreach ($routeConfig as $key => $value) {
            $this->add($key, $value);
        }
        
    }

    public function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match(){
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;

    }

    public function run()
    {
       if($this->match()){
        $path = require __DIR__ . '/../views/'.$this->params['view'].'.php';
       }
       else{
        $path = require __DIR__ . '/../views/404.php';
       }  
       
    }

}

?>