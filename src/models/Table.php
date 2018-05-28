<?php
namespace Daw\models;
use Daw\models\Db;

/**
 * Plantilla vacia de Db
 */
class Table extends Db
{

    private $db;
    private $connector;

    function __construct()
    {
        $this->db = new Db();
        $this->connector = $this->db->getConnector();
    }

    public static function insertarFila($tabla, $array)
    {
        $claves = "";
        $valores = "";

        $longitud = sizeof($array) - 1;
        $contador = 0;
        foreach ($array as $key => $value) {
            if ($contador < $longitud) {
                if (is_string($value)) {
                    $claves .= "$key, ";
                    $valores .= "'$value', ";
                } elseif (is_int($value)) {
                    $claves .= "$key, ";
                    $valores .= "$value, ";
                }
            } else {
                if (is_string($value)) {
                    $claves .= "$key";
                    $valores .= "'$value'";
                } elseif (is_int($value)) {
                    $claves .= "$key";
                    $valores .= "$value";
                }
            }
            $contador++;
        }

        $query = "INSERT INTO `$tabla` ($claves) VALUES ($valores)";
        $Table = new Table();
        if ($Table->connector->query($query)) {
            $id_row = $Table->connector->insert_id;
            if ($id_row) {
                return $id_row;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * Obtengo todas las columnas de una o varias filas
     */
    public static function obtenerFila(string $tabla, string $clave, $valor)
    {    
        $Table = new Table();
        if (is_string($valor)){
        $valor = "'$valor'";
        }
        
        $query = "SELECT * FROM `$tabla` WHERE `$clave` = $valor";
        $resultado = $Table->connector->query($query);
        return $resultado;
    }

    /**
     * Obtengo todas las filas de una tabla
     */
    public static function selectAllFrom(string $table)
    {
        $Table = new Table();
        $query = "SELECT * FROM `$table`";
        $resultado = $Table->connector->query($query);
        return $resultado;
    }
}

?>
