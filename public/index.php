<?php
use controllers\mainController;
$projectPath = '/var/www/html/';
chdir($projectPath.'first_mvc');
ini_set("display_errors", 1);
error_reporting(E_ALL);
//E_RECOVERABLE_ERROR



spl_autoload_register(function ($class_name) {
    $path = str_replace('\\','/',$class_name.'.php');
    if (file_exists($path)){
        require_once $path;
    }
});

include_once 'Helpers/Helper.php';
include_once 'Helpers/functions.php';
include_once 'Router.php';
include_once 'Errors.php';
include_once 'components/Config.php';

////include_once 'autoload.php';
session_start();
//
$obj = new Router();
//
$obj->route();
//Helper::out($_SERVER['REQUEST_URI']);




