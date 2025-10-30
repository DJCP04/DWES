<?php

namespace UD4\config;

class Database
{
    public static function loadConfig()
    {
        $fitxer = 'c:\temp2\config.db';
        // Verifiquem que el fitxer existeix
        if (file_exists($fitxer)) {
            // Llegim el fitxer línia per línia
            $linies = file($fitxer, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            // Recórrer cada línia del fitxer
            foreach ($linies as $linia) {
                $linia = trim($linia);  // netejam la línia d'espais // trim() quita espacios al principio y al final

                // Ignora comentaris (#) o línies sense format clau=valor
                if (str_starts_with($linia, '#') || !str_contains($linia, '=')) {
                    continue;
                }

                //Divideix en clau i valor
                list($clau, $valor) = explode('=', $linia, 2);
                $config[trim($clau)] = trim($valor);
            }
            return $config;
        }
    }
    public static function connect()
    {
        $config = self::loadConfig();
        $conn = new \mysqli(
            $config['DB_HOST'],
            $config['DB_USERNAME'],
            $config['DB_PASSWORD'],
            $config['DB_DATABASE']
        );
        if ($conn->connect_error) {
            die("Error de connexió: " . $conn->connect_error);
        }
        return $conn;
    }

}
