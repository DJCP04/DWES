<?php
session_start(); // Inicia o asocia la sesión existente
ob_start(); // Permite usar header() después de salida

require('../html/includes/header.php');
require('../html/includes/nav.php');
require('../../vendor/autoload.php');

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Si no hay sesión activa, redirige al login
    header("Location: login.php");
    exit();
}

ob_end_flush(); // Envía el contenido del buffer
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pàgina Protegida</title>
</head>

<body>
    <div id="section">
        <h3>Human Resource and Order Entries Management</h3>
    </div>


</body>

</html>