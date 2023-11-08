<?php
// Verificar si se ha enviado un formulario de inicio de sesión
session_start();



// Comprobar las credenciales de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($username == "admin" && $password == "admin") {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        header('Location: admin.php');
        exit;
    } elseif($username == "treballador" && $password == "1234") {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        header('Location: treballador.php');
        exit;
    } elseif($username == "Tecnic" && $password == "1234") {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        header('Location: tecnic.php');
        exit;
    } else{
        echo "Sessión inválida";

    }
        

}

// Resto del código HTML para mostrar el formulario de inicio de sesión
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
