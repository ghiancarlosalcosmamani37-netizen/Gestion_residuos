<?php
$empleados = new EmpleadosC();
$pagina = $empleados->mostrarEmpleadosArchivadosC();
$empleados->borrarEmpleadoC();
?>

<div class="loginTitle">
	<h4>Notas Archivadas</h4>
</div>

<body class="bodyLogin">

	<head>
		<link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
	</head>
	<div class="container">
		<?php foreach ($pagina as $key => $value) : ?>
			<div class="loginsinDiv">
				<div class="row loginContainer ">
					<div class="col s12 m12 ">
						<div class="loginTitle">
							<h5><?= $value['titulo'] ?></h5>
						</div>
						<div>
							<div style="text-align:left" class="col s12 m5">
								<h6><?= $value['fecha'] ?></h6>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<pre><?= $value['Contenido'] ?></pre>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<ul>
									<?php if ($value['foto'] == NULL) : ?>
									<?php else : ?>
										<td id="box">
											<img text-align="center" src="data:image/png;base64,<?php echo base64_encode($value['foto']); ?>">
										</td>
									<?php
									endif; ?>
								</ul>
							</div>
						</div>
						<div>
							<!-- boton eliminar  -->
							<a class="btn btn-danger btn-sm waves-effect waves-light" href='index.php?ruta=empleados&IDDatos=<?= $value['IDDatos'] ?>'>
								<i class='bx bx-trash'></i> Eliminar
							</a>

							<!-- Boton editar -->
							<a class="btn btn-warning btn-sm waves-effect waves-light" href='index.php?ruta=editar&IDDatos=<?= $value['IDDatos'] ?>'>
								<i class='bx bxs-edit-alt'></i> Editar
							</a>
							<!-- Boton Favorito -->
							<a class="btn btn-dark btn-sm waves-effect waves-light" href='index.php?ruta=empleados&IDDatos2=<?= $value['IDDatos'] ?>'>
								<i class='bx bxs-star'></i> Favorito
							</a>
							<!-- Boton Desarchivar -->
							<a class="btn btn-success btn-sm waves-effect waves-light" href='index.php?ruta=empleados&IDDatos1=<?= $value['IDDatos'] ?>'>
								<i class='bx bxs-archive-out'></i> Desarchivar
							</a>

						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</body>