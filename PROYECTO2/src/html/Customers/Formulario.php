<?php
require('../includes/header.php');
require('../includes/nav.php');
require '../../../vendor/autoload.php';

use Models\Customer;

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $customer = new Customer(
            $_POST['customer_id'],
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['cust_street_address'],
            $_POST['postal_code'],
            $_POST['city'],
            $_POST['state'],
            $_POST['country'],
            $_POST['phone'],
            $_POST['language'],
            $_POST['territory'],
            $_POST['credit_limit'],
            $_POST['email'],
            $_POST['account_mgr'],
            $_POST['geo_location'],
            $_POST['birth'],
            $_POST['marital'],
            $_POST['gender'],
            $_POST['income']
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

        <label>Apellido:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="last_name" required><br><br>

        <label>Nombre:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="first_name" required><br><br>

        <label>Dirección:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="cust_street_address" required><br><br>

        <label>Código Postal:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="postal_code"><br><br>

        <label>Ciudad:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="city"><br><br>

        <label>Provincia/Estado:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="state"><br><br>

        <label>País:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="country" value="ES"><br><br>

        <label>Teléfono:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="phone"><br><br>

        <label>Idioma:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="language" value="es"><br><br>

        <label>Territorio:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="territory" value="EUROPE"><br><br>

        <label>Límite de Crédito:</label><br>
        <input style="width: 80%; height: 40px;" type="number" step="0.01" name="credit_limit" required><br><br>

        <label>Email:</label><br>
        <input style="width: 80%; height: 40px;" type="email" name="email"><br><br>

        <label>ID Manager:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="account_mgr"><br><br>

        <label>Ubicación Geográfica:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="geo_location"><br><br>

        <label>Fecha de Nacimiento:</label><br>
        <input style="width: 80%; height: 40px;" type="date" name="birth"><br><br>

        <label>Estado Civil:</label><br>
        <select style="width: 80%; height: 40px;" name="marital">
            <option value="">Seleccionar</option>
            <option value="single">Soltero/a</option>
            <option value="married">Casado/a</option>
            <option value="divorced">Divorciado/a</option>
        </select><br><br>

        <label>Género:</label><br>
        <select style="width: 80%; height: 40px;" name="gender">
            <option value="">Seleccionar</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
            <option value="O">Otro</option>
        </select><br><br>

        <label>Nivel de Ingresos:</label><br>
        <select style="width: 80%; height: 40px;" name="income" required>
            <option value="">Seleccionar nivel de ingresos</option>
            <option value="A: Below 30,000">A: Below 30,000</option>
            <option value="B: 30,000 - 49,999">B: 30,000 - 49,999</option>
            <option value="C: 50,000 - 69,999">C: 50,000 - 69,999</option>
            <option value="D: 70,000 - 89,999">D: 70,000 - 89,999</option>
            <option value="E: 90,000 - 109,999">E: 90,000 - 109,999</option>
            <option value="F: 110,000 - 129,999">F: 110,000 - 129,999</option>
            <option value="G: 130,000 - 149,999">G: 130,000 - 149,999</option>
            <option value="H: 150,000 - 169,999">H: 150,000 - 169,999</option>
            <option value="I: 170,000 - 189,999">I: 170,000 - 189,999</option>
            <option value="J: 190,000 - 249,999">J: 190,000 - 249,999</option>
            <option value="K: 250,000 - 299,999">K: 250,000 - 299,999</option>
            <option value="L: 300,000 and above">L: 300,000 and above</option>
        </select><br><br>

        <input type="submit" value="Afegir Customer" class="btn btn-primary">
    </form>
</div>
</div>
<?php require('../includes/footer.php'); ?>