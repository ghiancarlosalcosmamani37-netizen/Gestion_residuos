<?php
$empleados = new DestinoC();
$resultado = $empleados->editarDestinoC();

$empleados->actualizarDestinoC();
?>

<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">
            <div class="row loginContainer ">
                <div class="loginTitle">
                    <h4>Editar datos del destino</h4>
                </div>
                <form method="post" action="" enctype='multipart/form-data'>
                    <div class="col s12 m12 16">
                        <br>
                        <div class="loginTitle">
                            <input type="hidden" value="<?= $resultado['ID'] ?>" name="idE" required>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <label for="inputEmail4" class="form-label">Destinos</label>
                                <input type="text" class="form-control" id="floatingInput" placeholder="Lugar" aria-label="First name" name="LugarE" value='<?= $resultado['Lugar'] ?>' required>
                            </div>
                            
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" name="actualisar">Actualizar</button>
                        </div>
                    </div>
            </div>
        </div>
        </form>
</body>