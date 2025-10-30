<?php

namespace config;

class Database
{
    public $host;
    public $port;
    public $database;
    public $username;
    public $password;
    public $conn;

    public function __construct($host, $port, $database, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    public static function loadConfig($fitxer): array
    {
        $config = [];

        if (file_exists($fitxer)) {
            $linies = file($fitxer, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($linies as $linia) {
                $linia = trim($linia);
                if (strpos(trim($linia), '#') !== 0) {
                    list($clau, $valor) = explode('=', $linia, 2);
                    $config[trim($clau)] = trim($valor);
                }
            }
        } else {
            die("El fichero de configuracion no existe.");
        }

        return $config;
    }

    public function connectDB()
    {
        $this->conn = new \mysqli($this->host, $this->username, $this->password, $this->database, $this->port);

        if ($this->conn->connect_error) {
            die("Error en la conexion: " . $this->conn->connect_error);
        }
    }
    public function closeDB()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
