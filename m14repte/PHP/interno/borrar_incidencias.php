<?php
    require_once "MySQLConnector.php";

    $id_incidencia = $_POST;
    $mysqlborrar = "DELETE FROM incidencias WHERE id_incidencia = " . $id_incidencia['id_incidencia'];

    echo $mysqlborrar;

    $resultatborrar = mysqli_query($mysql, $mysqlborrar);
    
    echo "<br>";

    if ($resultatborrar) {
        echo "<script>alert('Incidencia borrada correctamente'); location.href = '../tecnic.php';</script>";
    } else {
        echo "<script>alert('Incidencia no borrada'); location.href = '../tecnic.php';</script>";
    }
?>