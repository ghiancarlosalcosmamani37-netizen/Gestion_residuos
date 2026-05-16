<!DOCTYPE html>
<html>

<head>
    <title>Boleta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Vistas/css/kevin-css.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>


<?php
require_once "Modelos/conexionBD.php";

$sql = "SELECT dni, nombre, apellido, origen, destino, precio, n_asiento, fecha FROM venta_boleto ORDER BY fecha DESC LIMIT 1";
$result = $conn->query($sql);

// Mostrar la tabla con el último boleto y el botón de imprimir
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<body>';
    // echo 'div class="boleta-container"';
    echo '<div class="imprimir boleta-container">';
    echo '<div class="logo">';
    echo '<img class="logo-img rounded-circle" src="Imagenes/Portada1.png" alt="Logo de la empresa">';
    echo '</div>';
    // echo '<br>';
    echo '<div class="nombre-empresa">';
    echo 'GFK TRANSPORTE INTERPROVINCIAL';
    echo '</div>';
    echo '<table class="table table-bordered">';
    echo '<tbody>';
    echo '<tr>';
    echo '<th>DNI</th>';
    echo '<td>' . $row["dni"] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>Nombre</th>';
    echo '<td>' . $row["nombre"] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>Apellido</th>';
    echo '<td>' . $row["apellido"] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>Origen</th>';
    echo '<td>' . $row["origen"] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>Destino</th>';
    echo '<td>' . $row["destino"] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>Precio</th>';
    echo '<td>' . $row["precio"] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>N° Asiento</th>';
    echo '<td>' . $row["n_asiento"] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>Fecha</th>';
    echo '<td>' . $row["fecha"] . '</td>';
    echo '</tr>';
    echo '</tbody>';
    echo '</table>';
    echo '<button class="btn btn-primary" onclick="imprimirTabla()">Imprimir</button>'; // Botón de imprimir
    echo '</div>';
    // echo '</div>';
    echo '</body>';
} else {
    echo "<p>No se encontraron boletos.</p>";
}

$conn->close();
?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Agrega el código JavaScript aquí
        function imprimirTabla() {
            document.querySelector('.btn-primary').style.display = 'none';
            window.print();
            document.querySelector('.btn-primary').style.display = 'block';
        }
    </script>


</html>