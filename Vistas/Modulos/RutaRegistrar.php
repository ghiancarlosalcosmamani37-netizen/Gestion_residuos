<?php
$registrar = new RutaC();
$registrar->registrarRutaC();

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">

            <div class="row loginContainer ">
                <div class="loginTitle">
                    <h4>Registrar Nuevo Ruta</h4>
                </div>

                <form method="post" action="" enctype='multipart/form-data'>
                    <div class="col s12 m12 16">
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="date" class="form-control" placeholder="Fecha" aria-label="First name" name="FechaR" required>
                            </div>
                            <div class="col">
                                <input type="time" class="form-control" placeholder="Hora" aria-label="Last name" name="HoraR" required>
                            </div>
                        </div>
                        <script>
                            // Obtener la fecha actual
                            var fechaActual = new Date().toISOString().split('T')[0];

                            // Obtener el elemento de entrada de fecha
                            var fechaInput = document.querySelector('input[type="date"]');

                            // Establecer el atributo 'min' en el elemento de entrada de fecha
                            fechaInput.setAttribute('min', fechaActual);

                            // Verificar la fecha seleccionada cuando cambia
                            fechaInput.addEventListener('change', verificarFecha);

                            function verificarFecha() {
                                var fechaSeleccionada = fechaInput.value;

                                // Comparar la fecha seleccionada con la fecha actual
                                if (fechaSeleccionada < fechaActual) {
                                    alert('No puedes seleccionar una fecha pasada a la actual.');
                                    // Restablecer el valor de fecha seleccionado
                                    fechaInput.value = '';
                                }
                            }
                        </script>
                        <br>
                        <!-- Seleccion -->

                        <div class="row">
                            <div class="col">
                                <select class="form-control" aria-label="Salida" name="SalidaR" required onchange="habilitarDestino(this)">
                                    <option value="">Seleccionar Salida</option>
                                    <?php
                                    // Conexión a la base de datos
                                    $conn = mysqli_connect('localhost', 'root', '', 'Apurimeño');

                                    // Consulta para obtener los datos de salida y destino
                                    $query = "SELECT ID, Lugar FROM rutas";
                                    $result = mysqli_query($conn, $query);

                                    // Generar las opciones de selección
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['ID'];
                                        $lugar = $row['Lugar'];
                                        echo '<option value="' . $id . '">' . $lugar . '</option>';
                                    }

                                    // Cerrar conexión a la base de datos
                                    mysqli_close($conn);
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-control" aria-label="Destino" name="DestinoR" required id="destinoSelect" disabled>
                                    <option value="">Seleccionar Llegada</option>
                                </select>
                            </div>
                        </div>

                        <script>
                            function habilitarDestino(select) {
                                var destinoSelect = document.getElementById('destinoSelect');
                                var opcionesDestino = destinoSelect.getElementsByTagName('option');

                                // Habilitar el campo de llegada
                                destinoSelect.disabled = false;

                                // Limpiar opciones anteriores
                                while (destinoSelect.firstChild) {
                                    destinoSelect.removeChild(destinoSelect.firstChild);
                                }

                                // Agregar las opciones de selección al campo de llegada
                                for (var i = 1; i < select.options.length; i++) {
                                    var id = select.options[i].value;
                                    var lugar = select.options[i].text;

                                    if (id !== select.value) {
                                        var nuevaOpcion = document.createElement('option');
                                        nuevaOpcion.value = id;
                                        nuevaOpcion.textContent = lugar;
                                        destinoSelect.appendChild(nuevaOpcion);
                                    }
                                }
                            }
                        </script>

                        <!-- Seleccion -->
                        <br>



                        <div class="row">
                        <div class="col">
                                <input type="text" class="form-control" id="vehiculo" name="VehiculoR" placeholder="Placa del vehiculo" required>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    var vehiculos = [];
                                    <?php
                                    // Conexión a la base de datos
                                    $conn = mysqli_connect('localhost', 'root', '', 'Apurimeño');

                                    // Consulta para obtener los datos de salida
                                    $query = "SELECT * FROM van";
                                    $result = mysqli_query($conn, $query);

                                    // Generar las opciones de selección
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo 'vehiculos.push("' . $row['Placa'] . '");';
                                    }

                                    // Cerrar conexión a la base de datos
                                    mysqli_close($conn);
                                    ?>
                                    $("#vehiculo").autocomplete({
                                        source: function(request, response) {
                                            var results = $.ui.autocomplete.filter(vehiculos, request.term);
                                            if (!results.length) {
                                                response([{
                                                    label: 'No se encontraron coincidencias',
                                                    value: -1
                                                }]);
                                            } else {
                                                response(results.slice(0, 5)); // Esto limita las coincidencias a las 5 primeras.
                                            }
                                        },
                                        select: function(event, ui) {
                                            if (ui.item.value === -1) {
                                                event.preventDefault();
                                                $(this).val(''); // Esto deja el campo de texto vacío si el usuario no selecciona una opción.
                                            }
                                        },
                                        messages: {
                                            noResults: '', // Esto elimina el mensaje cuando no se encuentran resultados.
                                            results: function() {} // Esto elimina el mensaje cuando se encuentran resultados.
                                        },
                                        minLength: 1, // Esto asegura que el autocompletado comienza después de que se haya ingresado al menos 1 carácter.
                                        open: function() {
                                            $('.ui-autocomplete').css('width', $('#vehiculo').width() + 'px'); // Esto hace que el ancho del menú desplegable coincida con el del campo de entrada.
                                            $('.ui-autocomplete').css('background-color', 'white'); // Esto establece el color de fondo del menú desplegable en blanco.
                                            $('.ui-autocomplete').css('list-style-type', 'none'); // Esto elimina los puntos de la lista.
                                        }
                                    });
                                });

                                // Esto cambia el color de fondo a azul claro (como el elemento <option>) y el color de la letra a blanco cuando pasas el mouse por encima de una opción.
                                $(document).on('mouseenter', '.ui-menu-item', function() {
                                    $(this).children().css('background-color', '#ADD8E6');
                                    $(this).children().css('color', 'white');
                                });

                                // Esto cambia el color de fondo a blanco y el color de la letra a negro cuando el mouse deja de estar encima de una opción.
                                $(document).on('mouseleave', '.ui-menu-item', function() {
                                    $(this).children().css('background-color', 'white');
                                    $(this).children().css('color', 'black');
                                });
                            </script>
                            <div class="col">
                                <input type="text" id="conductor" class="form-control" name="ConductorR" placeholder="Nombre del chofer" required>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    var conductores = [];
                                    <?php
                                    // Conexión a la base de datos
                                    $conn = mysqli_connect('localhost', 'root', '', 'Apurimeño');
                                    // Consulta para obtener los datos de salida
                                    $query = "SELECT * FROM chofer";
                                    $result = mysqli_query($conn, $query);
                                    // Generar las opciones de selección
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $nombreCompleto = $row['Apellido'] . ' ' . $row['Nombre'];
                                        echo 'conductores.push("' . $nombreCompleto . '");';
                                    }
                                    // Cerrar conexión a la base de datos
                                    ?>
                                    $("#conductor").autocomplete({
                                        source: function(request, response) {
                                            var results = $.ui.autocomplete.filter(conductores, request.term);
                                            if (!results.length) {
                                                response([{
                                                    label: 'No se encontraron coincidencias',
                                                    value: -1
                                                }]);
                                            } else {
                                                response(results.slice(0, 5)); // Esto limita las coincidencias a las 5 primeras.
                                            }
                                        },
                                        select: function(event, ui) {
                                            event.preventDefault(); // Esto detiene la propagación del evento.
                                            if (ui.item.value === -1) {
                                                $(this).val(''); // Esto deja el campo de texto vacío si el usuario no selecciona una opción.
                                            } else {
                                                $(this).val(ui.item.label); // Esto establece el valor del campo de texto al valor seleccionado.
                                            }
                                        },
                                        messages: {
                                            noResults: '', // Esto elimina el mensaje cuando no se encuentran resultados.
                                            results: function() {} // Esto elimina el mensaje cuando se encuentran resultados.
                                        },
                                        minLength: 1, // Esto asegura que el autocompletado comienza después de que se haya ingresado al menos 1 carácter.
                                        open: function() {
                                            $('.ui-autocomplete').css('width', $('#conductor').width() + 'px'); // Esto hace que el ancho del menú desplegable coincida con el del campo de entrada.
                                            $('.ui-autocomplete').css('background-color', 'white'); // Esto establece el color de fondo del menú desplegable en blanco.
                                            $('.ui-autocomplete').css('list-style-type', 'none'); // Esto elimina los puntos de la lista.
                                        }
                                    });
                                });
                            </script>
                            </div>

                        </div>
                    <br>
                    <div>
                        <button class="btn btn-primary" type="submit" name="guardar">Enviar</button>
                    </div>
            </div>
        </div>
    </div>
    </form>
</body>
</div>
</div>