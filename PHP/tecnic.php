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
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Edicion de Incidencias</title>
</head>
<body>
<h1>Bienvenido,
        <?php echo $_SESSION['username'] ?> 
        <form method="POST">
            <input type="hidden" name="hidden" value="1">
            <input type="submit" value="Cerrar Sesión">
        </form></h1>
    <h2>Formulario de Edicion</h2>
    <nav>
            <ul>
                <li><a href="../PHP/interno/mostar_incidencias_ejecucion.php">Incidencias Ejecucion</a></li> 
                <li><a href="../PHP/interno/mostar_incidencias_finalizado.php">Incidencias Finalizado</a></li>

            </ul>
        </nav>
    <form action="./interno/editar_incidencias.php" method="post">
                <label for="id_incidencia">Id Incidencia:</label>
                <select name="id_incidencia" id="id_incidencia">
                    <?php 
                        require_once "./interno/MySQLConnector.php";
                        $sql = "SELECT * FROM incidencias";
                        $result = mysqli_query($mysql, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_incidencia'] . "'>" . $row['id_incidencia'] . ". ";
                        }
                    ?>
                </select><br><br>
                

        <label for="estado">Estat:</label>
        <input list="estados" type="text" name="estado" id="estado" pattern="Ejecucion|Finalizado" required><br><br>
        <datalist id="estados">
      <option value="Ejecucion">
      <option value="Finalizado">
        </datalist>
        
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" required></textarea><br><br>
        



        <input type="submit" value="Editar incidencia"> <br><br>
    </form>
    <form action="./interno/borrar_incidencias.php" method="post">
    <label for="id_incidencia">Id Incidencia:</label>
                <select name="id_incidencia" id="id_incidencia">
                    <?php 
                        require_once "./interno/MySQLConnector.php";
                        $sql = "SELECT * FROM incidencias";
                        $result = mysqli_query($mysql, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_incidencia'] . "'>" . $row['id_incidencia'] . ". ";
                        }
                    ?>
                </select><br><br>
                <input type="submit" value="Borrar incidencia"> <br><br>
    </form>
</body>
</html>