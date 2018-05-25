<?php
namespace Daw\models;
use Daw\models\Db;
use mysqli;

class Categoria
{
    public $id_clase;
    public $nom_clase;

    /**
     * Get the value of id_clase
     */ 
    public function getId_clase()
    {
        return $this->id_clase;
    }

    /**
     * Set the value of id_clase
     *
     * @return  self
     */ 
    public function setId_clase($id_clase)
    {
        $this->id_clase = $id_clase;

        return $this;
    }

    /**
     * Get the value of nom_clase
     */ 
    public function getNom_clase()
    {
        return $this->nom_clase;
    }

    /**
     * Set the value of nom_clase
     *
     * @return  self
     */ 
    public function setNom_clase($nom_clase)
    {
        $this->nom_clase = $nom_clase;

        return $this;
    }

    public static function getCategorias()
    {
        return Table::selectAllFrom("clase");
    }
}

?>