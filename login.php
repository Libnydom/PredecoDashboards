<?php
session_start(); // Inicia sesión

include("con_db.php");

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Verifica las credenciales del usuario
        $consulta = "SELECT u.*, c.Descripcion FROM usuarios u
                     JOIN Cargo c ON u.ID_Area = c.ID 
                     WHERE u.Nombre = ? AND u.Contraseña = ?";

        $stmt = mysqli_prepare($conex, $consulta);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($resultado) > 0) {
            $usuario = mysqli_fetch_assoc($resultado);
            $_SESSION['usuario'] = $username; // Guardar sesión

            // Verifica si la descripción es "Dirección"
            if ($usuario['Descripcion'] === "Direccion") {
                header("Location: direccion.html"); // Redirige a direccion.html
                exit();
            }
            // Verifica si es "Administrador"
            elseif ($usuario['Descripcion'] === "Administrador") {
                header("Location: direccion.html"); // Redirige a direccion.html
                exit();
            }
            // Verifica si es "Ventas"
            elseif ($usuario['Descripcion'] === "Ventas") {
                header("Location: ventas.html"); // Redirige a direccion.html
                exit();
            }
            // Verifica si es "CV"
            elseif ($usuario['Descripcion'] === "CV") {
                header("Location: CV.html"); // Redirige a direccion.html
                exit();
            } elseif ($usuario['Descripcion'] === "Bloqueras") {
                header("Location: bloqueras.html"); // Redirige a direccion.html
                exit();
            } else {
                echo "<h3 class='ok'>Bienvenido, $username!</h3>";
            }
        } else {
            echo "<h3 class='bad'>Usuario o contraseña incorrectos</h3>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<h3 class='bad'>Por favor, completa todos los campos</h3>";
    }
}
