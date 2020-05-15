<?php

namespace app\controllers;

use app\core\View;


require_once 'core/View.php';

class controller{

    protected $url;
    protected $view;
    protected $path;
    protected $model;


    public function __construct($path,$modelPath)
    {
        $this->url=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
        $this->path=$path;
        require_once 'models/'.$modelPath.'.php';
        $this->model = new $modelPath;
        $this->view = new View($path);
    }


}