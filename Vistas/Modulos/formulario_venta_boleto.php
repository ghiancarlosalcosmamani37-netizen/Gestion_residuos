<?php
$registrar = new CrearusuarioC();
$registrar->registrar_venta_boletoC();

$empleados1 = new SalidaC();
$resultado = $empleados1->editarRutaC();
$IDViaje= $resultado['IDVIAJE']; 


$empleados = new EmpleadosC();
$pagina = $empleados->mostrar_asientoC($IDViaje);

$asientosNoDisponibles = array();
// Extraer los números de asientos disponibles del resultado del modelo
while ($row = $pagina->fetch_assoc()) {
    $asientosNoDisponibles[] = $row['n_asiento'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Formulario de Venta de Boleto</title>
    <link rel="stylesheet" type="text/css" href="Vistas/css/kevin-css.css">

</head>

<body>
    <div class="contenido">
        <h1>Venta de Boleto <?= $resultado['IDVIAJE'] ?></h1>

        <form method="post" action="">
        <iframe id="myIframe" src="API reniec asincrona/index.php" frameborder="0" scrolling="no" seamless="seamless" style="display:block; width:100%; height:10vh;"></iframe>

            <div class="row">
                <div class="col-md-4 form-group">

            <label for="dni">DNI:</label>
            <input type="text" id="dni-formulario" class="form-control" autocomplete="off" name="dni" readonly><br>
            </div><br><br><br><br>

            <div class="col-md-4 form-group">
            <label for="nombre">Nombres:</label>
            <input type="text" id="nombre-formulario" class="form-control" name="nombre" readonly><br>
            </div>

            <div class="col-md-4 form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido-formulario" class="form-control" name="apellido" readonly><br>
            </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
            <label for="origen">Origen:</label>
            <input type="text" name="origen" class="form-control" value="<?= $resultado['Lugar'] ?>" readonly required><br>
            </div><br><br><br><br>

            <div class="col-md-4 form-group">
            <label for="destino">Destino:</label>
            <input type="text" name="destino" class="form-control" value="<?= $resultado['Lugar1'] ?>" readonly required><br>
            </div>

            <div class="col-md-4 form-group">
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" class="form-control" name="precio" required><br>
            </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
            <label for="n_asiento">Número de Asiento:</label>
            <select name="n_asiento" class="form-control" required>
                <?php for ($i = 1; $i <= 15; $i++) : ?>
                    <?php if (!in_array($i, $asientosNoDisponibles)) : ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endif; ?>
                <?php endfor; ?>
            </select><br>



            </div>

               <div class="col-md-4 form-group">
                    <label for="fecha">Fecha y Hora:</label>
                    <input type="datetime-local" class="form-control" name="fecha" id="fecha" required><br>
                </div>
                <div class="col-md-4 form-group">
                    <input type="hidden" name="id_viaje" value="<?= $resultado['IDVIAJE'] ?>">
                    <input type="submit" name="guardar" class="btn btn-primary mt-4" value="Guardar">
                    <!-- boton para salir -->
    <a href='index.php?ruta=Salidas'> 
        <button type="button" class="btn btn-danger mt-4">Salir</button>
    </a>
                </div>


               <script>
    // Obtener el elemento de entrada de fecha y hora por su ID
    var inputFechaHora = document.getElementById('fecha');

    // Obtener la fecha y hora actual en el formato adecuado
    var fechaHoraActual = new Date();

    // Obtener los componentes de la fecha y hora
    var year = fechaHoraActual.getFullYear();
    var month = (fechaHoraActual.getMonth() + 1).toString().padStart(2, '0');
    var day = fechaHoraActual.getDate().toString().padStart(2, '0');
    var hours = fechaHoraActual.getHours().toString().padStart(2, '0');
    var minutes = fechaHoraActual.getMinutes().toString().padStart(2, '0');

    // Crear la cadena de fecha y hora en formato de 24 horas
    var fechaHoraFormato24 = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes;

    // Establecer la fecha y hora actual en el campo de entrada
    inputFechaHora.value = fechaHoraFormato24;
</script>
        </form>

        <h2>Asientos Disponibles</h2>
        <table id="tabla-asientos">
            <tr>
                <td colspan="2">Conductor</td>
                <td style="background-color: <?php echo in_array(1, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 1</td>
                <td style="background-color: <?php echo in_array(2, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 2</td>
            </tr>
            <tr>
                <td style="background-color: <?php echo in_array(3, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 3</td>
                <td style="background-color: <?php echo in_array(4, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 4</td>
                <td style="background-color: <?php echo in_array(5, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 5</td>
                <td></td> <!-- Espacio para los pasajeros caminen -->
            </tr>
            <tr>
                <td style="background-color: <?php echo in_array(6, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 6</td>
                <td style="background-color: <?php echo in_array(7, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 7</td>
                <td></td> <!-- Espacio para los pasajeros caminen -->
                <td style="background-color: <?php echo in_array(8, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 8</td>
            </tr>
            <tr>
                <td style="background-color: <?php echo in_array(9, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 9</td>
                <td style="background-color: <?php echo in_array(10, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 10</td>
                <td></td> <!-- Espacio para los pasajeros caminen -->
                <td style="background-color: <?php echo in_array(11, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 11</td>
            </tr>
            <tr>
                <td style="background-color: <?php echo in_array(12, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 12</td>
                <td style="background-color: <?php echo in_array(13, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 13</td>
                <td style="background-color: <?php echo in_array(14, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 14</td>
                <td style="background-color: <?php echo in_array(15, $asientosNoDisponibles) ? '#f6a8a8' : '#a3e5b0'; ?>">Asiento 15</td>
            </tr>
        </table>



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

            // Autocompletar el formulario con los datos recibidos
            document.getElementById('dni-formulario').value = dni;
            document.getElementById('nombre-formulario').value = nombre;
            document.getElementById('apellido-formulario').value = apellidos;

        });
    </script>
</body>

</html>