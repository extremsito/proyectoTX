<html>
<head>
    <title>Incidencias Finalizadas</title>
    <meta charset="utf-8">

</head>
<body>
    <h1>Incidencias Finalizadas</h1>
    <?php
        require_once "MySqlConnector.php";

        $query = "SELECT * FROM incidencias WHERE estado = 'Finalizado'";
        $result = mysqli_query($mysql, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<p><b>Id Incidencia:</b> " . $row['id_incidencia'] . "</p>";
            echo "<p><b>Equipo afectado:</b> " . $row['id_equipo'] . "</p>";
            echo "<p><b>Fecha:</b> " . $row['fecha'] . "</p>";
            echo "<p><b>Estado:</b> " . $row['estado'] . "</p>";
            echo "<p><b>Descripción:</b> " . $row['descripcion'] . "</p>";
            echo "<br>";
        }

    ?>

</body>
</html>