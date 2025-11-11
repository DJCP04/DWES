<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <title>Login </title>
  <link rel="stylesheet" href="./src/css/estilosLogin.css" />
</head>

<body>
  <form action="./src/logs/login.php  " method="POST">
    <h2>Iniciar Sessió</h2>

    <label for="username">Usuari:</label>
    <input type="text" id="username" name="username" required />

    <label for="password">Contrasenya:</label>
    <input type="password" id="password" name="password" required />

    <input type="submit" value="Iniciar Sessió" />
  </form>
</body>

</html>