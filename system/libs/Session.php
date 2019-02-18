<?php

/**
 * Created by PhpStorm.
 * User: anik
 * Date: 9/18/2017
 * Time: 10:44 PM
 */
class Session
{
    public static function init(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function destroy(){
//        session_unset();
        session_destroy();
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }

    public static function checkSession(){
        self::init();
        if(self::get('login') == false){
            self::destroy();
            header("Location: ". BASE_URL."/Login");
        }
    }
}
