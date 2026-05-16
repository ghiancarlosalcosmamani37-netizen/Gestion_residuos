<?php
$empleados = new EmpleadosC();
$pagina = $empleados->mostrarFiltroPalabraC();
$empleados->borrarEmpleadoC();
?>

<div class="loginTitle">
<h4>Buscar notas por fecha</h4>
</div>

 <h6>Tambien por una letra que contenga</h6>
		<form action="" method="post"><pre>
        Palabra: <input type="text" name='Palabra'>
        <input type='hidden' name='username' value='$username'></pre>
        <input type="submit" value="BUSCAR" name="Rem">
        </form> 
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
					<a class="btn-floating btn-large red pulse" href='index.php?ruta=empleados&IDDatos=<?=$value['IDDatos']?>'>
					<i text-align="center" class="material-icons">delete</i>
					</a>
					<a class="btn-floating btn-large cyan pulse" href='index.php?ruta=editar&IDDatos=<?=$value['IDDatos']?>'>
					<i text-align="center" class="material-icons">edit</i>
					</a>
					<a class="btn-floating btn-large yellow pulse" href='index.php?ruta=nooperativo'>
					<i text-align="center" class="material-icons">star</i>
					</a>
				</div>
			</div>
		</div>
    </div>	
	<?php endforeach;
    } ?> 
</body>

