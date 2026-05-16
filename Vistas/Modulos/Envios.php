<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mis Envíos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Mis Envíos</h4>
                    <a class="btn btn-primary" href="index.php?ruta=Encomiendas">Nuevo Envío</a>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <input type="text" id="busqueda" class="form-control"
                                placeholder="Buscar por número de boleto o DNI">
                        </div>

                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número de Boleto</th>
                            <th>DNI</th>
                            <th>DNI 2</th>
                            <th>Remitente</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody id="tablaEnvios">
                        <?php
                        $conexion = ConexionBD::cBD();
                        $sql = "SELECT * FROM Encomiendas";
                        $result = $conexion->query($sql);

                        if ($result->num_rows > 0) {
                            // Mostrar los registros en filas de la tabla
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["numero_boleto"] . "</td>";
                                echo "<td>" . $row["dni"] . "</td>";
                                echo "<td>" . $row["dni2"] . "</td>";
                                echo "<td>" . $row["remitente"] . "</td>";
                                echo "<td>" . $row["fecha"] . "</td>";
                                echo "<td>" . $row["telefono"] . "</td>";
                                echo "<td><button class='btn btn-primary ver-detalle' data-id='" . $row["id"] . "'><i class='fas fa-eye'></i> Ver detalle</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No se encontraron registros</td></tr>";
                        }
                        $conexion->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- por su ID de cada encomiedan Ver a detalle todo sus campos   -->
        <div class="modal fade" id="detalleModal" tabindex="-1" aria-labelledby="detalleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detalleModalLabel">Detalles de la encomienda</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="Encomiendas.js"></script>

</body>

</html>