<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>S. APURIMEÑO</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="Vistas/css/l_style.css">

</head>

<body class="align">

  <div class="grid align__item">

    <div class="register">

      <img src="Imagenes/Logo.png" class="site__logo" width="30%" height="50%" />
      <h2>Bienvenido</h2>

      <form action="" method="post" class="form">

        <div class="form__field">
          <input type="text" placeholder="Usuario" name="usuarioI" required>
        </div>

        <div class="form__field">
          <input type="password" placeholder="Contraseña" name="claveI" required>
        </div>

        <div class="form__field">
          <input type="submit" value="Iniciar sesión">
        </div>

      </form>

      <p>Already have an accout? <a href="#">Log in</a></p>

    </div>
    <?php
    $ingreso = new AdminC();
    $ingreso->IngresoC();
    ?>

  </div>

</body>

</html>