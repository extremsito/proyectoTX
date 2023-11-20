<?php        
require_once "MySQLConnector.php";
session_start();


    $mysqlSt = "INSERT INTO equipos ( sistema_operativo, marca) 
    VALUES ( '" . $_POST["sistema_operativo"] . "', '" . $_POST["marca"] . "')"; 
    echo $mysqlSt;
    $result = mysqli_query($mysql, $mysqlSt);
    
    echo "<br>";

    if ($result) {
        echo "<script>alert('Equipo inserido correctamente'); location.href = '../admin.php';</script>";
    } else {
        echo "<script>alert('Equipo no inserido'); location.href = '../admin.php';</script>";
    }
?>