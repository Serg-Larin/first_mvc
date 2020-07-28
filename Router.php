<?php

class Router
{
    private $uri;

    private $routes;

    public function __construct()
    {
        $this->uri = explode('/', $_SERVER['REQUEST_URI']);
        $arr = require_once 'routes.php';
        foreach ($arr as $route => $val){

            $this->regular($route,$val);
        }
    }

    public function regular($route,$params){
        $route = '#^'.$route.'$#';
        $this->routes[$route]=$params;
    }

    public function maches(){
        $url = trim($_SERVER['REQUEST_URI'],'/');
        foreach ($this->routes as $route => $val){
            if(preg_match($route,$url,$matches)){

                array_shift($matches);
                array_shift($matches);
//                Helper::out($this->routes);
                $params=[];
                for ($i=0;$i<count($matches);$i++){
                    $params['arg'.($i+1)] = $matches[$i];
                }
                $matches = array_merge($this->routes[$route],$params);
                return $matches;
            }
        }
        die(PAGE_NOT_FOUND);
    }

    public function route()
    {
        $request = $this->maches();

        $path = 'controllers/'.$request['controller'].'.php';
        if(!file_exists($path)) die(PAGE_NOT_FOUND);

        require_once $path;

        $controller = array_shift($request);

        $action = array_shift($request);

        if(isset($request['middleware'])){
            $middleware = array_shift($request);
            $middleware_array = include_once 'components/middleware_array.php';
            include_once 'middleware/'.$middleware.'.php';
            $middleware_obj = new $middleware_array[$middleware];

        }

        $model = $controller.'Model';

        $path = $controller.'/'.$action;

        $controller = 'controllers'.'\\'.$controller;

        $obj = new $controller($path,$model);

        call_user_func_array([$obj, $action],$request);

    }
}