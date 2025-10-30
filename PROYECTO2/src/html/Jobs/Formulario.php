<?php
require('../includes/header.php');
require('../includes/nav.php');
require '../../../vendor/autoload.php';


use models\Job;

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $job = new Job(
            $_POST['job_id'],
            $_POST['job_title'],
            $_POST['min_salary'],
            $_POST['max_salary']
        );
        $job->save();
        echo "<script>
            alert('✅ Job añadido correctamente');
            window.location.href = 'Jobs_list.php';
        </script>";
        exit;
        header('Location: Jobs_list.php?success=1');
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
        <input style="width: 80%; height: 40px;" type="text" name="job_id" required><br><br>

        <label>Job Title:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="job_title" required><br><br>

        <label>Min salary:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="min_salary" required><br><br>

        <label>Max salary:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="max_salary" required><br><br>

        <input type="submit" value="Afegir Job">
    </form>

</div>
</div>
<?php require('../includes/footer.php'); ?>

</html>