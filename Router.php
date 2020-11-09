<?php


class Router
{
    private $uri;

    private $routes;

    private $method;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
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
//        dump($request);
        /*Достаем контроллер*/
        if(isset($request['controller'])&&!empty($request['controller'])) {
            $controller = $request['controller'];
            unset($request['controller']);
        }
        /*Достаем метод*/
        if(isset($request['action'])&&!empty($request['action'])) {
            $action = $request['action'];
            unset($request['action']);
        }
        /*Достаем Http метод*/
        if(isset($request['method'])&&!empty($request['method'])) {
            $method = $request['method'];
            unset($request['method']);
        }
        /*Достаем если емеется middleware*/
        if(isset($request['middleware'])){
            $middleware = $request['middleware'];
            $middleware_array = include_once 'components/middleware_array.php';
            include_once 'middleware/'.$middleware.'.php';
            $middleware_obj = new $middleware_array[$middleware];
        }

        $obj = new $controller;

        call_user_func_array([$obj, $action],$request);
    }
}
