<?php
$empleados1 = new SalidaC();
$resultado = $empleados1->editarRutaC();
$IDViaje = $resultado['IDVIAJE'];

$empleado = new EmpleadosC();
$datosC = array('ID' => $resultado['IDVIAJE']); // Crear un arreglo con el ID del viaje
$tablaBD = 'venta_boleto'; // Cambiar 'venta_boleto' por el nombre de la tabla que desees consultar
$pagina = $empleado->mostrar_ReportesC($datosC, $tablaBD); // Pasar el arreglo como argumento
?>


<body class="bodyLogin">

    <head>
        <link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
    </head>

    <div class="container"> 
        <div class="loginsinDiv"> <br>
            <div class="col-sm-12">
                <div class="loginTitle table-responsive">
                    <div class="col-sm-6 loginTitle d-flex align-items-center justify-content-between px-5">
                        <h4 class="mb-0">Reporte de la Venta de Boleto <?= $IDViaje ?></h4>
                        <button id="exportar-pdf" class="btn btn-primary">Exportar PDF</button>
                    </div>

                    <br>
                    <table class="table table-striped table-bordered">

                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">DNI</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">N° Asiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pagina as $key => $value) : ?>
                                <tr>
                                    <td><?php echo $value['dni']; ?></td>
                                    <td><?php echo $value['nombre']; ?></td>
                                    <td><?php echo $value['apellido']; ?></td>
                                    <td><?php echo $value['n_asiento']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Obtener el botón de exportar PDF
        var btnExportarPDF = document.getElementById('exportar-pdf');

        // Agregar un evento al botón para exportar la tabla como PDF
        btnExportarPDF.addEventListener('click', function() {
            // Crear un objeto jsPDF
            var doc = new jsPDF();

            // Obtener la tabla
            var tabla = document.querySelector('table');

            // Obtener el título
            var titulo = document.querySelector('.loginTitle h4').textContent;

            // Convertir la tabla y el título a HTML
            var tablaHtml = tabla.outerHTML;
            var tituloHtml = titulo;

            // Dividir el título en líneas de un ancho determinado
            var lineasTitulo = doc.splitTextToSize(tituloHtml, doc.internal.pageSize.width - 50);

            // Establecer el tamaño de la fuente para el título y la tabla
            doc.setFontSize(16);

            // Agregar el título y la tabla al PDF
            for (var i = 0; i < lineasTitulo.length; i++) {
                doc.text(lineasTitulo[i], 15, 15 + (i * 5));
            }
            doc.setFontSize(12);

            // Obtener el ancho y largo de la tabla
            var tablaAncho = tabla.clientWidth;
            var tablaLargo = tabla.clientHeight;

            // Agregar la tabla al PDF con el ancho y largo obtenido
            doc.fromHTML(tablaHtml, 15, 20, {
                width: tablaAncho,
                height: tablaLargo
            });

            // Descargar el PDF
            doc.save('reporte.pdf');
        });
    </script>



    <script src="jspdf.min.js"></script>
</body>