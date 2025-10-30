<?php

require '../../../vendor/autoload.php';

use models\Job;


if (isset($_GET['id'])) {
    try {
        //Si tu Customer acepta el id en el constructor:
        $id = $_GET['id'];
        $job = new Job($id);
        $job->destroy();
        echo "<script>
                alert('✅ Job eliminado correctamente');
              </script>";
    } catch (Exception $e) {
        echo "<p>Error en eliminar el Job: " . $e->getMessage() . "</p>";
    }
}
require('./Jobs_list.php');
