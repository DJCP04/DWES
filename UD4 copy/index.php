<?php
require_once './config/Database.php';


try {
    $conn = Database::connect();

    if ($conn) {
        echo "Conexion exitosa!!!";
    }
} catch (mysqli_sql_exception $e) {
    die("Error ejecuntado MySQL: " . $e->getMessage());
}
