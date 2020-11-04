<?php

use Jenssegers\Blade\Blade;

/**
 *
 * @param $path string
 * @param array $arguments
 *
 * @return mixed|void
 */
function view($path,$arguments = [])
{
    if (gettype($arguments) !== 'array'){
        echo getError(VARIABLE_IS_DIFFERENT_DATA_TYPE,'$funcOrArray');
        return false;
    }
    if(gettype($arguments) === 'array' && $arguments !== []) {
        extract($arguments, EXTR_OVERWRITE);
    }

        $blade = new Blade('views', 'cache');
        echo $blade->make($path,$arguments)->render();
}


function out($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

function method($method = ''){
    if($method === ''){
        return $_SERVER['REQUEST_METHOD'];
    }else{
        return $method === $_SERVER['REQUEST_METHOD'];
    }
}

function formatDate(){
   return date("Y-m-d H:i:s");
}
