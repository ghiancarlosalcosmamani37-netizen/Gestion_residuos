<?php
$empleados = new VanC();
$pagina = $empleados->mostrarVanC();
$empleados->borrarVanC();
$empleados->ArchivarVanC();


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
							<h4>Vehiculos</h4>
						</div>
						<br>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Marca</th>
									<th scope="col">Modelo</th>
									<th scope="col">Placa</th>
									<th scope="col">Año</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<?php foreach ($pagina as $key => $value) : ?>

								<tbody>
									<tr>
										<th scope="row"><?= $value['IDV'] ?></th>
										<td><?= $value['Marca'] ?></td>
										<td><?= $value['Modelo'] ?></td>
										<td><?= $value['Placa'] ?></td>
										<td><?= $value['Año'] ?></td>
										<td><a class="btn btn-danger btn-sm waves-effect waves-light" href='index.php?ruta=VanLista&IDV=<?= $value['IDV']  ?> '>
												<i class='bx bx-trash'></i>
											</a>
											<a class="btn btn-warning btn-sm waves-effect waves-light" href='index.php?ruta=VanEditar&IDV=<?= $value['IDV'] ?>'>
												<i class='bx bxs-edit-alt'></i>
											</a>
											<a class="btn btn-primary btn-sm waves-effect waves-light" href='index.php?ruta=VanLista&IDV0=<?= $value['IDV'] ?>'>
												<i class='bx bxs-archive-in'></i>
											</a>
										</td>
									</tr>

								<?php endforeach; ?>
								</tbody>
						</table>
					</div>
</body>