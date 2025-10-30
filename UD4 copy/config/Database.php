<?php
class Database
{
    public static function loadConfig()
    {

        $fitxer = 'c:\temp2\config.db';
        // Verifiquem que el fitxer existeix
        if (file_exists($fitxer)) {
            // Llegim el fitxer línia per línia
            //array
            $linies = file($fitxer, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            // Recórrer cada línia del fitxer
            foreach ($linies as $linia) {
                $linia = trim($linia); //limipiamos la linia de espacios

                if (str_starts_with($linia, "#") || !str_contains($linia, "=")) {
                    continue;
                }
                list($clau, $valor) = explode("=", $linia, 2);
                $config[trim($clau)] = trim($valor);
            }
            return $config;
        } else {
            die("El fichero de configuracion no existe");
        }
    }
    public static function connect()
    {
        $config = self::loadConfig();
        $conn = new mysqli(
            $config['DB_HOST'],
            $config['DB_USERNAME'],
            $config['DB_PASSWORD'],
            $config['DB_DATABASE']
        );
        if ($conn->connect_error) {
            die("Error de conexio: " . $conn->connect_error);
        }
        return $conn;
    }
}
