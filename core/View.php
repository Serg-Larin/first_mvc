<?php

namespace app\core;

class View
{
    private $path;
    public function __construct($path)
    {
        $this->path = $path;
    }

    public function render($arg=[],$path='')
    {
        if($path == '') {
            $path = $this->path;
        }
        require_once 'views/'.$path.'.php';
    }
}