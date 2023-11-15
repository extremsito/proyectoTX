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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Inicio de Sesión</title>
</head>

<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Roboto:wght@300&display=swap');
    /* font-family: 'Dosis', sans-serif;
    font-family: 'Roboto', sans-serif; */
    /*.box {
        width: 40%;
        margin: 10%;
        background: rgba(128, 128, 128, 0.226);
        border-radius: 50px;
        padding: 5% 0%;
        transition: all 1s;
        box-shadow: 0px 0px 6px black;
        color: black;
    }
    .box h2{
        font-family: 'Dosis', sans-serif;
        text-transform: uppercase;
    }
    .box form input{
        padding: 10px;
        border-radius: 25px;
        width: 40%;
    }

    #enviar{
        width: 25%;
        transition: all 0.2s;
    }

    #enviar:hover{
        width: 30%;
        
        background: rgba(128, 128, 128, 0.396);
        transition: all 0.5s;
    } */

</style>
<body>
    <center>
        <div class="box">
            <h2>Iniciar Sesión</h2>
            <form method="POST">
                <!-- <label for="username">Nombre de usuario:</label><br> -->
                <i class='bx bxs-user-circle'></i>
                <input placeholder="Nombre de usuario" type="text" id="username" name="username" autocomplete="off" required><br><br>

                <!-- <label for="password">Contraseña:</label><br> -->
                <i class='bx bx-key'></i>
                <input placeholder="Password" type="password" id="password" name="password" autocomplete="off" required><br><br>

                <input id="enviar" type="submit" value="Iniciar Sesión">
            </form>
        </div>

    </center>

</body>

</html>