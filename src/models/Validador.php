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

    public static function comprobarValidacion($array)
    {    
        foreach ($cuerpo_respuesta['validacion'] as $key => $value) {
            if ($value != 'valido') {
                return false;
            }
        }
        
        return true;
    }
}
