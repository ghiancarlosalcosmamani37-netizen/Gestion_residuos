<?php
$empleados = new RutaC();
$pagina = $empleados->mostrarRutaSuspendidoC();
$empleados->borrarRutaC();
$empleados->QArchivarRutaC();
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
							<h4>Choferes Suspendidos</h4>
						</div>
						<br>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">DNI</th>
									<th scope="col">Nombre</th>
									<th scope="col">Apellido</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<?php foreach ($pagina as $key => $value) : ?>
								<tbody>
									<tr>
										<th scope="row"><?= $value['ID'] ?></th>
										<td><?= $value['DNI'] ?></td>
										<td><?= $value['Nombre'] ?></td>
										<td><?= $value['Apellido'] ?></td>
										<td><a class="btn btn-danger btn-sm waves-effect waves-light" href='index.php?ruta=RutaLista&ID=<?= $value['ID']  ?> '>
												<i class='bx bx-trash'></i>
											</a>
											<a class="btn btn-primary btn-sm waves-effect waves-light" href='index.php?ruta=RutaSuspendido&ID1=<?= $value['ID'] ?>'>
												<i class='bx bxs-archive-out' ></i>
											</a>
										</td>
									</tr>

								<?php endforeach; ?>
								</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
</body>