<?php
require('../includes/header.php');
require('../includes/nav.php');

require '../../../vendor/autoload.php';

use models\Department;

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $department = new Department(
            $_POST['department_id'],
            $_POST['department_name'],
            $_POST['manager_id'],
            $_POST['location_id']
        );
        $department->save();
        echo "<script>
            alert('✅ Customer añadido correctamente');
            window.location.href = 'Department_list.php';
        </script>";
        exit;
    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
<div id="section">
    <h1>Afegir un Nou Department</h1>
    <?= $message ?>

    <form method="POST" action="">
        <label>Department ID:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="department_id" required><br><br>

        <label>Department Name:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="department_name" required><br><br>

        <label>Manager ID:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="manager_id" required><br><br>

        <label>Location ID:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="location_id" required><br><br>

        <input type="submit" value="Afegir Department">
    </form>

</div>
</div>
<?php require('../includes/footer.php'); ?>

</html>