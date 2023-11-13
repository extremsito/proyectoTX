<?php
// Verificar si se ha enviado un formulario de inicio de sesión
include("./interno/MySQLConnector.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($password);
    // Realizar una consulta para verificar las credenciales
    $query = "SELECT * FROM user WHERE nombre = '$username' AND password = '$password'";
    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);
        $_SESSION["username"] = $usuario["username"];
        $_SESSION["role_id"] = $usuario["role_id"];
        $_SESSION["id"] = $usuario["id"];

        // Redirigir según el rol
        if ($usuario["role_id"] == "1") {
            $_SESSION['authenticated'] = true;
            header("Location: admin.php");
        } elseif ($usuario["role_id"] == "2") {
            $_SESSION['authenticated'] = true;
            header("Location: treballador.php");
        } elseif ($usuario["role_id"] == "3") {
            $_SESSION['authenticated'] = true;
            header("Location: tecnic.php");
        } else {
            echo "Rol no válido.";
        }
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" autocomplete="off" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" autocomplete="off" required><br><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
