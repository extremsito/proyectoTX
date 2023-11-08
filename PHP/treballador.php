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
    <h2>Formulario de Registro</h2>
    <form action="./interno/insertar_incidencias.php" method="post">
        <label for="id_tabajador">ID Treballador:</label>
        <input type="text" name="id_trabajador" id="id_trabajador" required><br><br>
        
        <label for="id_tecnico">ID Tecnic:</label>
        <input type="text" name="id_tecnico" id="id_tecnico" required><br><br>

        <label for="estado">Estat:</label>
        <input type="text" name="estado" id="estado" required><br><br>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="4" required></textarea><br><br>
        
        <label for="prioridad">Prioritat:</label>
        <input type="text" name="prioridad" id="prioridad" required><br><br>


        <input type="submit" value="Insertar incidencia">
    </form>
</body>
</html>
