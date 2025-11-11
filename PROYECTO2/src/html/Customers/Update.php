<?php
require '../../../vendor/autoload.php';

use Models\Customer;

// Get all customer data from URL parameters with null coalescing
$message = "";
$cust_id = $_GET['id'] ?? '';
$name = $_GET['name'] ?? '';
$last_name = $_GET['last_name'] ?? '';
$address = $_GET['address'] ?? '';
$credit_limit = $_GET['credit_limit'] ?? '';
$postal_code = $_GET['postal_code'] ?? '';
$city = $_GET['city'] ?? '';
$state = $_GET['state'] ?? '';
$country = $_GET['country'] ?? 'ES';
$phone = $_GET['phone'] ?? '';
$language = $_GET['language'] ?? 'es';
$territory = $_GET['territory'] ?? 'EUROPE';
$email = $_GET['email'] ?? '';
$account_mgr = $_GET['account_mgr'] ?? '';
$geo_location = $_GET['geo_location'] ?? '';
$birth = $_GET['birth'] ?? '';
$marital = $_GET['marital'] ?? '';
$gender = $_GET['gender'] ?? '';
$income = $_GET['income'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $customer = new Customer(
            $_POST['cust_id'],
            $_POST['name'],
            $_POST['last_name'],
            $_POST['address'],
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
            alert('✅ Customer modificado correctamente');
            window.location.href = 'Customers_list.php';
        </script>";
        exit;
    } catch (Exception $e) {
        $message = "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    }
}

require('../includes/header.php');
require('../includes/nav.php');
?>

<div id="section">
    <h1>Modificar un Customer</h1>
    <?= $message ?>

    <form method="POST" action="">
        <label>ID Customer:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="cust_id" value="<?= htmlspecialchars($cust_id) ?>" readonly><br><br>

        <label>Apellido:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="last_name" value="<?= htmlspecialchars($last_name) ?>" required><br><br>

        <label>Nombre:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="name" value="<?= htmlspecialchars($name) ?>" required><br><br>

        <label>Dirección:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="address" value="<?= htmlspecialchars($address) ?>" required><br><br>

        <label>Código Postal:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="postal_code" value="<?= htmlspecialchars($postal_code) ?>"><br><br>

        <label>Ciudad:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="city" value="<?= htmlspecialchars($city) ?>"><br><br>

        <label>Provincia/Estado:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="state" value="<?= htmlspecialchars($state) ?>"><br><br>

        <label>País:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="country" value="<?= htmlspecialchars($country) ?>"><br><br>

        <label>Teléfono:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="phone" value="<?= htmlspecialchars($phone) ?>"><br><br>

        <label>Idioma:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="language" value="<?= htmlspecialchars($language) ?>"><br><br>

        <label>Territorio:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="territory" value="<?= htmlspecialchars($territory) ?>"><br><br>

        <label>Límite de Crédito:</label><br>
        <input style="width: 80%; height: 40px;" type="number" step="0.01" name="credit_limit" value="<?= htmlspecialchars($credit_limit) ?>" required><br><br>

        <label>Email:</label><br>
        <input style="width: 80%; height: 40px;" type="email" name="email" value="<?= htmlspecialchars($email) ?>"><br><br>

        <label>ID Manager:</label><br>
        <input style="width: 80%; height: 40px;" type="number" name="account_mgr" value="<?= htmlspecialchars($account_mgr) ?>"><br><br>

        <label>Ubicación Geográfica:</label><br>
        <input style="width: 80%; height: 40px;" type="text" name="geo_location" value="<?= htmlspecialchars($geo_location) ?>"><br><br>

        <label>Fecha de Nacimiento:</label><br>
        <input style="width: 80%; height: 40px;" type="date" name="birth" value="<?= htmlspecialchars($birth) ?>"><br><br>

        <label>Estado Civil:</label><br>
        <select style="width: 80%; height: 40px;" name="marital">
            <option value="">Seleccionar</option>
            <option value="single" <?= $marital === 'single' ? 'selected' : '' ?>>Soltero/a</option>
            <option value="married" <?= $marital === 'married' ? 'selected' : '' ?>>Casado/a</option>
            <option value="divorced" <?= $marital === 'divorced' ? 'selected' : '' ?>>Divorciado/a</option>
        </select><br><br>

        <label>Género:</label><br>
        <select style="width: 80%; height: 40px;" name="gender">
            <option value="">Seleccionar</option>
            <option value="M" <?= $gender === 'M' ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= $gender === 'F' ? 'selected' : '' ?>>Femenino</option>
            <option value="O" <?= $gender === 'O' ? 'selected' : '' ?>>Otro</option>
        </select><br><br>

        <label>Nivel de Ingresos:</label><br>
        <select style="width: 80%; height: 40px;" name="income" required>
            <option value="">Seleccionar nivel de ingresos</option>
            <option value="A: Below 30,000" <?= ($income === 'A: Below 30,000') ? 'selected' : '' ?>>A: Below 30,000</option>
            <option value="B: 30,000 - 49,999" <?= ($income === 'B: 30,000 - 49,999') ? 'selected' : '' ?>>B: 30,000 - 49,999</option>
            <option value="C: 50,000 - 69,999" <?= ($income === 'C: 50,000 - 69,999') ? 'selected' : '' ?>>C: 50,000 - 69,999</option>
            <option value="D: 70,000 - 89,999" <?= ($income === 'D: 70,000 - 89,999') ? 'selected' : '' ?>>D: 70,000 - 89,999</option>
            <option value="E: 90,000 - 109,999" <?= ($income === 'E: 90,000 - 109,999') ? 'selected' : '' ?>>E: 90,000 - 109,999</option>
            <option value="F: 110,000 - 129,999" <?= ($income === 'F: 110,000 - 129,999') ? 'selected' : '' ?>>F: 110,000 - 129,999</option>
            <option value="G: 130,000 - 149,999" <?= ($income === 'G: 130,000 - 149,999') ? 'selected' : '' ?>>G: 130,000 - 149,999</option>
            <option value="H: 150,000 - 169,999" <?= ($income === 'H: 150,000 - 169,999') ? 'selected' : '' ?>>H: 150,000 - 169,999</option>
            <option value="I: 170,000 - 189,999" <?= ($income === 'I: 170,000 - 189,999') ? 'selected' : '' ?>>I: 170,000 - 189,999</option>
            <option value="J: 190,000 - 249,999" <?= ($income === 'J: 190,000 - 249,999') ? 'selected' : '' ?>>J: 190,000 - 249,999</option>
            <option value="K: 250,000 - 299,999" <?= ($income === 'K: 250,000 - 299,999') ? 'selected' : '' ?>>K: 250,000 - 299,999</option>
            <option value="L: 300,000 and above" <?= ($income === 'L: 300,000 and above') ? 'selected' : '' ?>>L: 300,000 and above</option>
        </select><br><br>

        <input type="submit" value="Modificar Customer" class="btn btn-primary">
    </form>
</div>
</div>
<?php require('../includes/footer.php'); ?>