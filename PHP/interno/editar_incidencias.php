<?php
    require_once "MySQLConnector.php";

$result = mysqli_query($mysql, "SELECT * FROM incidencias WHERE id_incidencia = " . $_POST['id_incidencia']);
$row = mysqli_fetch_assoc($result);
$id_incidencia = $row['id_incidencia'];
$estado = $_POST['estado'];
$descripcion = $_POST['descripcion'];



// $mysqlupdate = "UPDATE incidencias SET id_incidencia ='" . $id_incidencia . "', estado = '" . $estado . "', descripcion = '" . $descripcion . "',  prioridad = '" . $prioridad . "' ' WHERE id_incidencia = " . $_POST['id_incidencia'];
$mysqlupdate = "UPDATE incidencias SET estado = '" . $estado . "', descripcion = '" . $descripcion . "' WHERE id_incidencia = " . $id_incidencia;

echo $mysqlupdate;

$resultatupdate = mysqli_query($mysql, $mysqlupdate);

if ($resultatupdate) {
    echo "<script>alert('Incidencia actualizada correctamente'); location.href = '../tecnic.php';</script>";
} else {
    echo "<script>alert('Incidencia no actualizada'); location.href = '../tecnic.php';</script>";
}
?>
