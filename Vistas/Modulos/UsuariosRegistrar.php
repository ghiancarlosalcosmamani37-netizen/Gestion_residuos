<?php
$registrar = new UsuarioC();
$registrar->registrarUsuarioC();

?>



<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">

            <div class="row loginContainer ">
                <div class="loginTitle">
                    <h4>Registrar Nuevo Usuario</h4>
                </div>

                <form method="post" action="" enctype='multipart/form-data'>
                <iframe id="myIframe" src="API reniec asincrona/index.php" frameborder="0" scrolling="no" seamless="seamless" style="display:block; width:100%; height:10vh;"></iframe>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Nombre de usuario" aria-label="First name" name="MarcaR" required>
                            </div>

                        </div>
                        <br>
                        <div class="col">
                            <input type="text" id="nombre_trbj" class="form-control" placeholder="Nombre y apellido " aria-label="Last name" name="ModeloR" required readonly>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <select class="form-control" name="opciones">
                                    <option value="">Seleccionar Cargo</option>
                                    <option value="1">Boletero</option>
                                    <option value="2">Agenciero</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <select class="form-control" aria-label="Lugar" name="LugarR" required onchange="habilitarDestino(this)">
                                    <option value="">Seleccionar Lugar de trabajo</option>
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
                        </div>
                        
                        <br>
                        <!-- Cambio -->
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" name="PlacaR" id="contrasena" maxlength="7" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('contrasena')">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Confirmar Contraseña" aria-label="Confirmar Contraseña" name="PlacaR1" id="confirmarContrasena" maxlength="7" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('confirmarContrasena')">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <div id="mensajeContrasena"></div>
                                <br>
                                <button class="btn btn-primary" type="submit" id="botonEnviar" name="guardar">Enviar</button>
                            </div>
                        </div>

                        <script>
                            function togglePasswordVisibility(inputId) {
                                var inputElement = document.getElementById(inputId);
                                if (inputElement.type === "password") {
                                    inputElement.type = "text";
                                } else {
                                    inputElement.type = "password";
                                }
                            }

                            document.getElementById("confirmarContrasena").addEventListener("input", function() {
                                var contrasena = document.getElementById("contrasena").value;
                                var confirmarContrasena = this.value;
                                var mensajeElement = document.getElementById("mensajeContrasena");
                                var botonEnviar = document.getElementById("botonEnviar");

                                if (contrasena === confirmarContrasena) {
                                    mensajeElement.textContent = "Las contraseñas coinciden.";
                                    mensajeElement.style.color = "green"; // Opcional: Cambiar color del mensaje si coinciden.
                                    botonEnviar.disabled = false; // Habilitar el botón cuando las contraseñas coinciden.
                                } else {
                                    mensajeElement.textContent = "Las contraseñas no coinciden.";
                                    mensajeElement.style.color = "red"; // Opcional: Cambiar color del mensaje si no coinciden.
                                    botonEnviar.disabled = true; // Bloquear el botón cuando las contraseñas no coinciden.
                                }
                            });

                            // Escuchar evento para recibir los datos del iframe
                             window.addEventListener('message', function(event) {
                             // Extraer los datos enviados desde el iframe
                              const {
                            dni,
                            nombre,
                            apellidos
                            } = event.data;

                            // Autocompletar el formulario con los datos recibidos
                            //document.getElementById('dni-formulario').value = dni;
                            document.getElementById('nombre_trbj').value = nombre +" "+ apellidos;
                            //document.getElementById('apellido-formulario').value = apellidos;

                             });
                        </script>


                        <!-- Cambio -->
                    </div>

            </div>
        </div>
    </div>
    </form>
</body>
</div>
</div>