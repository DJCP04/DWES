<?php
require_once "./config/Database.php";

use UD4\config\Database;

$conn = Database::connect();
try {
    echo "conectado correctamente";
    echo "<br>";
    $query = 'SELECT last_name, first_name FROM employees';
    $table = $conn->query($query);
    foreach ($table as $row) {
        foreach ($row as $column) {
            echo $column . ' ';
        }
        echo "<br>";
    }

    $conn->close();
} catch (mysqli_sql_exception $e) {
    echo "Error executing MySQL: " . $e->getMessage();
}
