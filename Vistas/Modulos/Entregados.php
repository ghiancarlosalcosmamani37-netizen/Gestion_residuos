<?php
require_once "Modelos/conexionBD.php";
$conexion = ConexionBD::cBD();

$hora_actual = date("H:i:s");
$fecha_actual = date("Y-m-d");

$sql = "SELECT numero_boleto, consignado, destino FROM Encomiendas 
WHERE (fecha < CURDATE() OR (fecha = CURDATE() AND hora_viaje < CURTIME())) AND estado = 1";

$resultado = $conexion->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['entregado'])) {
    $numero_boleto = $_POST['numero_boleto'];

    $checkSql = "SELECT numero_boleto FROM Encomiendas WHERE numero_boleto = ? AND estado = 1";
    $stmtCheck = $conexion->prepare($checkSql);
    $stmtCheck->bind_param("s", $numero_boleto);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows > 0) {
        $updateSql = "UPDATE Encomiendas SET estado = 0 WHERE numero_boleto = ?";
        $stmt = $conexion->prepare($updateSql);
        $stmt->bind_param("s", $numero_boleto);
        $stmt->execute();
    }

    header("Refresh:0");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seguimiento</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-3">Mis Seguimientos</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" id="busqueda" class="form-control"
                                placeholder="Buscar por número de boleto o remitente">
                        </div>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nº de paquete</th>
                            <th>Consignado</th>
                            <th>Destino</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody id="tablaEntregados">
                        <?php
                        while ($row = $resultado->fetch_assoc()) {
                            $numero_boleto = $row['numero_boleto'];
                            $consignado = $row['consignado'];
                            $destino = $row['destino'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $numero_boleto; ?>
                                </td>
                                <td>
                                    <?php echo $consignado; ?>
                                </td>
                                <td>
                                    <?php echo $destino; ?>
                                </td>
                                <td>
                                    <!-- <form method="POST" action="">
                                        <input type="hidden" name="numero_boleto" value="php echo $numero_boleto; ?>">
                                        <button type="submit" class="btn btn-success" name="entregado">Entregado</button>
                                    </form> -->

                                    <button class="btn btn-success">Entregado</button>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="Encomiendas.js"></script>


</body>
</html>