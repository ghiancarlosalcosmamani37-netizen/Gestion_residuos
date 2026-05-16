<?php require_once("conexionBD.php");
    $cbd = ConexionBD::cBD();
    session_start();
    $datosC= $_POST['buscar'];
    $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1=$cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username=$row1[0];
    $consulta="SELECT * FROM datos where username='$username' and (titulo like '%$datosC%' or Contenido like '%$datosC%')";
    $buscador=mysqli_query($cbd,$consulta);
    $numero =mysqli_num_rows($buscador);
    ?>
    <h5 class="card-tittle">Resultados encontrados (<?php echo $numero; ?>):</h5>
    <?php while($resultado =mysqli_fetch_assoc($buscador)){?>
        <p class="card-text"> <?php echo $resultado["titulo"] ?>
        <br> <?php echo $resultado["Contenido"] ?>
        <br> <?php echo $resultado["fecha"] ?>
        <?php if($resultado["foto"]==NULL): ?>
            <br>
        <?php else: ?>

            <br><img src="data:image/png;base64,<?php echo base64_encode($resultado['foto']);?>"></p>
        <?php endif ?>
<?php
}?>
