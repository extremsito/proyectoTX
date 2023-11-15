<html>

<head>
    <title>Incidencias en Ejecucion</title>
    <meta charset="utf-8">

</head>

<body>
    <h1>Incidencias en Ejecucion</h1>
    <?php
    require_once "MySQLConnector.php";
    session_start();

    $query = "SELECT * FROM incidencias WHERE estado = 'Ejecucion'";
    $result = mysqli_query($mysql, $query);

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<p><b>Id Incidencia:</b> " . $row['id_incidencia'] . "</p>";
        echo "<p><b>Equipo afectado:</b> " . $row['id_equipo'] . "</p>";
        echo "<p><b>Fecha:</b> " . $row['fecha'] . "</p>";
        echo "<p><b>Estado:</b> " . $row['estado'] . "</p>";
        echo "<p><b>Descripción:</b> " . $row['descripcion'] . "</p>";
        echo "<p><b>Prioridad:</b> " . $row['prioridad'] . "</p>";
        echo "<br>";
    }
    if ($_SESSION["role_id"] == 2) {
        ?>
        
         <button><a href="../../PHP/treballador.php">Atras</a></button>
        
        <?php
    }
    elseif ($_SESSION["role_id"] == 3) {
        ?>
        
         <button><a href="../../PHP/tecnic.php">Atras</a></button>
        
        <?php
    }
    ?>

</body>

</html>