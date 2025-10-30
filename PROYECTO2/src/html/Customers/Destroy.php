<?php

require '../../../vendor/autoload.php';

use models\Customer;


if (isset($_GET['id'])) {
    try {
        //Si tu Customer acepta el id en el constructor:
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $customer = new Customer($id);
        $customer->destroy();
        echo "<script>
                alert('✅ Customer eliminado correctamente');
              </script>";
    } catch (Exception $e) {
        echo "<p>Error en eliminar el customer: " . $e->getMessage() . "</p>";
    }
}
require('./Customers_list.php');
