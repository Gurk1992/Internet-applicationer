<?php 
namespace Comment\Util;

class Start{

    public static function initRequest(){
        session_start();
        self::createClassLoader();
    }

    private static function createClassLoader(){
        spl_autoload_register(function ($className){
            require_once 'classes/' . \str_replace('\\', '/', $className) . '.php';

        });
    }
}
?>