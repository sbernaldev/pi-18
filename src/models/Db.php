<?php

namespace Daw\models;

use mysqli;
use Daw\config\Config;

class Db
{
    private $server = "";
    private $port = "";
    private $username = "";
    private $passwd = "";
    private $db = "";

    private $connector = "";

    public function __construct()
    {
        $this->server = (isset($_ENV["DB_HOST"]) ? $_ENV["DB_HOST"] : Config::DB_HOST);
        $this->port = (isset($_ENV["DB_PORT"]) ? $_ENV["DB_PORT"] : Config::DB_PORT);
        $this->username = (isset($_ENV["DB_USERNAME"]) ? $_ENV["DB_USERNAME"] : Config::DB_USERNAME);
        $this->passwd = (isset($_ENV["DB_PASSWD"]) ? $_ENV["DB_PASSWD"] : Config::DB_PASSWD);
        $this->db = (isset($_ENV["DB_DB"]) ? $_ENV["DB_DB"] : Config::DB_DB);

        $this->connect();
    }

    public function connect()
    {
        $mysqli = new mysqli(
            $this->server,
            $this->username,
            $this->passwd,
            $this->db,
            $this->port
        );

        if ($mysqli->connect_errno) {
            $this->connector = false;
        } else {
            $this->connector = $mysqli;
        }
    }

    /**
     * Get the value of connector
     */
    public function getConnector()
    {
        return $this->connector;
    }
}
