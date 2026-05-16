<?php
$registrar = new CrearusuarioC();
$registrar->actualizarContraC();
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
              <h5 >INGRESE SU NUEVA CONTRASEÑA</h5>
            <form method="post" action="" >
              <div class="col s12 customImput">
                <i class="material-icons prefix">vpn_key</i>
                <input class="browser-default" style="width: 500px;" type="password" placeholder="Clave" name="emailR" required>
              </div>
              <div class="col s12 customImput">
                <i class="material-icons prefix">vpn_key</i>
                <input class="browser-default" style="width: 500px;" type="password" placeholder="Repetir clave" name="email1R" required>
              </div>
              <div  class="col s12 " >
                <br>
                <button class="btn col l12 s12 m12 btnLogin" >Guardar</button>
              </div>
               
          </div>  
        </div>
      </div>
    </div>
    </form>
    </div>
  </div>
  </div>
</body>
