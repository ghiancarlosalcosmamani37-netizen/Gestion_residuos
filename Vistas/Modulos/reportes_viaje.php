<?php
$empleados = new SalidaC();
$pagina = $empleados->mostrarReporteC();


?>

<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>
    <div class="container">
        <div class="loginsinDiv">
            <div class="row loginContainer ">
                <div class="col s12 m12 ">
                    <div class="loginTitle table-responsive">
                        <div class="loginTitle">
                            <h4>Reportes de Viaje</h4>
                        </div>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Salida</th>
                                    <th scope="col">Destino</th>

                                    <th scope="col"> </th>
                                </tr>
                            </thead>
                            <?php foreach ($pagina as $key => $value) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $value['Salida'] ?></td>
                                        <td><?= $value['LLegada'] ?></td>
                                        <td><?= $value['Lugar'] ?></td>
                                        <td><?= $value['Lugar1'] ?></td>
                                        <td><a class="btn btn-success btn-sm waves-effect waves-light" href='index.php?ruta=reportes_viaje_deta&ID=<?= $value['IDVIAJE']  ?> '>
                                                <i class='bx bxs-purchase-tag'></i> Ver
                                            </a>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                        </table>
                    </div>
</body>