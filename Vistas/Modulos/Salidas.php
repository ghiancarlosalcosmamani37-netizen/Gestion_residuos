<?php
$empleados = new SalidaC();
$pagina = $empleados->mostrarSalidaC();


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
							<h4>Salidas Programadas</h4>
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
										<td><a class="btn btn-danger btn-sm waves-effect waves-light" href='index.php?ruta=formulario_venta_boleto&ID=<?= $value['IDVIAJE']  ?> '>
												<i class='bx bxs-purchase-tag'></i> Vender
											</a>
										</td>
									</tr>

								<?php endforeach; ?>
								</tbody>
						</table>
					</div>
</body>