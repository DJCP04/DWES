<?php
require '../../../vendor/autoload.php';

use models\Employee;
use config\Database;

$message = "";

// Fetch jobs for dropdown - BEFORE any HTML output
try {
    $db = new Database();
    $db->connectDB('C:/temp/config.db');
    $sql = "SELECT job_id, job_title FROM jobs ORDER BY job_title";
    $result = $db->conn->query($sql);
    $jobs = $result->fetch_all(MYSQLI_ASSOC);
    $db->closeDB();
} catch (Exception $e) {
    $message = "<p style='color: red;'>Error loading jobs: " . $e->getMessage() . "</p>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Si algún campo opcional viene vacío, lo convertimos a null
        $postData = [
            'employee_id'   => $_POST['employee_id'] ?? null,
            'first_name'    => $_POST['first_name'] ?? null,
            'last_name'     => $_POST['last_name'] ?? null,
            'email'         => $_POST['email'] ?: null,
            'phone'         => $_POST['phone'] ?: null,
            'hire_date'     => $_POST['hire_date'] ?: null,
            'job_id'        => $_POST['job_id'] ?? null,
            'salary'        => $_POST['salary'] !== '' ? (float)$_POST['salary'] : null,
            'commission'    => $_POST['commission'] !== '' ? (float)$_POST['commission'] : null,
            'manager_id'    => $_POST['manager_id'] !== '' ? (int)$_POST['manager_id'] : null,
            'department_id' => $_POST['department_id'] ?? null
        ];

        // Pasamos todo directamente al constructor
        $employee = new Employee(
            $postData['employee_id'],
            $postData['first_name'],
            $postData['last_name'],
            $postData['email'],
            $postData['phone'],
            $postData['hire_date'],
            $postData['job_id'],
            $postData['salary'],
            $postData['commission'],
            $postData['manager_id'],
            $postData['department_id']
        );

        $employee->save();

        echo "<script>
                alert('✅ Employee añadido correctamente');
                window.location.href = 'Employees_list.php';
              </script>";
        exit;
    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}

require('../includes/header.php');
require('../includes/nav.php');
?>
<div id="section">
    <h1>Afegir un Nou Employee</h1>
    <?= $message ?>

    <form method="POST" action="">
        <label>ID Employee:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="employee_id" required><br><br>

        <label>Nombre:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="first_name" required><br><br>

        <label>Apellido:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="last_name" required><br><br>

        <label>Email:</label><br>
        <input style="width: 80%; height: 40px;" type="email" name="email"><br><br>

        <label>Teléfono:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="phone"><br><br>

        <label>Fecha de Contratación:</label><br>
        <input style="width: 80%; height: 40px;" type="date" name="hire_date"><br><br>

        <label>Job ID:</label><br>
        <select style="width: 80%; height: 40px;" name="job_id" required>
            <option value="">Selecciona un trabajo</option>
            <?php foreach ($jobs as $job): ?>
                <option value="<?= htmlspecialchars($job['job_id']) ?>">
                    <?= htmlspecialchars($job['job_title']) ?> (<?= htmlspecialchars($job['job_id']) ?>)
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <label>Salario:</label><br>
        <input style="width: 80%; height: 40px;" type="number" step="0.01" name="salary"><br><br>

        <label>Comisión (%):</label><br>
        <input style="width: 80%; height: 40px;" type="number" step="0.01" name="commission"><br><br>

        <label>Manager ID:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="manager_id"><br><br>

        <label>Department ID:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="department_id" required><br><br>

        <input type="submit" value="Afegir Empleat" class="btn btn-primary">
    </form>
</div>
</div>
<?php require('../includes/footer.php'); ?>