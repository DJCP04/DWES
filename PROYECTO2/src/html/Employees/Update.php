<?php
require('../includes/header.php');
require('../includes/nav.php');
require '../../../vendor/autoload.php';

use models\Employee;

$message = "";

// Datos del empleado a modificar (GET)
$emp_id = $_GET["id"] ?? '';
$name = $_GET["name"] ?? '';
$last_name = $_GET["last_name"] ?? '';
$email = $_GET["email"] ?? '';
$phone = $_GET["phone"] ?? '';
$hire_date = $_GET["hire_date"] ?? '';
$job_id = $_GET["job_id"] ?? '';
$salary = $_GET["salary"] ?? '';
$commission = $_GET["commission"] ?? '';
$manager_id = $_GET["manager_id"] ?? '';
$dep_id = $_GET["dep_id"] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Convertir campos opcionales vacíos a null
        $salary = $_POST['salary'] === '' ? null : (float)$_POST['salary'];
        $commission = $_POST['commission'] === '' ? null : (float)$_POST['commission'];
        $manager_id = $_POST['manager_id'] === '' ? null : (int)$_POST['manager_id'];
        $email = $_POST['email'] === '' ? null : $_POST['email'];
        $phone = $_POST['phone'] === '' ? null : $_POST['phone'];
        $hire_date = $_POST['hire_date'] === '' ? null : $_POST['hire_date'];

        // Crear objeto Employee solo con los valores proporcionados
        $employee = new Employee(
            (int)$_POST['emp_id'],    // ID obligatorio
            $_POST['name'],
            $_POST['last_name'],
            $email,
            $phone,
            $hire_date,
            $_POST['job_id'],
            $salary,
            $commission,
            $manager_id,
            (int)$_POST['dep_id']
        );

        $employee->save(); // Guardar cambios

        echo "<script>
                alert('✅ Employee modificado correctamente');
                window.location.href = 'Employees_list.php';
              </script>";
        exit;

    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>

<div id="section">
    <h1>Modificar Employee</h1>
    <?= $message ?>

    <form method="POST" action="">
        <label>ID Employee:</label><br>
        <input type="number" name="emp_id" value="<?= htmlspecialchars($emp_id) ?>" readonly style="width:80%; height:40px;"><br><br>

        <label>Nombre:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>" required style="width:80%; height:40px;"><br><br>

        <label>Apellido:</label><br>
        <input type="text" name="last_name" value="<?= htmlspecialchars($last_name) ?>" required style="width:80%; height:40px;"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" style="width:80%; height:40px;"><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="phone" value="<?= htmlspecialchars($phone) ?>" style="width:80%; height:40px;"><br><br>

        <label>Fecha de Contratación:</label><br>
        <input type="date" name="hire_date" value="<?= htmlspecialchars($hire_date) ?>" style="width:80%; height:40px;"><br><br>

        <label>Job ID:</label><br>
        <input type="text" name="job_id" value="<?= htmlspecialchars($job_id) ?>" required style="width:80%; height:40px;"><br><br>

        <label>Salario:</label><br>
        <input type="number" step="0.01" name="salary" value="<?= htmlspecialchars($salary) ?>" style="width:80%; height:40px;"><br><br>

        <label>Comisión (%):</label><br>
        <input type="number" step="0.01" name="commission" value="<?= htmlspecialchars($commission) ?>" style="width:80%; height:40px;"><br><br>

        <label>Manager ID:</label><br>
        <input type="number" name="manager_id" value="<?= htmlspecialchars($manager_id) ?>" style="width:80%; height:40px;"><br><br>

        <label>Department ID:</label><br>
        <input type="number" name="dep_id" value="<?= htmlspecialchars($dep_id) ?>" required style="width:80%; height:40px;"><br><br>

        <input type="submit" value="Modificar Empleado" class="btn btn-primary">
    </form>
</div>
</div>
<?php require('../includes/footer.php'); ?>
