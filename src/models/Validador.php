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
        foreach ($array["validacion"] as $key => $value) {
            if ($value != 'valido') {
                return false;
            }
        }

        return true;
    }

    public static function estaDisponible($tipo, $valor) {
        switch ($tipo) {
            case 'correo':
                if (Table::obtenerFila('usuario', 'correo', "$valor")->num_rows > 0) {
                    return false;
                }
                return true;
                break;
            
            case 'usuario':
                if (Table::obtenerFila('usuario', 'nom_usuario', "$valor")->num_rows > 0) {
                    return false;
                }
                return true;
                break;
            
            default:
                break;
        }

    }
}
