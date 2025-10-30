<?php
require('../includes/header.php');
require('../includes/nav.php');

require '../../../vendor/autoload.php';

use Models\Customer;

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Crear nuevo customer
        $customer = new Customer(
            $_POST['customer_id'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['cust_street_address'], // street address
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
            alert('✅ Customer añadido correctamente');
            window.location.href = 'Customers_list.php';
        </script>";
        exit;
    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
<div id="section">
    <h1>Afegir un Nou Customer</h1>
    <?= $message ?>
    <form method="POST" action="">
        <label>ID Customer:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="customer_id" required><br><br>

        <label>Llinatge:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="last_name" required><br><br>

        <label>Nom:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="first_name" required><br><br>

        <label>Direcció :</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="cust_street_address" required><br><br>

        <label>Credit Limit :</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="credit_limit" required><br><br>
        <input type="submit" value="Afegir Customer">
    </form>

</div>
</div>
<?php require('../includes/footer.php'); ?>