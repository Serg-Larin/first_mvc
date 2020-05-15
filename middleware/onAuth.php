<?php
namespace app\middleware;

use Helper;

class onAuth{

    public function __construct()
    {
        if(isset($_SESSION['auth'])){
            Helper::redirect('/admin/categories');
        }
    }
}