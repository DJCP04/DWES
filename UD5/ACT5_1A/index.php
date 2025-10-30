<?php


    require_once './config/Database.php';
    require_once './models/Model.php';
    require_once './models/Employees.php';

use Config\Database;
use Models\Employees;

$employees = Employees::all();

echo '<pre>';
foreach ($employees as $employee) {
    echo json_encode($employee, JSON_PRETTY_PRINT);
}
echo '</pre>';

