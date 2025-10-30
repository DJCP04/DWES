<?php
require('../includes/header.php');
require('../includes/nav.php');

require '../../../vendor/autoload.php';

use models\Department;

$message = "";

$dep_id = $_GET['id'];
$dep_name = $_GET['name'];
$dep_man_id = $_GET['manager'];
$dep_loc_id = $_GET['location'];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $department = new Department(
            $_POST['dep_id'],
            $_POST['dep_name'],
            $_POST['dep_man_id'],
            $_POST['dep_loc_id']
        );
        $department->save();
        echo "<script>
            alert('✅ Department modificado correctamente');
            window.location.href = 'Departments_list.php';
        </script>";
        exit;
    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
<div id="section">
    <h1>Modifica un Nou Department</h1>
    <?= $message ?>

    <form method="POST" action="">
        <label>Department ID:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="dep_id" value="<?= $dep_id ?>" readonly><br><br>

        <label>Department Name:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="dep_name" value="<?= $dep_name ?>" required><br><br>

        <label>Manager ID:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="dep_man_id" value="<?= $dep_man_id ?>" required><br><br>

        <label>Location ID:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="dep_loc_id" value="<?= $dep_loc_id ?>" required><br><br>

        <input type="submit" value="Modificar Department">
    </form>

</div>
</div>
<?php require('../includes/footer.php'); ?>

</html>