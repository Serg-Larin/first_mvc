<?php

include_once 'CrossPlatformSettings.php';
chdir(CrossPlatformSettings::getSettingsByKey('changeDir'));
ini_set("display_errors", 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'blogg',
    'username'  => 'root',
    'password'  => 'Temp123#$',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

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

try {
    $obj->route();
}
catch (Exception $e){
    echo json_encode(
        [
            'message' => $e->getMessage(),
            'code'    => $e->getCode()
        ]
    );
    return false;
}
//Helper::out($_SERVER['REQUEST_URI']);




