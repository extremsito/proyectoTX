<?php
session_start();

if (!$_SESSION['authenticated']) {
    header("Location: login.php");
}

if (isset($_POST['hidden'])) {
    session_destroy();
    header("Location: login.php");
}

?>

<html>

<head>
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="php.css">
</head>

<body>
    <h1>Bienvenido,
        <?php echo $_SESSION['username'] ?> 
        <form method="POST">
            <input type="hidden" name="hidden" value="1">
            <input type="submit" value="Cerrar Sesión">
        </form></h1>

        <form method="POST" action="./interno/insertar_usuarios.php" enctype="multipart/form-data">
            <div id="div1">
            <div>
                <label for="nombre">Nom:</label><br>
                <input type="text" name="nombre" required>
            </div>
            <div>
                <label for="nombre">Cognoms:</label><br>
                <input type="text" name="apellido" required>
            </div>
            <div>
                <label for="nombre">Correu:</label><br>
                <input type="email" name="correo" required>
            </div>

            <div>
                <label for="nombre">Contrasenya:</label><br>
                <input type="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Insertar usuario">
            </div>
            </div>
        </form>