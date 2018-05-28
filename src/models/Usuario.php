<?php
namespace Daw\models;
use Daw\models\Db;
use Daw\models\Validador;
use mysqli;
use Daw\models\Sesion;

class Usuario extends Db
{
    private $correo;
    private $nom_usuario;
    private $nombre;
    private $apellido;
    private $contrasenya;

    function __construct()
    {

    }

    public function validarUsuario($array)
    {
        $resultado_final = [];
        $correo = "";

        foreach ($array as $key => $value) {
            switch ($key) {
                case 'correo':
                    $correo = $value;
                    if (Validador::esBlanco($value)){
                        $resultado_final[] = "El campo correo está vacio";
                    }
                    break;

                case 'correoConfirmacion':
                    if (Validador::esBlanco($value)){
                        $resultado_final[] = "El campo vuelve a insertar correo está vacio";
                    } elseif (!Validador::esIdentico($value, $correo)) {
                        $resultado_final[] = "Los campos correo no coinciden";
                    }
                    break;

                case 'nom_usuario':
                    if (Validador::esBlanco($value)){
                        $resultado_final[] = "El campo nombre de usuario está vacio";
                    }
                    break;

                case 'nombre':
                    if (Validador::esBlanco($value)){
                        $resultado_final[] = "El campo nombre está vacio";
                    }
                    break;

                case 'apellido':
                    if (Validador::esBlanco($value)){
                        $resultado_final[] = "El campo apellido está vacio";
                    }
                    break;

                case 'contrasenya':
                    if (Validador::esBlanco($value)){
                        $resultado_final[] = "El campo contraseña está vacío";
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

    public function login()
    {
        $nom_usuario = $this->nom_usuario;
        $contrasenya = $this->contrasenya;

        $Db = new Db;
        $resultado = Table::obtenerFila("usuario","nom_usuario", "$nom_usuario");
        if (is_object($resultado) === true ) {
            if (mysqli_num_rows($resultado) > 0) {
                Sesion::start();
                Sesion::load($this->nom_usuario);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function crearUsuario()
    {
        $array = [
            "correo" => $this->correo,
            "nom_usuario" => $this->nom_usuario,
            "nombre" => $this->nombre,
            "apellido" => $this->apellido,
            "contrasenya" => $this->contrasenya
        ];

        if (Table::insertarFila("usuario", $array)) {
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
