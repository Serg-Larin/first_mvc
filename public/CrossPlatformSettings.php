<?php

class CrossPlatformSettings {

    public const LINUX = 1;

    public const WINDOWS = 2;

    public static $currentPlatform;

    protected static function getSettingsArray($params=[]){
       return [
            self::LINUX =>[
                'changeDir'     =>   '/var/www/html/first_mvc',
                'autoloadPath'  =>   str_replace('\\','/',$params['class_name'].'.php'),
                'password'      =>   'Temp123#$'
            ],
            self::WINDOWS =>[
                'changeDir'     =>   '..',
                'autoloadPath'  =>   $params['class_name']. '.php',
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
        } else {
            return self::$currentPlatform;
        }
    }

    public static function getSettingsByKey($key,$param=[]){
        self::checkPlatform();
        return self::getSettingsArray($param)[self::$currentPlatform][$key];
    }

}