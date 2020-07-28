<?php

error_reporting (E_ALL);
//E_RECOVERABLE_ERROR
chdir('..\\');
include_once 'Helpers/Helper.php';
include_once 'Router.php';
include_once 'Errors.php';
include_once 'components/Config.php';
//include_once 'autoload.php';
session_start();

$obj = new Router();

$obj->route();
//Helper::out($_SERVER['REQUEST_URI']);




