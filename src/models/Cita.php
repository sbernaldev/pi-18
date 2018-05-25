<?php
namespace Daw\models;
use Daw\models\Db;
use Daw\models\Validador;
use mysqli;

class Cita extends Db
{
    public $id_frase;
    public $fecha_publicacion;
    public $frase;
    public $id_usuario;
    public $id_categoria;

    function __construct()
    {

    }

    public function validarCita($array)
    {
        $resultado_final = [];

        foreach ($array as $key => $value) {
        switch ($key) {
            case 'id_frase':
            if (Validador::esBlanco($value)){
                $resultado_final[] = "La id de la frase está vacía";
            }
            break;

            case 'fecha_publicacion':
            if (Validador::esBlanco($value)){
                $resultado_final[] = "La fecha de publicación está vacía";
            }
            break;

            case 'frase':
            if (Validador::esBlanco($value)){
                $resultado_final[] = "El contenido de la cita está vacía";
            }
            break;

            case 'id_usuario':
            if (Validador::esBlanco($value)){
                $resultado_final[] = "La ID de usuario está vacía";
            }
            break;

            default:
            // code...
            break;
            }
        }

        if (!empty($resultado_final)) {
            return $resultado_final;
        } else {
            return true;
        }
    }

    /**
     * Get the value of Correo
     *
     * @return mixed
     */
    public function crearCita()
    {
        $array = [
            "frase" => $this->frase,
            "id_usuario" => $this->id_usuario
        ];

        if (Table::insertarFila("frase", $array)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the value of id_frase
     */ 
    public function getId_frase()
    {
        return $this->id_frase;
    }

    /**
     * Set the value of id_frase
     *
     * @return  self
     */ 
    public function setId_frase($id_frase)
    {
        $this->id_frase = $id_frase;

        return $this;
    }

    /**
     * Get the value of fecha_publicacion
     */ 
    public function getFecha_publicacion()
    {
        return $this->fecha_publicacion;
    }

    /**
     * Set the value of fecha_publicacion
     *
     * @return  self
     */ 
    public function setFecha_publicacion($fecha_publicacion)
    {
        $this->fecha_publicacion = $fecha_publicacion;

        return $this;
    }

    /**
     * Get the value of frase
     */ 
    public function getFrase()
    {
        return $this->frase;
    }

    /**
     * Set the value of frase
     *
     * @return  self
     */ 
    public function setFrase($frase)
    {
        $this->frase = $frase;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of id_categoria
     */ 
    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    /**
     * Set the value of id_categoria
     *
     * @return  self
     */ 
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }
}
?>
