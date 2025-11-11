<?php
session_start();
ob_start();

// Array de usuarios posibles
$users = [
    'root' => 'educacio1234',
    'user2' => 'password2',
];

// Recogida de variables
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Comprobación de usuario y contraseña
if (isset($users[$username]) && $users[$username] === $password) {
    $_SESSION['username'] = $username;
    header("Location: intranet.php");
    exit();
} else {
    // Redirige al login con mensaje de error
    $alert = urlencode("⚠️ Usuario o contraseña incorrectos");
    header("Location: /index.php?error=1");
    exit();
}

ob_end_flush();
