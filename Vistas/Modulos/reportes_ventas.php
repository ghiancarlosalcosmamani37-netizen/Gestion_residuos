<?php
$empleado = new EmpleadosC();
$pagina = $empleado->mostrar_reporteC();

$datosVentas = array();
while ($row = $pagina->fetch_assoc()) {
    $datosVentas[] = $row;
}

$ventasPorDia = array();
$totalGanancias = 0;
foreach ($datosVentas as $venta) {
    $fecha = $venta['fecha'];
    $precio = $venta['precio'];

    if (!isset($ventasPorDia[$fecha])) {
        $ventasPorDia[$fecha] = 0;
    }

    $ventasPorDia[$fecha] += $precio;
    $totalGanancias += $precio;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Reporte de Ventas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="Vistas/css/kevin-css.css">
</head>

<body id="fondo_reporte">
    <div class="contenido">
        <canvas id="graficoVentas"></canvas>
        <p>Total de Ganancias: <?php echo $totalGanancias; ?></p>
    </div>

    <script>
        // Obtener los datos de ventas desde PHP
        const datosVentas = <?php echo json_encode($datosVentas); ?>;

        // Crear un objeto para almacenar las sumas ganadas por día
        const ventasPorDia = {};

        // Calcular la suma ganada por día
        datosVentas.forEach(venta => {
            const fecha = venta.fecha;
            const precio = venta.precio;

            if (!ventasPorDia[fecha]) {
                ventasPorDia[fecha] = 0;
            }

            ventasPorDia[fecha] += precio;
        });

        // Extraer las fechas y sumas ganadas por día en arrays separados
        const fechas = Object.keys(ventasPorDia);
        const sumasPorDia = Object.values(ventasPorDia);

        // Crear el contexto del gráfico
        const ctx = document.getElementById('graficoVentas').getContext('2d');

        // Crear el gráfico de barras
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: fechas,
                datasets: [{
                    label: 'Ganancias por Día',
                    data: sumasPorDia,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo de las barras
                    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde de las barras
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>