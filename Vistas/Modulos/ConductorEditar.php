<?php
$empleados = new ConductorC();
$resultado = $empleados->editarConductorC();

$empleados->actualizarConductorC();
?>

<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">
            <div class="row loginContainer ">
                <div class="loginTitle">
                    <h4>Editar datos</h4>
                </div>
                <form method="post" action="" enctype='multipart/form-data'>
                    <div class="col s12 m12 16">
                        <br>
                        <div class="loginTitle">
                            <input type="hidden" value="<?= $resultado['ID'] ?>" name="idE" required>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <label for="inputEmail4" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="floatingInput" placeholder="Nombre(s)" aria-label="First name" name="nombreE" value='<?= $resultado['Nombre'] ?>' required>
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Apellido</label>
                                <input type="text" class="form-control" placeholder="Apellidos" aria-label="Last name" name="apellidoE" value='<?= $resultado['Apellido'] ?>' required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputEmail4" class="form-label">DNI</label>
                                <input type="text" class="form-control" placeholder="Nombre(s)" aria-label="First name" name="dniE" value='<?= $resultado['DNI'] ?>' maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  required>
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Numero de Licencia de Conducir</label>
                                <input type="text" class="form-control" placeholder="Apellidos" aria-label="Last name" name="licenciaE" value='<?= $resultado['Numero de Licencia'] ?>' required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Telefono</label>
                                <input type="text" class="form-control" placeholder="Nombre(s)" aria-label="First name" name="telefonoE" value='<?= $resultado['Telefono'] ?>' maxlength="9" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Numero de Cuenta Bancaria</label>
                                <input type="text" class="form-control" placeholder="Apellidos" aria-label="Last name" name="cuentaE" value='<?= $resultado['NumeroCuentabancaria'] ?>' required>
                            </div>
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-primary" type="submit" name="actualisar">Actualizar</button>
                        </div>
                    </div>
            </div>
        </div>
        </form>
</body>