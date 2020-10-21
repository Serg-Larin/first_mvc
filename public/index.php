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

require 'vendor/autoload.php';

include_once 'Helpers/Helper.php';
include_once 'Helpers/functions.php';
include_once 'Router.php';
include_once 'Errors.php';
include_once 'components/Config.php';

////include_once 'autoload.php';
session_start();
//
$config = [
    'driver'    => 'mysql', // Db driver
    'host'      => DB_HOST,
    'database'  => DB_NAME,
    'username'  => DB_USER,
    'password'  => CrossPlatformSettings::getSettingsByKey('password')
];

$connection = new \Pixie\Connection('mysql', $config);
try {
    $DB = new \Pixie\QueryBuilder\QueryBuilderHandler($connection);
    if(!$DB){
        throw new \mysql_xdevapi\Exception(getError(DATABASE_CONNECT_ERROR));
    }
} catch (Exception $e){
    echo $e->getMessage();
}
$obj = new Router();
//
$obj->route();
//Helper::out($_SERVER['REQUEST_URI']);




