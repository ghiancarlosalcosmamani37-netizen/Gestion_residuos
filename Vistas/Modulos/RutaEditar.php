<?php
$empleados = new RutaC();
$resultado = $empleados->editarRutaC();

$empleados->actualizarRutaC();
?>

<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">
            <div class="row loginContainer ">
                <div class="loginTitle">
                    <h4>Editar Salidas</h4>
                </div>
                <style>
                    .readonly-input {
                        background-color: #f5f5f5;
                        /* Cambia el color de fondo a uno deseado */
                    }
                </style>
                <form method="post" action="" enctype='multipart/form-data'>
                    <div class="col s12 m12 16">
                        <br>
                        <div class="loginTitle">
                            <input type="hidden" value="<?= $resultado['IDVIAJE'] ?>" name="idE" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Fecha</label>
                                <input type="text" class="form-control readonly-input" id="floatingInput" placeholder="Nombre(s)" aria-label="First name" name="salidaE" value='<?= $resultado['Salida'] ?>' readonly required>
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Hora</label>
                                <input type="text" class="form-control readonly-input" placeholder="Apellidos" aria-label="Last name" name="llegadaE" value='<?= $resultado['LLegada'] ?>' readonly required>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Salida</label>
                                <input type="text" class="form-control readonly-input" id="floatingInput" placeholder="Nombre(s)" aria-label="First name" name="partidaE" value='<?= $resultado['Lugar'] ?>' readonly required>
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Destino</label>
                                <input type="text" class="form-control readonly-input" placeholder="Apellidos" aria-label="Last name" name="destinoE" value='<?= $resultado['Lugar1'] ?>' readonly required>
                            </div>
                        </div>
                        <br>
                        <!-- opcion -->
                        <div class="row">

                            <div class="col">
                                <label for="inputEmail4" class="form-label">Vehiculo</label>
                                <select class="form-control" aria-label="Vehiculo" name="vanE" required>
                                    <option value='<?= $resultado['IDV'] ?>'><?= $resultado['Placa'] ?></option>
                                    <?php
                                    // Conexión a la base de datos
                                    $conn = mysqli_connect('localhost', 'root', '', 'Apurimeño');

                                    // Consulta para obtener los datos de salida
                                    $query = "SELECT * FROM van";
                                    $result = mysqli_query($conn, $query);

                                    // Generar las opciones de selección
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $idVehiculo = $row['IDV']; // Obtener la ID del vehiculo
                                        echo '<option value="' . $idVehiculo . '">' . $row['Placa'] . '</option>';
                                    }

                                    // Cerrar conexión a la base de datos
                                    mysqli_close($conn);
                                    ?>
                                </select>
                            </div>



                            <div class="col">
                                <label for="inputEmail4" class="form-label">Conductor</label>
                                <select class="form-control" aria-label="Conductora" name="choferE" required>
                                    <option value="<?= $resultado['ID'] ?>"><?= $resultado['Apellido']. ' ' .$resultado['Nombre']  ?></option>
                                    <?php
                                    // Conexión a la base de datos
                                    $conn = mysqli_connect('localhost', 'root', '', 'Apurimeño');

                                    // Consulta para obtener los datos de destino
                                    $query = "SELECT * FROM chofer";
                                    $result = mysqli_query($conn, $query);

                                    // Generar las opciones de selección
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $idConductor = $row['ID']; // Obtener la ID del conductor
                                        $nombreCompleto = $row['Apellido'] . ' ' . $row['Nombre'];
                                        echo '<option value="' . $idConductor . '">' . $nombreCompleto . '</option>';
                                    }



                                    // Cerrar conexión a la base de datos
                                    mysqli_close($conn);
                                    ?>
                                </select>






                            </div>



                        </div>
                        <!-- opcion -->
                        <br>
                        <div>
                            <button class="btn btn-primary" type="submit" name="actualisar">Actualizar</button>
                        </div>
                    </div>
            </div>
        </div>
        </form>
</body>