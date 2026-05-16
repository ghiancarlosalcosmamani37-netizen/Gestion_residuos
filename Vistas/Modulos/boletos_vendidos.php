<?php
$empleado = new EmpleadosC();
$pagina = $empleado->mostrar_boletoC();
$cancelar = $empleado->cancelar_boletoC();


?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="Vistas/css/kevin-css.css">
    </head>
<!-- En la vista -->

<body id="fondo_vendidos">
<div class="contenido-boleto">
    <table id="tabla-boleto">
        <thead class="tr">
            <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Origen</th>
            <th>Destino</th>
            <th>Precio</th>
            <th>Número de Asiento</th>
            <th>Fecha</th>
            <th>DNI</th>
            </tr>
        </thead>
        
        <?php foreach ($pagina as $key => $value) : ?>
            <tr id="tr">
                <td><?php echo $value['nombre']; ?></td>
                <td><?php echo $value['apellido']; ?></td>
                <td><?php echo $value['origen']; ?></td>
                <td><?php echo $value['destino']; ?></td>
                <td><?php echo $value['precio']; ?></td>
                <td><?php echo $value['n_asiento']; ?></td>
                <td><?php echo $value['fecha']; ?></td>
                <td><?php echo $value['dni']; ?></td>
                <td><form method="post">
          <input type="hidden" name="id_boleto" value='<?=$value['id_boleto']; ?>'>
          <button type="submit" id="btn_cancelar" name="cancelar_venta">Cancelar venta</button>
        </form></td>
            </tr>
            <?php endforeach; ?>
    </table>
</div>
</body>

</html>