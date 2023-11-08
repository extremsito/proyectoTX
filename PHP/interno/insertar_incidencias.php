<?php
    require_once "MySQLConnector.php";

    $mysqlSt = "INSERT INTO incidencias (id_incidencia, id_trabajador, id_tecnico, fecha, estado, descripcion, prioridad) 
    VALUES ('" . $_POST["id_incidencia"] . "', '" . $_POST["id_trabajador"] . "', '" . $_POST["id_tecnico"] . "', '" .  $_POST["fecha"] . "','" . $_POST["estado"] . "', '" . $_POST["descripcion"] . "', '" . $_POST["prioridad"] . "')"; 

    echo $mysqlSt;

    $result = mysqli_query($mysql, $mysqlSt);
    
    echo "<br>";

    if ($result) {
        echo "<script>alert('Incidencia inserida correctamente'); location.href = '../treballador.php';</script>";
    } else {
        echo "<script>alert('Incidencia no inserida'); location.href = '../treballador.php';</script>";
    }
?>