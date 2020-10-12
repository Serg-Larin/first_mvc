<?php
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
    $pathToView = 'views/'.str_replace('.','/',$path).'.php';
    if(file_exists($pathToView)){
        require_once $pathToView;
    }else{
        getError(VIEW_IS_NOT_FOUND,$path);
    }
}

