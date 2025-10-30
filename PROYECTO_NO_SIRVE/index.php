<?php

require 'vendor/autoload.php';

function convertToNull($value)
{
	return $value === '' ? null : $value;
}

// Definim el gestor d’errors personalitzat
function gestorErrors($errno, $errstr, $errfile, $errline)
{
	// Convertim l’error en una excepció
	throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

// Registrem el gestor d’errors
set_error_handler("gestorErrors");

use Config\Database;
use Models\Employee;

try {
	// Si el formulari ha estat enviat
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Obtenir els valors del formulari
		$employee_id    = $_POST['employee_id'];
		$first_name     = $_POST['first_name'];
		$last_name      = $_POST['last_name'];
		$email          = $_POST['email'];
		$phone_number   = $_POST['phone_number'];
		$hire_date      = $_POST['hire_date'];
		$job_id         = $_POST['job_id'];
		$salary         = $_POST['salary'];
		$commission_pct = $_POST['commission_pct'];
		$manager_id     = $_POST['manager_id'];
		$department_id  = $_POST['department_id'];

		// Crear una nova instància d'Employee amb els valors del formulari
		$employee = new Employee(
			$employee_id,
			$first_name,
			$last_name,
			convertToNull($email),
			convertToNull($phone_number),
			convertToNull($hire_date),
			$job_id,
			convertToNull($salary),
			convertToNull($commission_pct),
			convertToNull($manager_id),
			convertToNull($department_id)
		);

		// Guardar l'empleat a la base de dades
		$employee->save();  // INSERT / UPDATE
	}
} catch (Error | Exception $e) {
	// 🔹 Missatge amigable a l'usuari
	echo "<strong>S'ha produït un error: " . $e->getMessage() . "</strong>";

	// 🔹 Registre detallat a fitxer de log
	$logMessage = "[" . date('Y-m-d H:i:s') . "] "
		. $e->getMessage()
		. " ARXIU: " . $e->getFile()
		. " LÍNIA: " . $e->getLine() . PHP_EOL;
	error_log($logMessage, 3, __DIR__ . '/error_log.txt');
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="estils.css">
	<title>Human Resource</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link href="./css/estils.css" rel="stylesheet" />
	<style>
		.wrapper {
			width: 600px;
			margin: 0 auto;
		}

		table tr td:last-child {
			width: 120px;
		}
	</style>
	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</head>

<body>
	<div id="header">
		<h1>HR & OE Management</h1>
	</div>
	<div id="content">
		<div id="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>
					<ul> HR
						<li><a href="./src/assets/employeeAll.php">Employees</a></li>
						<li><a href="./src/assets/departmentsAll.php">Departments</a></li>
						<li><a href="./src/assets/jobsAll.php">Jobs</a></li>
						<li><a href="locations.php">Locations</a></li>
					</ul>
				</li>
				<li>
					<ul> OE
						<li><a href="warehouses.php">Warehouses</a></li>
						<li><a href="categories.php">Categories</a></li>
						<li><a href="./src/models/Customer.php">Customers</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="orders.php">Orders</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div id="section">
			<h3>Human Resource and Order Entries Management</h3>
		</div>
	</div>

	<div id="footer">
		<p>(c) IES Emili Darder - 2025</p>
	</div>
</body>

</html>