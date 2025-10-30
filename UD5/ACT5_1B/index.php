<?php


spl_autoload_register(function ($classe) {
    if (file_exists(str_replace('\\', '/', $classe) . '.php'))
        require_once(str_replace('\\', '/', $classe) . '.php');
});

use Config\Database;
use Models\Employee;

$employee = new Employee(
    3000,
    "Persona",
    "persApell",
    "persona@gmail.com",
    "123456789",
    "2024-01-01",
    "AD_VP",
    60000.00,
    0.05,
    null,
    60

);

$employee->save();

$employees = Employee::all();

echo '<pre>';

foreach ($employees as $employeee) {
    echo json_encode($employee, JSON_PRETTY_PRINT);
}

echo '<pre>';
