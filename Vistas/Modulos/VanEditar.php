<?php
$empleados = new VanC();
$resultado = $empleados->editarVanC();

$empleados->actualizarVanC();
?>

<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">
            <div class="row loginContainer ">
                <div class="loginTitle">
                    <h4>Editar datos del vehiculo</h4>
                </div>
                <form method="post" action="" enctype='multipart/form-data'>
                    <div class="col s12 m12 16">
                        <br>
                        <div class="loginTitle">
                            <input type="hidden" value="<?= $resultado['IDV'] ?>" name="idE" required>
                        </div>
                        <div class="row">
                            <div class="col ">
                                <label for="inputEmail4" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="floatingInput" placeholder="Nombre(s)" aria-label="First name" name="marcaE" value='<?= $resultado['Marca'] ?>' required>
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Modelo</label>
                                <input type="text" class="form-control" placeholder="Apellidos" aria-label="Last name" name="modeloE" value='<?= $resultado['Modelo'] ?>' required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Placa</label>
                                <input type="text" class="form-control" placeholder="Nombre(s)" aria-label="First name" name="placaE" value='<?= $resultado['Placa'] ?>' maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  required>
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Año</label>
                                <input type="text" class="form-control" placeholder="Apellidos" aria-label="Last name" name="añoE" value='<?= $resultado['Año'] ?>' required>
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