<?php
$registrar = new CrearusuarioC();
$registrar->igualarC();
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
          <div class="col s12 m10 offset-m1">
            <div class="loginTitle">
              <h5 >INGRESE EL TOKENT ENVIADO A SU CORREO</h5>
            </div>
            <form method="post" action="" >
              <div class="col s12 customImput">
                      <i class="material-icons prefix">contact_mail</i>
                      <input class="browser-default " style="width: 500px;" type="text" placeholder="Pegue su token aqui" name="Token">
                      
              </div> 
              <div class="row"></div>
                <div>
                  <button class="btn col l12 s12 m12 btnLogin" >verificar</button>
                </div>
                <div class="row"></div>
                <div>
                <a class="btn btnLogin red darken-1" href='index.php'>
                  <i class="material-icons left">house</i>Iniciar Session</a>
                </a>
                </div>    
          </div>  
        </div>
      </div>
    </div>
    </form>
  </div>
</body>
