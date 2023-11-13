<?php        
require_once "MySQLConnector.php";
session_start();


    $mysqlSt = "INSERT INTO incidencias ( id_trabajador, id_equipo, fecha, estado, descripcion, prioridad) 
    VALUES ( '". $_SESSION["id"] . "', '" . $_POST["id_equipo"] . "', '" .  $_POST["fecha"]=date('Y/m/d') . "','" . $_POST["estado"] . "', '" . $_POST["descripcion"] . "', '" . $_POST["prioridad"] . "')"; 
    echo $mysqlSt;
// '" . $_POST["id_incidencia"] . "', '" . $_POST["id_trabajador"] . "',
    $result = mysqli_query($mysql, $mysqlSt);
    
    echo "<br>";

    if ($result) {
        echo "<script>alert('Incidencia inserida correctamente'); location.href = '../treballador.php';</script>";
    } else {
        echo "<script>alert('Incidencia no inserida'); location.href = '../treballador.php';</script>";
    }
?>