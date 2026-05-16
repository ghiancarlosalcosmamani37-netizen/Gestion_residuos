<?php
$registrar = new CrearusuarioC();
$registrar->registrarUsuarioC();
?>
  <!-- Vistas/Modulos/registrar.php -->

<head>
<link rel="stylesheet" type="text/css" href="Vistas/css/estilos.css">
</head>

<body >
  <div class="container">
  <div class="container">
    <div class="row">
      <div class="col1 s12 m12  offset-12 loginDiv1">
        <div class="row loginContainer">
          <div class="col s12 m10 12 offset-l1 offset-m1">
            <div class="loginTitle">
              <h5 >REGISTRAR UN NUEVO USUARIO</h5>
            </div>
            <form method="post" action="" >
            <div class="row">
              <div class="col l12 s12 m12 customImput">
                <i class="material-icons prefix">account_circle</i>
                <input class="browser-default" style="width: 500px;" type="text" placeholder="Usuario" name="nombreR" required>
              </div>
			  <div class="col s12 customImput">
                <i class="material-icons prefix">email</i>
                <input class="browser-default " style="width: 500px;" type="email" placeholder="Correo Electronico" name="apellidoR" required>
              </div>
			  <div class="col s12 customImput">
                <i class="material-icons prefix">vpn_key</i>
                <input class="browser-default" style="width: 500px;" type="password" placeholder="Clave" name="emailR" required>
              </div>
              <div class="col s12 customImput">
                <i class="material-icons prefix">vpn_key</i>
                <input class="browser-default" style="width: 500px;" type="password" placeholder="Repetir clave" name="email1R" required>
              </div>
            </div> 
            <div class="row">
              <button class="btn col l12 s12 m12 btnLogin">Crear Cuenta</button>
            </div>
            <div class="row">
                <a class="btn col l12 s12 m12 btnLogin red accent-3" href="index.php?ruta=ingreso"> 
                  Inciar Sesion
                </a>
            </div>   
          </div>  
        </div>
      </div>
    </div>
    </form>
  </div>
</body>
