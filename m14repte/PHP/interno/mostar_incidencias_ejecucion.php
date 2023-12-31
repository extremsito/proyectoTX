<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../PHP/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Incidencias en Ejecucion</title>

</head>
<style>
    table {
        border-collapse: collapse;
        margin: 20px;
    }

    table th {
        background: rgba(128, 128, 128, 0.396);
        padding: 10px;
        /* border: 1px solid black; */
    }

    table td {
        /* border: 1px solid black;  */
        padding: 20px;
    }
</style>

<body>
    <h1>Incidencias en Ejecucion</h1>
    <?php
    require_once "MySQLConnector.php";
    session_start();
    $mostrar = $_SESSION["id"];

    if ($_SESSION["role_id"] == 2) {
        $query = "SELECT * FROM incidencias WHERE estado = 'Ejecucion' AND id_trabajador =$mostrar";
        $result = mysqli_query($mysql, $query);
        echo "<center>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Id Incidencia</th>";
        echo "<th>Equipo Afectado</th>";
        echo "<th>Fecha</th>";
        echo "<th>Estado</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Prioridad</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_incidencia'] . "</td>";
            echo "<td>" . $row['id_equipo'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td>" . $row['estado'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['prioridad'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } elseif ($_SESSION["role_id"] == 3) {
        $query = "SELECT * FROM incidencias WHERE estado = 'Ejecucion'";
        $result = mysqli_query($mysql, $query);
        echo "<center>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Id Incidencia</th>";
        echo "<th>Equipo Afectado</th>";
        echo "<th>Fecha</th>";
        echo "<th>Estado</th>";
        echo "<th>Descripcion</th>";
        echo "<th>Prioridad</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_incidencia'] . "</td>";
            echo "<td>" . $row['id_equipo'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td>" . $row['estado'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['prioridad'] . "</td>";
            echo "</tr>";
        }
    }

    if ($_SESSION["role_id"] == 2) {
        ?>

        <a href="../../PHP/treballador.php"><button id="logout">ATRAS</button></a>

        <?php
    } elseif ($_SESSION["role_id"] == 3) {
        ?>

        <a href="../../PHP/tecnic.php"><button id="logout">ATRAS</button></a>

        <?php
    }
    echo "</center>";
    ?>

</body>

</html>