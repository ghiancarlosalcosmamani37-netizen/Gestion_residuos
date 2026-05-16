<?php
$empleados = new DestinoC();
$pagina = $empleados->mostrarDestinoC();
$empleados->borrarDestinoC();


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
							<h4>Destinos</h4>
						</div>
						<br>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Lugar</th>
								</tr>
							</thead>
							<?php foreach ($pagina as $key => $value) : ?>

								<tbody>
									<tr>
										<th scope="row"><?= $value['ID'] ?></th>
										<td><?= $value['Lugar'] ?></td>
										<td><a class="btn btn-danger btn-sm waves-effect waves-light" href='index.php?ruta=DestinoLista&ID=<?= $value['ID']  ?> '>
												<i class='bx bx-trash'></i>
											</a>
											<a class="btn btn-warning btn-sm waves-effect waves-light" href='index.php?ruta=DestinoEditar&ID=<?= $value['ID'] ?>'>
												<i class='bx bxs-edit-alt'></i>
											</a>
										</td>
									</tr>

								<?php endforeach; ?>
								</tbody>
						</table>
					</div>
</body>