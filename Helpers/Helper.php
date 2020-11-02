<?php
namespace Helpers;

class Helper{
    static public function hash($field){
        return md5($field);
    }
    static public function matching($str1,$str2){
        if (self::hash($str1)==$str2){
            return true;
        }
        return false;
    }
    static  public function redirect($url){
        header('Location: '.$url);
    }

    static public function get($class){
        echo $class;
    }
    static public function Download($file,$path,$previous=''){
        if(!empty($file['name'])){
            $save = '/uploads/'.$path.'/'. substr(md5(rand()),0,10).$file['name'];
            move_uploaded_file($file['tmp_name'],$save );
            return '/'.$save;
            if(!empty($previous)){
                unlink($previous);
            }
        } else if(!empty($previous)){
            return $previous;
        }
        return '/uploads/'.$path.'/default.jpg';
    }
}
