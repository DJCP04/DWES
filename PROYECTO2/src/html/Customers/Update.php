<?php
require('../includes/header.php');
require('../includes/nav.php');

require '../../../vendor/autoload.php';

use Models\Customer;

$message = "";
$cust_id = $_GET['id'];
$name = $_GET['name'];
$last_name = $_GET['last_name'];
$address = $_GET['address'];
$credit_limit = $_GET['credit_limit'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Crear nuevo customer
        $customer = new Customer(
            $_POST['cust_id'],
            $_POST['name'],
            $_POST['last_name'],
            $_POST['address'], // street address
            null, // postal code
            null, // city
            null, // state
            null, // country
            null, // phone
            null, // language
            null, // territory
            $_POST['credit_limit'], // credit limit
            null, // email
            null, // account mgr
            null, // geo location
            null, // birth
            null, // marital
            null, // gender
            null  // income
        );
        $customer->save();
        echo "<script>
            alert('✅ Customer modificado correctamente');
            window.location.href = 'Customers_list.php';
        </script>";
        exit;
    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
<div id="section">
    <h1>Modificar un Customer</h1>
    <?= $message ?>
    <form method="POST" action="">
        <label>ID Customer:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="cust_id" value="<?= $cust_id ?>" readonly><br><br>

        <label>Llinatge:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="last_name" value="<?= $last_name ?>" required><br><br>

        <label>Nom:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="name" value="<?= $name ?>" required><br><br>

        <label>Direcció :</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="address" value="<?= $address ?>" required><br><br>

        <label>Credit Limit :</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="credit_limit" value="<?= $credit_limit ?>" required><br><br>
        <input type="submit" value="Modificar Customer">
    </form>

</div>
</div>
<?php require('../includes/footer.php'); ?>