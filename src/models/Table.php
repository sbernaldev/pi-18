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

    $query = "INSERT INTO $tabla ($claves) VALUES ($valores)";
    $Table = new Table();
    $Table->connector->query($query);

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
}

?>
