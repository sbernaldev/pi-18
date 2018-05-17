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

    public static function estaDisponible($tipo, $valor) {
        switch ($tipo) {
            case 'correo':
                // Falta decir que si el número de filas del resultado es = 0
                if (Table::obtenerFila('usuario', 'correo', "$valor")) {
                    return true;
                }
                return false;
                break;
            
            case 'usuario':
                
                break;
            
            default:
                break;
        }

    }
}
