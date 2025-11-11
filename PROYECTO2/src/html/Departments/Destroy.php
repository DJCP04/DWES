<?php

require '../../../vendor/autoload.php';

use models\Department;


if (isset($_GET['id'])) {
    try {
        //Si tu Customer acepta el id en el constructor:
        $id = $_GET['id'];
        $department = new Department($id);
        $department->destroy();
        echo "<script>
                alert('✅ Department eliminado correctamente');
              </script>";
    } catch (Exception $e) {
        echo "<script>
        alert('❌ ERROR AL ELIMINAR EL DEPARTMENT: " . addslashes($e->getMessage()) . "');
    </script>";
    }
}
require('./Departments_list.php');
