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
    <title>Formulario de Registro de Incidencias</title>
</head>
<body>
<h1>Bienvenido,
        <?php echo $_SESSION["username"] ?> 
        <form method="POST">
            <input type="hidden" name="hidden" value="1">
            <input type="submit" value="Cerrar Sesión">
        </form></h1>
        <nav>
            <ul>
                <li><a href="../PHP/interno/mostar_incidencias_ejecucion.php">Incidencias Ejecucion</a></li> 
                <li><a href="../PHP/interno/mostar_incidencias_finalizado.php">Incidencias Finalizado</a></li>
            </ul>
        </nav>
    <h2>Formulario de Registro</h2>
    <form action="./interno/insertar_incidencias.php" method="post">
        
    

        <label for="id_equipo">Equip afectat:</label>
                <select name="id_equipo" id="id_equipo">
                    <?php 
                        require_once "./interno/MySQLConnector.php";
                        $sql = "SELECT * FROM equipos";
                        $result = mysqli_query($mysql, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['id_equipo'] . "'>" . $row['id_equipo'] . ". ";
                        }
                    ?>
                </select><br><br>

        <label for="estado">Estat:</label>
        <input list="estados" type="text" name="estado" id="estado" pattern="Pausado|Ejecucion" required><br><br>
        <datalist id="estados">
      <option value="Pausado">
      <option value="Ejecucion">
        </datalist>
    
        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" required></textarea><br><br>
        
        <label for="prioridad">Prioritat:</label>
        <input list="prioridades" type="text" name="prioridad" id="prioridad" pattern="Alta|Media|Baja" required><br><br>
        <datalist id="prioridades">
      <option value="Alta">
      <option value="Media">
      <option value="Baja">
        </datalist>


        <input type="submit" value="Insertar incidencia">
    </form>
</body>
</html>
