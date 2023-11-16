<?php
session_start();

if (!$_SESSION['authenticated']) {
    header("Location: login.php");
}
elseif (isset($_POST['hidden'])) {
    session_destroy();
    header("Location: login.php");
}

if ($_SESSION['role_id'] !== "1") {
    echo "<script>alert('No eres admin'); location.href = '../PHP/login.php';</script>";
    session_destroy();
}


?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin</title>
</head>
<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Roboto:wght@300&display=swap');
    /* font-family: 'Dosis', sans-serif;
    font-family: 'Roboto', sans-serif; */
    /*html{
    font-family: 'Roboto', sans-serif;
    }
    #derecha{
        text-align: right;
    }

    .box {
        width: 40%;
        margin: 8%;
        background: rgba(128, 128, 128, 0.226);
        border-radius: 50px;
        padding: 5% 0%;
        transition: all 1s;
        box-shadow: 0px 0px 6px black;
        color: black;
    }

    .box h2 {
        font-family: 'Dosis', sans-serif;
        text-transform: uppercase;
    }

    .box form input {
        padding: 10px;
        border-radius: 25px;
        width: 40%;
    }

    #logout{
        width: 10%;
        border-radius: 10px;
        padding: 10px;
    }

    #logout:hover{
        width: 12%;
        background: rgba(128, 128, 128, 0.396);
        transition: all 0.5s;
    }
    #enviar{
        width: 25%;
        transition: all 0.2s;
    }

    #enviar:hover {
        width: 30%;
        background: rgba(128, 128, 128, 0.396);
        transition: all 0.5s;
    }
    .espai{
        margin: 10px;
    } */
</style>

<body>
    <div id="derecha">
        <h1>Bienvenido ADMIN</h1>
        <form method="POST">
            <input type="hidden" name="hidden" value="1">
            <input id="logout" type="submit" value="Cerrar Sesión">
        </form>
    </div>
    <center>
        <div class="box">
            <h2>Insertar Usuarios</h2>
            <form method="POST" action="./interno/insertar_usuarios.php" enctype="multipart/form-data">
                <div id="div1">
                    <div>
                        <label for="nombre">ID Rol:</label><br>
                        <input list="idsroles" type="text" name="role_id" id="role_id" pattern="1-Admin|2-Trabajador|3-Tecnico" autocomplete="off" required><br>
                        <datalist id="idsroles">
                            <option value="1-Admin">
                            <option value="2-Trabajador">
                            <option value="3-Tecnico">
                        </datalist>
                    </div>
                    <div>
                        <label for="nombre">Nom:</label><br>
                        <input type="text" name="nombre" pattern="[A-Za-z ]+" title="No se puede poner numeros" required>
                    </div>
                    <div>
                        <label for="nombre">Cognoms:</label><br>
                        <input type="text" name="apellido" pattern="[A-Za-z ]+" title="No se puede poner numeros" required>
                    </div>
                    <div>
                        <label for="nombre">Correu:</label><br>
                        <input type="email" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>

                    <div>
                        <label for="nombre">Contrasenya:</label><br>
                        <input type="password" name="password" required>
                    </div>
                    <div class="espai">
                        <input id="enviar" type="submit" value="Insertar usuario">
                    </div>
                </div>
            </form>
        </div>
    </center>
</body>

</html>