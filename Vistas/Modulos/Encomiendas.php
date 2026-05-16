<?php
require_once "Modelos/conexionBD.php";
$conexion = ConexionBD::cBD();

$empleados = new EmpleadosC();
$pagina = $empleados->mostrarEmpleadosC();
$empleados->favoritoEmpleadoC();
$empleados->QfavoritoEmpleadoC();
$empleados->ArchivarEmpleadoC();
$empleados->borrarEmpleadoC();


// consulta para obtener los destinos
$result = $conexion->query("SELECT ID, Lugar FROM rutas");
$result = $conexion->query("SELECT DISTINCT Lugar FROM usuario WHERE TipoUS != 3");

// Comprueba si la consulta fue exitosa
if ($result === false) {
    die("Error: " . $conexion->error);
}

// Recupera las provincias
$provincias = $result->fetch_all(MYSQLI_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores del formulario
    $lugar = isset($_POST['lugar']) ? $_POST['lugar'] : '';
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $hora_recepcion = isset($_POST['hora-recepcion']) ? $_POST['hora-recepcion'] : '';
    $hora_viaje = isset($_POST['hora-viaje']) ? $_POST['hora-viaje'] : '';
    $remitente = isset($_POST['remitente']) ? $_POST['remitente'] : '';
    $dni = isset($_POST['DNI']) ? $_POST['DNI'] : '';
    $consignado = isset($_POST['consignado']) ? $_POST['consignado'] : '';
    $dni2 = isset($_POST['DNI2']) ? $_POST['DNI2'] : '';


    $telefono = isset($_POST['teléfono']) ? $_POST['teléfono'] : '';
    $direccion = isset($_POST['dirección']) ? $_POST['dirección'] : '';
    $destino = isset($_POST['destino']) ? $_POST['destino'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $kilos = isset($_POST['kilos']) ? filter_var($_POST['kilos'], FILTER_VALIDATE_FLOAT) : '';
    // $importe = isset($_POST['importe']) ? $_POST['importe'] : '';
    $total = isset($_POST['total']) ? $_POST['total'] : '';

    $numero_boleto = "Nº. " . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

    $sql = "INSERT INTO encomiendas (numero_boleto, dni, lugar, fecha, hora_recepcion, hora_viaje, remitente, consignado, dni2,telefono, direccion, destino, descripcion, kilos, total)
            VALUES ('$numero_boleto', '$dni', '$lugar', '$fecha', '$hora_recepcion', '$hora_viaje', '$remitente', '$consignado','$dni2','$telefono', '$direccion', '$destino', '$descripcion', '$kilos', '$total')";

    if ($conexion->query($sql) === TRUE) {
        $mensaje = "Datos ingresados correctamente.";
        $alertClass = "alert alert-success small";
    } else {
        $mensaje = "Error al ingresar los datos: " . $conexion->error;
        $alertClass = "alert alert-danger small";
    }

}

// Cerrar conexión
$conexion->close();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta de Pago</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-j4bWjC1l4Wp6V/0Rr1aTr6XuQaIGgyKb3QdLg1Jf6z8dCJ1pMjWwQ0N7gT1s6eZSp3iFJx8Nf5gQJ7N3ZlXEBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-FpA/daRngfU+Kz6iK8jwvZ5nXs8w1+Jf0t1y0C+1pD2yBvV71+V+GKt72XaUQI5L" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
</head>

<body>
    <?php if (!empty($mensaje)) { ?>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="<?php echo $alertClass; ?>" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="loginTitle">
        <h4>Ingreso de Encomiendas</h4>
    </div>

    <div class="container-sm bg-light">
        <form class="form-horizontal" method="POST" id="miFormulario">
        <iframe id="myIframe" src="API reniec asincrona/index.php" frameborder="0" scrolling="no" seamless="seamless" style="display:block; width:100%; height:10vh;"></iframe>
            <div class="row">
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="lugar" class="form-label">Lugar</label>
                        <select class="form-control" id="lugar" name="lugar" required>
                            <option value="">Selecciona una lugar</option>
                            <?php
                            foreach ($provincias as $provincia) {
                                echo "<option value=\"{$provincia['Lugar']}\">{$provincia['Lugar']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="col-sm-2">
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="mb-3">
                        <label for="hora-recepcion" class="form-label">Hora de recepción</label>
                        <input type="time" class="form-control" id="hora-recepcion" name="hora-recepcion" required>
                    </div>
                </div>

</body>

</html>

<div class="col-sm-2">
    <div class="mb-3">
        <label for="hora-viaje" class="form-label">Hora de viaje</label>
        <input type="time" class="form-control" id="hora-viaje" name="hora-viaje" required>
    </div>
</div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="mb-3">
            <label for="remitente" class="form-label">Remitente</label>
            <input type="text" class="form-control" id="remitente" name="remitente" required readonly>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="mb-3">
            <label for="DNI" class="form-label">DNI</label>
            <input type="number" class="form-control" id="DNI" name="DNI" maxlength="8"  readonly>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="mb-3">
            <label for="consignado" class="form-label">Consignado</label>
            <input type="text" readonly class="form-control" id="consignado" name="consignado" required readonly>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="mb-3">
            <label for="DNI" class="form-label">DNI</label>
            <input type="number" class="form-control" id="DNI2" name="DNI2" maxlength="8" required readonly>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="mb-3">
            <label for="teléfono" class="form-label">Teléfono</label>
            <input type="number" class="form-control" id="teléfono" maxlength="9" name="teléfono">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-7">
        <div class="mb-3">
            <label for="dirección" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="dirección" name="dirección">
        </div>
    </div>
    <div class="col-sm-3">
        <div class="mb-3">
            <label for="destino" class="form-label">Destino</label>
            <select class="form-control" id="destino" name="destino" required>
                <option value="">Selecciona una destino</option>
                <?php
                foreach ($provincias as $provincia) {
                    echo "<option value=\"{$provincia['Lugar']}\">{$provincia['Lugar']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="descripción" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" rows="4" name="descripcion"></textarea>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="mb-3">
            <label for="kilos" class="form-label">Kilos</label>
            <input type="text" class="form-control" id="kilos" name="kilos">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-7">
        <div class="mb-3 total"></div>
    </div>
    <div class="col-sm-4">
        <div class="mb-3">
            <label for="total" class="form-label">TOTAL S/</label>
            <input type="number" class="form-control" id="total" readonly name="total">
        </div>
    </div>
</div>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="submit" class="btn btn-primary me-md-2"><i class="fas fa-check-circle me-2"></i>Pagar</button>
    <button type="reset" class="btn btn-danger"><i class="fas fa-times-circle me-2"></i>Cancelar</button>
</div>
</form>

</div>
<script>
        // Escuchar evento para recibir los datos del iframe
        window.addEventListener('message', function(event) {
            // Extraer los datos enviados desde el iframe
            const {
                dni,
                nombre,
                apellidos
            } = event.data;

            // Verificar que los datos estén definidos antes de usarlos
    if (dni && nombre && apellidos) {
        // Autocompletar el formulario con los datos recibidos
        if (document.getElementById('DNI').value === '') {
            document.getElementById('DNI').value = dni;
            document.getElementById('remitente').value = nombre +" "+ apellidos;
        } else {
            document.getElementById('DNI2').value = dni;
            document.getElementById('consignado').value = nombre +" "+ apellidos;
        }
    }

        });
</script>
<script src="Encomiendas.js"></script>
<script src="Encomiendas2.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-8z0JXwE3BzjKdJtqk8cKXdv7UyLJxYFhjznjGK+XJhCRRM5fj4wP1S15e3P6Kwh" crossorigin="anonymous"></script>
</body>

</html>