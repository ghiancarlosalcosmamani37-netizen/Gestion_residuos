<?php
$empleados = new UsuarioC();
$pagina = $empleados->mostrarUsuarioC();
$empleados->borrarUsuarioC();
$empleados->ArchivarUsuarioC();


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

									<th scope="col">User</th>
									<th scope="col">Nombre y Apellido</th>
									<th scope="col">Puesto Laboral</th>
									<th scope="col">Lugar de trabajo</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<?php foreach ($pagina as $key => $value) : ?>
								<tbody>
									<tr>
										<td><?= $value['username'] ?></td>
										<td><?= $value['Correo'] ?></td>
										<td>
											<?php
											// Obtener el valor del tipo de usuario
											$tipoUsuario = $value['TipoUS'];

											// Asignar el nombre correspondiente en función del valor
											if ($tipoUsuario == 1) {
												echo 'Boletero';
											} elseif ($tipoUsuario == 2) {
												echo 'Agenciero';
											} elseif ($tipoUsuario == 3) {
												echo 'Gerente';
											} else {
												// Si no es ninguno de los valores especificados, se mostrará un mensaje por defecto.
												echo 'Tipo de usuario desconocido';
											}
											?>
										</td>
										<td><?= $value['Lugar'] ?></td>
										<td>
											<?php if ($tipoUsuario != 3) : ?>
												<a class="btn btn-danger btn-sm waves-effect waves-light" href='index.php?ruta=UsuariosLista&IDV=<?= $value['username'] ?>'>
													<i class='bx bx-trash'></i>
												</a>
											<?php endif; ?>
										</td>
									</tr>
								</tbody>
							<?php endforeach; ?>

						</table>
					</div>
</body>