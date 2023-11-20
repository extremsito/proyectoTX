<?php
session_start();

if (!$_SESSION['authenticated']) {
    header("Location: login.php");
} elseif (isset($_POST['hidden'])) {
    session_destroy();
    header("Location: login.php");
}
if ($_SESSION['role_id'] !== "3") {
    echo "<script>alert('No eres tecnico'); location.href = '../PHP/login.php';</script>";
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
    <title>Tecnico</title>
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

        <div class="inc">
            <nav>
                <ul>
                    <li class="left"><a href="../PHP/interno/mostar_incidencias_ejecucion.php">Incidencias en
                            Ejecucion</a></li>
                    <li class="right"><a href="../PHP/interno/mostar_incidencias_finalizado.php">Incidencias
                            Finalizadas</a></li>
                </ul>
            </nav>
        </div>
        <div class="box">
            <h2>Formulario de Edicion</h2>
            <form action="./interno/editar_incidencias.php" method="post">
                <label for="id_incidencia">Id Incidencia:</label><br>
                <select name="id_incidencia" id="id_incidencia">
                    <?php
                    require_once "./interno/MySQLConnector.php";
                    $sql = "SELECT * FROM incidencias WHERE estado = 'Ejecucion'";
                    $result = mysqli_query($mysql, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id_incidencia'] . "'>" . $row['id_incidencia'] . ". ";
                        echo "<value='" . $row['descripcion'] . "'>" . $row['descripcion'] . ". ";
                    }
                    ?>
                </select><br><br>
                <!-- <label for="estado">Estat:</label> -->
                <input placeholder="Estado..." list="estados" type="text" name="estado" id="estado"
                    pattern="Ejecucion|Finalizado" autocomplete="off" required><br><br>
                <datalist id="estados">
                    <option value="Ejecucion">
                    <option value="Finalizado">
                </datalist>

                <label for="descripcion">Que has hecho para solucionarlo?:</label><br>
                <textarea placeholder="Solución..." name="descripcion" id="descripcion" rows="4" 
                    required></textarea><br><br>

                <input type="submit" value="Editar incidencia"> <br><br>
            </form>
            <form action="./interno/borrar_incidencias.php" method="post">
                <label for="id_incidencia">Id Incidencia:</label><br>
                <select name="id_incidencia" id="id_incidencia">
                    <?php
                    require_once "./interno/MySQLConnector.php";
                    $sql = "SELECT * FROM incidencias WHERE estado ='Finalizado'";
                    $result = mysqli_query($mysql, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id_incidencia'] . "'>" . $row['id_incidencia'] . ". ";
                    }
                    ?>
                </select><br><br>
                <input type="submit" value="Borrar incidencia"> <br><br>
            </form>
        </div>
    </center>
</body>

</html>