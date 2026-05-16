<?php
$empleados = new RutaC();
$pagina = $empleados->mostrarRutaC();
$empleados->borrarRutaC();
$empleados->ArchivarRutaC();


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
									<th scope="col">Vehiculo</th>
									<th scope="col">Conductor</th>
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
										<td><?= $value['Placa'] ?></td>
										<td><?= $value['Nombre'] ?></td>
										<td><a class="btn btn-danger btn-sm waves-effect waves-light" href='index.php?ruta=RutaLista&ID=<?= $value['IDVIAJE']  ?> '>
												<i class='bx bx-trash'></i>
											</a>
											<a class="btn btn-warning btn-sm waves-effect waves-light" href='index.php?ruta=RutaEditar&ID=<?= $value['IDVIAJE'] ?>'>
												<i class='bx bxs-edit-alt'></i>
											</a>
										</td>
									</tr>

								<?php endforeach; ?>
								</tbody>
						</table>
					</div>
</body>