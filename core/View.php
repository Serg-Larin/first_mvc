<?php

namespace app\core;

class View
{
    private $path;
    public function __construct()
    {
//        $this->path = $path;
    }

    public function render($arg=[],$path='')
    {
        require_once $path;
    }
}
