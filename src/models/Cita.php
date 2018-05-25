<?php
namespace Daw\models;
use Daw\models\Db;
use Daw\models\Validador;
use mysqli;
use Daw\models\Sesion;

class Cita extends Db
{
    public $id_frase;
    public $fecha_publicacion;
    public $frase;
    public $id_usuario;

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
     * Get the value of Correo
     *
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of Correo
     *
     * @param mixed correo
     *
     * @return self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of nom_usuario
     *
     * @return mixed
     */
    public function getNom_usuario()
    {
        return $this->nom_usuario;
    }

    /**
     * Set the value of nom_usuario
     *
     * @param mixed nom_usuario
     *
     * @return self
     */
    public function setNom_usuario($nom_usuario)
    {
        $this->nom_usuario = $nom_usuario;

        return $this;
    }

    /**
     * Get the value of Nombre
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of Nombre
     *
     * @param mixed nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of Apellido
     *
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of Apellido
     *
     * @param mixed apellido
     *
     * @return self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of contrasenya
     *
     * @return mixed
     */
    public function getContrasenya()
    {
        return $this->contrasenya;
    }

    /**
     * Set the value of contrasenya
     *
     * @param mixed contrasenya
     *
     * @return self
     */
    public function setContrasenya($contrasenya)
    {
        $this->contrasenya = $contrasenya;

        return $this;
    }
}
?>
