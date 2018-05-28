<?php

namespace Daw\models;

class PeticionAPI
{
    public $metodo;
    public $categoria_endpoint;
    public $endpoint;

    /**
     * Hacer una petición GET a nuestra API
     */
    public function requestGet($categoria_endpoint, $endpoint)
    {
        $curl = curl_init();

        // Configuro la petición a la API
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://localhost/Api/$categoria_endpoint/$endpoint.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        // Envio la petición y almaceno la respuesta en $response
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        // Cierro la petición/conexión a la API
        curl_close($curl);

        // Paso la respuesta JSON a un Array, necesario en PHP
        $response = json_decode($response, true); // Because of true, it's in an array

        return $response;
    }

    /**
     * Get the value of metodo
     */ 
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * Set the value of metodo
     *
     * @return  self
     */ 
    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;

        return $this;
    }

    /**
     * Get the value of categoria_endpoint
     */ 
    public function getCategoria_endpoint()
    {
        return $this->categoria_endpoint;
    }

    /**
     * Set the value of categoria_endpoint
     *
     * @return  self
     */ 
    public function setCategoria_endpoint($categoria_endpoint)
    {
        $this->categoria_endpoint = $categoria_endpoint;

        return $this;
    }

    /**
     * Get the value of endpoint
     */ 
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Set the value of endpoint
     *
     * @return  self
     */ 
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }
}


?>