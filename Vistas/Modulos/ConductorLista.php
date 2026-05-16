<?php
$empleados = new ConductorC();
$pagina = $empleados->mostrarConductorC();
$empleados->borrarConductorC();
$empleados->ArchivarConductorC();


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
							<h4>Choferes</h4>
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
										<td><a class="btn btn-danger btn-sm waves-effect waves-light" href='index.php?ruta=ConductorLista&ID=<?= $value['ID']  ?> '>
												<i class='bx bx-trash'></i>
											</a>
											<a class="btn btn-warning btn-sm waves-effect waves-light" href='index.php?ruta=ConductorEditar&ID=<?= $value['ID'] ?>'>
												<i class='bx bxs-edit-alt'></i>
											</a>
											<a class="btn btn-primary btn-sm waves-effect waves-light" href='index.php?ruta=ConductorLista&ID0=<?= $value['ID'] ?>'>
												<i class='bx bxs-archive-in'></i>
											</a>
										</td>
									</tr>

								<?php endforeach; ?>
								</tbody>
						</table>
					</div>
</body>