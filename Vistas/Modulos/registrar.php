<?php
$registrar = new EmpleadosC();
$registrar->registrarEmpleadosC();

?>

<div class="loginTitle">
    <h4>REGISTRAR UNA NUEVA NOTA</h4>
</div>

<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">
            <div class="row loginContainer ">
                <form method="post" action="" enctype='multipart/form-data'>
                    <div class="col s12 m12 16">
                        <div class="loginTitle">
                            <input type="text" placeholder="Titulo" name="nombreR" required>
                        </div>
                        <div class="row 3">
                            <div class="col s12 m5">
                                <?php date_default_timezone_set('America/Lima');
                                $fecha_actual = date('Y-m-d\TH:i:s');
                                $datosC['hoy'] = $fecha_actual; ?>
                                <input type="datetime-local" placeholder="Fecha" value="<?= $datosC['hoy'] ?>" name="emailR" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <textarea placeholder="Contenido" name="apellidoR" required style="height: 200px"></textarea>

                            </div>
                        </div>
                        <div class="row file-field input-field">
                            <div class="s12  btn deep-purple darken-1 ">
                                <span>Subir foto</span>
                                <input type="file" name="foto">

                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">

                            </div>
                        </div>


                    </div>
                    <div>
                        <button class="btn col l12 s12 m12 btnLogin" type="submit" name="guardar">Enviar</button>

                    </div>
            </div>
        </div>
    </div>
    </form>
</body>
</div>
</div>