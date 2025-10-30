<?php
require('../includes/header.php');
require('../includes/nav.php');

require '../../../vendor/autoload.php';

use models\Employee;

$message = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $employee = new Employee(
            $_POST['employee_id'],
            $_POST['first_name'],
            $_POST['last_name'],
            null,
            null,
            null,
            $_POST['job_id'],
            null,
            null,
            null,
            $_POST['department_id']
        );
        $employee->save();
        echo "<script>
                alert('✅ Employee añadido correctamente');
                window.location.href = 'Emplopyees_list.php';
              </script>";
        exit;
    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
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

        <label>Department ID:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="department_id" required><br><br>

        <label>Job ID:</label><br>
        <input style="width: 80%; height: 40px;" type="text" value="IT_PROG" name="job_id" required><br><br>

        <input type="submit" value="Afegir Empleat">
    </form>

</div>
</div>
<?php require('../includes/footer.php'); ?>

</html>