<?php
$editar = new CrearusuarioC();
$resultado = $editar->editarUsuarioC();
$editar->actualizarUsuarioC();
?>
  <!-- Vistas/Modulos/registrar.php -->

<head>
<link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
</head>

<body >
  <div class="container">
    <div class="row">
      <div class="col1 s12 m12 18 offset-12 loginDiv">
        <div class="row loginContainer">
        <form method="post" action="" enctype='multipart/form-data'>
          <div class="col s12 m10 12 offset-l1 offset-m1">
            <div class="loginTitle">
              <h5 >EDITAR DATOS DEL USUARIO</h5>
            </div>
            <div class="row">
              <div class="col l12 s12 m12 customImput">
                <i class="material-icons prefix">account_circle</i>
                <input class="browser-default" style="width: 500px;" type="text" placeholder="Usuario" name="nombreR" value='<?=$resultado['username']?>' required>
              </div>
			  <div class="col s12 customImput">
                <i class="material-icons prefix">email</i>
                <input class="browser-default " style="width: 500px;" type="email" placeholder="Correo Electronico" name="correoR" value='<?=$resultado['Correo']?>' required>
              </div>
            </div> 
            <div class="row">
              <button class="btn col l12 s12 m12 btnLogin" name="GUARDAR">GUARDAR</button>
            </div>  
          </div>  
        </div>
      </div>
    </div>
    </form>
  </div>
</body>
