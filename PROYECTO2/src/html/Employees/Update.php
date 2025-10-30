<?php
require('../includes/header.php');
require('../includes/nav.php');

require '../../../vendor/autoload.php';

use models\Employee;

$message = "";
$emp_id = $_GET["id"];
$name = $_GET["name"];
$last_name = $_GET["last_name"];
$dep_id = $_GET["dep_id"];
$job_id = $_GET["job_id"];




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $employee = new Employee(
            $_POST['emp_id'],
            $_POST['name'],
            $_POST['last_name'],
            null,
            null,
            null,
            $_POST['job_id'],
            null,
            null,
            null,
            $_POST['dep_id']
        );
        $employee->save();
        echo "<script>
                alert('✅ Employee modificado correctamente');
              </script>";
        header('Location: Employees_list.php?success=1');
        exit;
    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
<div id="section">
    <h1>Modificar un Employee</h1>
    <?= $message ?>

    <form method="POST" action="">
        <label>ID Employee:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="emp_id" value="<?= $emp_id ?>" readonly><br><br>

        <label>Nombre:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="name" value="<?= $name ?>" required><br><br>

        <label>Apellido:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="last_name" value="<?= $last_name ?>" required><br><br>

        <label>Department ID:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="dep_id" value="<?= $dep_id ?>" required><br><br>

        <label>Job ID:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="job_id" value="<?= $job_id ?>" required><br><br>

        <input type="submit" value="Afegir Empleat">
    </form>

</div>
</div>
<?php require('../includes/footer.php'); ?>

</html>