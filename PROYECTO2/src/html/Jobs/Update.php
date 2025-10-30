<?php
require('../includes/header.php');
require('../includes/nav.php');
require '../../../vendor/autoload.php';


use models\Job;

$message = "";

$job_id = $_GET['id'];
$title = $_GET['title'];
$min = $_GET['min'];
$max = $_GET['max'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $job = new Job(
            $_POST['job_id'],
            $_POST['title'],
            $_POST['min'],
            $_POST['max']
        );
        $job->save();
        echo "<script>
            alert('✅ Job modificado correctamente');
            window.location.href = 'Jobs_list.php';
        </script>";
        exit;
    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
<div id="section">
    <h1>Afegir un Nou Job</h1>
    <?= $message ?>

    <form method="POST" action="">
        <label>Job ID:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="job_id" value="<?= $job_id ?>" readonly><br><br>

        <label>Job Title:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="title" value="<?= $title ?>" required><br><br>

        <label>Min salary:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="min" value="<?= $min ?>" required><br><br>

        <label>Max salary:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="max" value="<?= $max ?>" required><br><br>

        <input type="submit" value="Afegir Job">
    </form>

</div>
</div>
<?php require('../includes/footer.php'); ?>

</html>