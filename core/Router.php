<?php
namespace App\Core;
class Router {
    protected $routes = ["GET" => [], "POST" => []];
    
    public function direct($uri, $method){
        if (array_key_exists($uri, $this->routes[$method])){
            $data = explode("@", $this->routes[$method][$uri]);
            return $this->callAction($data[0], $data[1]);  
        } else {
            throw new Exception("The URI cannot be found");
        }
    }
    
    public function post($route){
        $this->routes["POST"] = array_merge($this->routes["POST"], $route);
    }
    
    public function get($route){
        $this->routes["GET"] = array_merge($this->routes["GET"], $route);
    }
    
    protected function callAction($controller, $action){
        $controller = "App\\Controllers\\$controller";
        $controller = new $controller;
        
        if(method_exists($controller, $action)){
            $controller->$action();
        } else {
            throw new Exception("$action Action doesnt exist in $controller Controller");
        }
    }
}

