<?php
$registrar = new ConductorC();
$registrar->registrarConductorC();

?>



<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">

            <div class="row loginContainer ">
                <div class="loginTitle">
                    <h4>Registrar Nuevo Conductor</h4>
                </div>
                
                <form method="post" action="" enctype='multipart/form-data'>
                <iframe id="myIframe" src="API reniec asincrona/index.php" frameborder="0" scrolling="no" seamless="seamless" style="display:block; width:100%; height:10vh;"></iframe>
                    <div class="col s12 m12 16">
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" id="nombre_cnd" class="form-control" placeholder="Nombre(s)" aria-label="First name" name="nombreR" required readonly>
                            </div>
                            <div class="col">
                                <input type="text" id="apellido_cnd" class="form-control" placeholder="Apellidos" aria-label="Last name" name="apellidoR" required readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="number" id="dni_cnd" class="form-control" placeholder="DNI" aria-label="First name" name="DNIR" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Numero de Licencia" aria-label="Last name" name="LicenciaR" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="number" class="form-control" placeholder="Telefono" aria-label="First name" name="TelefonoR" maxlength="9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" placeholder="Numero de cuenta bancaria" aria-label="Last name" name="CuentaR" required>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div>
                        <button class="btn btn-primary" type="submit" name="guardar">Enviar</button>
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
                            document.getElementById('dni_cnd').value = dni;
                            document.getElementById('nombre_cnd').value = nombre;
                            document.getElementById('apellido_cnd').value = apellidos;

                             });
                    </script>
            </div>
        </div>
    </div>
    </form>
</body>
</div>
</div>