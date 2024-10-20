<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="logo-container"></div>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="post">
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Ingresar</button>
            <p>En caso de olvidar tu contraseña, contacta a soporte</p>
        </form>
    </div>
</body>

</html>