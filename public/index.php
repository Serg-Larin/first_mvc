<?php

include_once 'CrossPlatformSettings.php';
chdir(CrossPlatformSettings::getSettingsByKey('changeDir'));
ini_set("display_errors", 1);
error_reporting(E_ALL);



spl_autoload_register(function ($class_name) {
    $path = CrossPlatformSettings::getAutoloadPath($class_name);
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




