<?php
namespace Daw\models;
use Daw\models\Db;
use Daw\models\Validador;
/**
 *
 */
class Usuario extends Db
{
  private $correo;
  private $nick;
  private $nombre;
  private $apellido;
  private $password;

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

  public function crearUsuario()
  {
    $array = [
      "correo" => $this->correo,
      "nom_usuario" => $this->nick,
      "nombre" => $this->nombre,
      "apellido" => $this->apellido,
      "contrasenya" => $this->password
    ];

    if ($this->validarUsuario($array))
      Table::insertarFila("usuarios", $array);

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
     * Get the value of Nick
     *
     * @return mixed
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set the value of Nick
     *
     * @param mixed nick
     *
     * @return self
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

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
     * Get the value of password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param mixed password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of Avatar
     *
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of Avatar
     *
     * @param mixed avatar
     *
     * @return self
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

}
?>
