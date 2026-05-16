<?php
$empleados = new EmpleadosC();
$resultado = $empleados->editarEmpleadoC();
$empleados->actualizarEmpleadoC();
?>
<div class="loginTitle">
<h4>EDITAR NOTAS</h4>
</div>	
</form>
<body class="bodyLogin" >
	<head>
	<link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
	</head>	
<div class="container">
    <div class="loginsinDiv">
        <div class="row loginContainer ">
		<form method="post" action="" enctype='multipart/form-data'>
          <div class="col s12 m12 16">
            <div class="loginTitle">
			<input type="hidden" value="<?=$resultado['IDDatos']?>" name="idE" required>
            </div>
            <div class="row 3">
              <div class="col s12 ">
			  <input type="text" placeholder="Nombre" name="tituloE" value='<?=$resultado['titulo']?>' required>
              </div>
            </div>
            <div class="row">
                <div class="col s12 m5">
				<input type="datetime-local" name="fechaE" value='<?=$resultado['fecha']?>' required>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
				<textarea rows="25" cols="50" placeholder="contenido" name="ContenidosE"  style="height: 200px" required><?=$resultado['Contenido']?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
					Cambiar Foto: (Opcional)
                </div>
                <div class="col s12">
                    <div class="row file-field input-field">
                        <div class="s12  btn deep-purple darken-1 " >
                            <span>Subir foto</span>
                            <input type="file" name="fotosE" value="<?$resultado['foto']?>" >
                            
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                            
                        </div>
                    </div>


                    <?php if($resultado['foto']==NULL):?>
                        <div></div>
                    <?php else:?>   
                        <img src="data:image/png;base64,<?php echo base64_encode($resultado['foto']);?>" >
                    <?php endif ?>    
                </div>
            </div>
			<div>

			<button class="btn btnLogin"type="submit" name="actualisar">Actualizar</button>
			</div>
          </div>  
        </div>
    </div>	
	</form>
</body>

