<?php


namespace Daw\models;

use Daw\models\Table;
use mysqli;


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

    public static function load($nom_usuario)
    {
        $datosdelusuario = Table::obtenerFila("usuario", "nom_usuario", "$nom_usuario");
        $_SESSION["user_data"] = mysqli_fetch_assoc($datosdelusuario);
    }
}