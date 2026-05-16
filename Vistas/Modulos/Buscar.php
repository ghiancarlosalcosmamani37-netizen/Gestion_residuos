<?php
$empleados = new EmpleadosC();
$empleados->borrarEmpleadoC();
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Buscador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- importante -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
      <div class="container mt-5">
          <div class="col-12">
            <div class="loginsinDiv">
                <div class="row loginContainer ">
                    <div class="mb-3">
                        <label class="form-label">Palabra a buscar instantaneo</label>
                        <input onkeyup="buscar_ahora($('#buscar_1').val());" type="text" class="form-control" id="buscar_1" name="buscar_1">
                    </div>

                        
                            <div id="datos_buscador" class=" pl-5 pr-5"></div>
                        </div>
              </div>  
          </div>
      </div>
      </div>
      </div>
    <script type="text/javascript">
            function buscar_ahora(buscar1) {
            var parametros = {"buscar":buscar1};
            $.ajax({
            data:parametros,
            type: 'POST',
            url: 'Modelos/buscador.php',
            success: function(data) {
            document.getElementById("datos_buscador").innerHTML = data;
            }
            });
            }
        //   buscar_ahora();
    </script> 
  </body>
</html>