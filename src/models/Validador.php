<?php

namespace Daw\models;

class Validador
{
    public static function esBlanco($param)
    {
        if (empty($param)){
            return true;
        } else {
            return false;
        }
    }

    public static function esIdentico($param1, $param2)
    {
        if ($param1 === $param2){
            return true;
        } else {
            return false;
        }
    }
}
