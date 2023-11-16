<?php
session_start();

if (!$_SESSION['authenticated']) {
    header("Location: login.php");
}
elseif (isset($_POST['hidden'])) {
    session_destroy();
    header("Location: login.php");
}
if ($_SESSION['role_id'] !== "2") {
    echo "<script>alert('No eres trabajador'); location.href = '../PHP/login.php';</script>";
    session_destroy();
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
    <title>Trabajador</title>
</head>

<body>
    <div id="derecha">
        <h1>Bienvenido</h1>
        <?php echo $_SESSION["username"] ?>
        <form method="POST">
            <input type="hidden" name="hidden" value="1">
            <input id="logout" type="submit" value="Cerrar Sesión">
        </form>
    </div>
    <center>
        <div class="inc">
            <nav>
                <ul>
                    <li class="left"><a href="../PHP/interno/mostar_incidencias_ejecucion.php">Incidencias en Ejecucion</a></li>
                    <li class="right"><a href="../PHP/interno/mostar_incidencias_finalizado.php">Incidencias Finalizadas</a></li>
                </ul>
            </nav>
        </div>

        <div class="box">
            <h2>Formulario de Registro</h2>
            <form action="./interno/insertar_incidencias.php" method="post">



                <label for="id_equipo">Equipo afectado:</label><br>
                <select placeholder="Equipo afectados" name="id_equipo" id="id_equipo">
                    <?php
                    require_once "./interno/MySQLConnector.php";
                    $sql = "SELECT * FROM equipos";
                    $result = mysqli_query($mysql, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id_equipo'] . "'>" . $row['id_equipo'] . ". ";
                    }
                    ?>
                </select><br><br>

                <!-- <label for="estado">Estado:</label> -->
                <input list="estados" type="text" name="estado" id="estado" pattern="Pausado|Ejecucion" placeholder="Estado" required><br><br>
                <datalist id="estados">
                    <option value="Pausado">
                    <option value="Ejecucion">
                </datalist>

                <!-- <label for="descripcion">Descripción:</label><br> -->
                <textarea placeholder="Descripcion del problema" name="descripcion" id="descripcion" rows="4" required></textarea><br><br>

                <!-- <label for="prioridad">Prioridad:</label> -->
                <input placeholder="Prioridad" list="prioridades" type="text" name="prioridad" id="prioridad" pattern="Alta|Media|Baja" required><br><br>
                <datalist id="prioridades">
                    <option value="Alta">
                    <option value="Media">
                    <option value="Baja">
                </datalist>


                <input id="enviar" type="submit" value="Insertar incidencia">
            </form>
        </div>
    </center>
</body>

</html>