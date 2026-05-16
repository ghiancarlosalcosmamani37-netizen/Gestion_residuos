<?php
$registrar = new VanC();
$registrar->registrarVanC();

?>



<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">

            <div class="row loginContainer ">
                <div class="loginTitle">
                    <h4>Registrar Nuevo Vehiculo</h4>
                </div>
                
                <form method="post" action="" enctype='multipart/form-data'>
                    <div class="col s12 m12 16">
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Marca" aria-label="First name" name="MarcaR" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Modelo" aria-label="Last name" name="ModeloR" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Placa" aria-label="First name" name="PlacaR" maxlength="7" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" placeholder="Año" aria-label="Last name" name="AñoR" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
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