<?php
$registrar = new DestinoC();
$registrar->registrarDestinoC();

?>



<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">

            <div class="row loginContainer ">
                <div class="loginTitle">
                    <h4>Registrar Nuevos Destinos</h4>
                </div>
                
                <form method="post" action="" enctype='multipart/form-data'>
                    <div class="col s12 m12 16">
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Lugar" aria-label="First name" name="LugarR" required>
                            </div>

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