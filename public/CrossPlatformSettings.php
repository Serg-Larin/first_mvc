<?php

class CrossPlatformSettings {

    public const LINUX = 1;

    public const WINDOWS = 2;

    public static $currentPlatform;

    protected static function getSettingsArray(){
       return [
            self::LINUX =>[
                'changeDir'     =>   '/var/www/html/first_mvc',
                'password'      =>   'Temp123#$'
            ],
            self::WINDOWS =>[
                'changeDir'     =>   '..',
                'password'      =>   ''
            ]
        ];
    }
    protected static function checkPlatform()
    {
        if(self::$currentPlatform == '' ) {
            switch (PHP_OS_FAMILY) {

                case 'Windows':
                    self::$currentPlatform = self::WINDOWS;
                    break;
                case 'Linux':
                    self::$currentPlatform = self::LINUX;
            }
        }
        return self::$currentPlatform;
    }

    public static function getSettingsByKey($key){
        return self::getSettingsArray()[self::checkPlatform()][$key];
    }

    public static function getAutoloadPath($className){
        $path =[
            self::LINUX     =>   str_replace('\\','/',$className.'.php'),
            self::WINDOWS   =>   $className.'.php'
        ];
        return $path[self::checkPlatform()];
    }
}