<?php
$empleados = new EmpleadosC();
$pagina = $empleados->mostrarFiltroEmpleadosC();
$empleados->favoritoEmpleadoC();
$empleados->QfavoritoEmpleadoC();
$empleados->ArchivarEmpleadoC();
$empleados->borrarEmpleadoC();
?>

<div class="loginTitle">
<h4>Buscar notas por fecha</h4>
</div>
	<div class="container">
		<div class="loginsinDiv">
			<div class="row loginContainer ">
				<h6>Puedes ver tus notas guardadas segun el rango de fecha que escojas</h6>
							<form action="" method="post">
								<div class="col s12 m5 ">
									Fecha de Inicial: 
										<input type = 'date' name='FechaI' value='$FechaI'>
								</div>
								<div class="col s12 m5 ">
									Fecha de Final: 
									<input type = 'date' name='FechaF' value='$FechaF'>
								</div>
								<div>
									<br>
									<br>
									<input type='hidden' name='username' value='$username'>
									<button class="btn-small red waves-effect waves-light bolitaBoton" type="submit" name="Ram">BUSCAR</button>
								</div>
							</form>
					</div>
				</div>
			</div>

<body class="bodyLogin"  >
	<head>
	<link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
	</head>	
	<div class="container">
		<?php if($pagina){
        foreach($pagina as $key => $value): ?>
		<div class="loginsinDiv">
			<div class="row loginContainer ">
			<div class="col s12 m12 ">
				<div class="loginTitle">
					<h5><?=$value['titulo']?></h5>
				</div>
				<div >
					<div style="text-align:left" class="col s12 m5" >
						<h6><?=$value['fecha']?></h6>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
					<pre><?=$value['Contenido']?></pre>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<ul>
						<?php if ($value['foto']==NULL):?>
						<?php else: ?>
							<td id="box">
							<img text-align="center" src="data:image/png;base64,<?php echo base64_encode($value['foto']);?>" ></td>
						<?php     
						endif; ?>
						</ul>
					</div>
				</div>
				<div>
					<!-- boton eliminar  -->
					<a class="btn-small red waves-effect waves-light bolitaBoton " href='index.php?ruta=empleados&IDDatos=<?=$value['IDDatos']?>'>
						<i class="material-icons left">delete</i>Eliminar</a>
					</a>
					<!-- Boton editar -->
					<a class="btn-small amber darken-2 waves-effect waves-light bolitaBoton" href='index.php?ruta=editar&IDDatos=<?=$value['IDDatos']?>'>
						<i class="material-icons left">edit</i>Editar</a>
					</a>
					<?php if(($value['Estado'])=='1'): ?>
						<!-- Boton Favorito -->
						<a class="btn-small black waves-effect waves-light bolitaBoton"  href='index.php?ruta=empleados&IDDatos2=<?=$value['IDDatos']?>'>
							<i class="material-icons left">star</i>Favorito</a>
						</a>
					<?php else: ?>
						<!-- Boton Quitar de Favorito -->  
						<a class="btn-small blue-grey darken-1 waves-effect waves-light bolitaBoton"  href='index.php?ruta=empleados&IDDatos1=<?=$value['IDDatos']?>'>
							<i class="material-icons left">star_border</i>Quitar Favorito</a>
						</a>
					<?php endif ?>
						<!-- Boton Archivar -->  
						<a class="btn-small light-blue darken-4 waves-effect waves-light bolitaBoton"  href='index.php?ruta=empleados&IDDatos0=<?=$value['IDDatos']?>'>
							<i class="material-icons left">archive</i>Archivar</a>
						</a>
				</div>
			</div>
		</div>
    </div>	
	<?php endforeach;
    } ?> 
</body>

