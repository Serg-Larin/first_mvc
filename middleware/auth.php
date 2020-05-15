<?php
namespace app\middleware;
use Helper;

class auth{

public function __construct()
{
    if(!isset($_SESSION['auth']))
    {
        Helper::redirect('/account/authorization');
    }
}

}