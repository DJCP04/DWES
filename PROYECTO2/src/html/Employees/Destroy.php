<?php
require '../../../vendor/autoload.php';

use Models\Employee;

if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        $employee = new Employee();
        $employee->employee_id = $id;
        $employee->destroy();

        echo "<script>
                alert('✅ Employee eliminado correctamente');
                window.location.href = 'Employees_list.php';
              </script>";
        exit;
    } catch (Exception $e) {
        echo "<script>
                alert('❌ Error al eliminar: " . addslashes($e->getMessage()) . "');
                window.location.href = 'Employees_list.php';
              </script>";
        exit;
    }
}
