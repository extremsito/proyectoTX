<?php
    require_once "MySQLConnector.php";

    $mysqlSt = "INSERT INTO user (nombre, apellido, correo, password) 
    VALUES ('" . $_POST["nombre"] . "', '" . $_POST["apellido"] . "', '" . $_POST["correo"] . "', '" . hash("md5", $_POST["password"]) . "')"; 

    echo $mysqlSt;

    $result = mysqli_query($mysql, $mysqlSt);
    
    echo "<br>";

    if ($result) {
        echo "<script>alert('Usuario inserido correctamente'); location.href = '../admin.php';</script>";
    } else {
        echo "<script>alert('Usuario no inserido'); location.href = '../admin.php';</script>";
    }
?>