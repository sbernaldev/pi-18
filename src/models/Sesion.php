<?php
/**
 * Created by PhpStorm.
 * User: Javi
 * Date: 22/05/2018
 * Time: 10:00
 */

namespace Daw\models;


class Sesion
{
    public static function start()
    {
        session_start();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
    }

    public static function destroy()
    {
        //session_unset();
        $_SESSION = [];
        session_destroy();
    }

}