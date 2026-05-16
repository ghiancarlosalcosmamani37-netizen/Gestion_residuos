<?php
$usuario = new CrearusuarioC();
$pagina = $usuario->mostrarUsuarioC();
$usuario->cambiarFotoUC();
$usuario->EliminarFotoUC();
$usuario->borrarUsuarioC();
?> <!-- Vistas/Modulos/empleados.php -->

<body>
  <?php foreach ($pagina as $key => $value) : ?>
    <div class="loginsinDiv">
      <div class="row loginContainer ">
        <div class="col s12 m6 16">
          <div class="clo s11 offset-s1">
            <ul style="text-align:center">
              <?php if ($value['fotoU'] == NULL) : ?>
                <td rowspan="4" colspan="2" style="text-align:center;">
                  <?php $ima = "Imagenes/usuario.png" . "\n";
                  echo '<img class="bolita" src="' . $ima . '">'; ?>
                </td>
              <?php else : ?>
                <td id="box" rowspan="4" colspan="2" style="text-align:center;">
                  <img src="data:image/png;base64,<?php echo base64_encode($value['fotoU']); ?>">
                </td>
              <?php
              endif; ?>
            </ul>
          </div>
          <div class="row">
            <a class="btn col l13 s12 m6 7 btnLogin red accent-1" name="EliminarFoto" href='index.php?ruta=usuario&usernameFE=<?= $value['username'] ?>'>
              Eliminar Foto
            </a>
            <br>
          </div>
          <div>
            <div>
              <form method="post" action="" enctype='multipart/form-data'>
                <div class="row file-field input-field">
                  <div class="s12  btn deep-purple darken-1 ">
                    <span>Seleccionar Archivo</span>
                    <input type="file" name="foto">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
                <button class="btn col l12 s12 m12 btnLogin cyan lighten-3" type="submit" name="guardar">Subir foto</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col s12 m5 15 offset-l1 offset-m1">
          <div class="loginTitle">
            <h5>Yo</h5>
          </div>
          <form method="post" action="">
            <div class="row">
              <div class="col s12 ">
                <h6><b>Nombre de Usuario: </b>
                </h6>
                <h6>
                  <?= $value['username'] ?>
                </h6>
              </div>
              <div class="col s12">
                <h6><b>Correo Electronico:</b>
                </h6>
                <h6>
                  <?= $value['Correo'] ?>
                </h6>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <a class="btn col s12 btnLogin red accent-3" href='index.php?ruta=editarU&username=<?= $value['username'] ?>'>
                  Editar Datos
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <a class="btn col s12 btnLogin red " href='index.php?ruta=usuario&username=<?= $value['username'] ?>'>
                  Eliminar cuenta
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

</body>