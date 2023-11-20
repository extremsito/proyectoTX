<?php
session_start();

if (!$_SESSION['authenticated']) {
    header("Location: login.php");
} elseif (isset($_POST['hidden'])) {
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

<body>
    <div id="derecha">
        <h1>Bienvenido
            <?php echo $_SESSION['username'] ?>
        </h1>
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
                        <input list="idsroles" type="text" name="role_id" id="role_id"
                            pattern="1-Admin|2-Trabajador|3-Tecnico" autocomplete="off" required><br>
                        <datalist id="idsroles">
                            <option value="1-Admin">
                            <option value="2-Trabajador">
                            <option value="3-Tecnico">
                        </datalist>
                    </div>
                    <div>
                        <label for="nombre">Nom:</label><br>
                        <input type="text" name="nombre" pattern="[A-Za-z ]+" title="No se puede poner numeros"
                            required>
                    </div>
                    <div>
                        <label for="nombre">Cognoms:</label><br>
                        <input type="text" name="apellido" pattern="[A-Za-z ]+" title="No se puede poner numeros"
                            required>
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

        <div class="box">

            <h2>Insertar Equipos</h2>
            <form method="POST" action="./interno/insertar_equipos.php" enctype="multipart/form-data">
                <div id="div1">
                    <div>
                        <label for="nombre">Sistema Operativo:</label><br>
                        <input list="sisop" type="text" name="sistema_operativo" id="sistema_operativo"
                            pattern="Windows|Linux|MacOS" autocomplete="off" required><br>
                        <datalist id="sisop">
                            <option value="Windows">
                            <option value="Linux">
                            <option value="MacOS">
                        </datalist>
                    </div>
                    <div>
                        <label for="nombre">Marca:</label><br>
                        <input type="text" name="marca" pattern="[A-Za-z ]+" title="No se puede poner numeros" autocomplete="off"required>
                    </div>
                    <div>
                        <label for="nombre">Localizacion:</label><br>
                        <input type="text" name="localizacion" pattern="[A-Za-z0-9.]+"autocomplete="off" required>
                    </div>
                    <div>
                        <label for="nombre">IP:</label><br>

                        <input type="text" name="ip" pattern="([0-9]{1,3}\.){3}[0-9]{1,3}"autocomplete="off"
                            title="Es una IP" required>

                    </div>
                    <div>
                        <label for="nombre">Descripcion:</label><br>
                        <textarea placeholder="Descripcion del equipo" name="descripcion" id="descripcion" rows="4"
                            required></textarea><br><br>
                    </div>
                    <div class="espai">
                        <input id="enviar" type="submit" value="Insertar equipo">
                    </div>
                </div>
            </form>
        </div>
    </center>
</body>

</html>