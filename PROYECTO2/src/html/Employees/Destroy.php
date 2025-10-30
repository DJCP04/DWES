<?php

require '../../../vendor/autoload.php';

use models\Employee;


if (isset($_GET['id'])) {
    try {
        //Si tu Customer acepta el id en el constructor:
        $id = $_GET['id'];
        $employee = new Employee($id);
        $employee->employee_id = $id;
        $employee->destroy();
        echo "<script>
                alert('✅ Employee eliminado correctamente');
              </script>";
    } catch (Exception $e) {
        echo "<p>Error en eliminar el Employee: " . $e->getMessage() . "</p>";
    }
}
require('./Employees_list.php');
