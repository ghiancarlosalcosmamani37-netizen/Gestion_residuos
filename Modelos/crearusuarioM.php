<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class CrearusuarioM extends ConexionBD{
 
    public function registrarUsuarioM($datosC, $tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        $nombre = mysql_entities_fix_string($cbd, $datosC['nombre']);
        $correo = mysql_entities_fix_string($cbd, $datosC['correo']);
        $password = mysql_entities_fix_string($cbd, $datosC['clave']);
        $emailr = mysql_entities_fix_string($cbd, $datosC['claver']);
        $email = password_hash($password, PASSWORD_DEFAULT);
        $fotoU = NULL;
        if ($password==$emailr){
            $query = "INSERT INTO $tablaBD VALUES 
            ('$nombre', '$correo', '$email','$fotoU',1)";

        $result = $cbd->query($query);

        header('location: index.php' );

        }else {
            echo "<script>
            M.toast({html: 'Contraseñas diferentes'})
            </script>";
        }

    }
    public function mostrarUsuarioM($tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1=$cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username=$row1[0];
        $query = "SELECT username,Correo,fotoU FROM $tablaBD where username='$username'";
        $result = $cbd->query($query);
        return $result;
    }
    public function borrarUsuarioM($datosC, $tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "DELETE from datos where username='$username'";
        $result = $cbd->query($query);
        $query = "DELETE FROM usuario WHERE username='$username'"; 
        $result = $cbd->query($query);
        // Cerrar sesion 
        //$ingreso = new AdminC();
        //$ingreso->salirC();       
    }
    public function editarUsuarioM($datosC, $tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        $username = $datosC['username'];
        $query = "SELECT username,Correo FROM $tablaBD WHERE username='$username'";
        $result = $cbd->query($query);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        return $rows;
    }

    public function actualizarUsuarioM($datosC, $tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1=$cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username1=$row1[0];
        extract($datosC);

        $username=mysql_entities_fix_string($cbd,$datosC['username']);
        $Correo=mysql_entities_fix_string($cbd,$datosC['Correo']); 
        $tablaBD1='datos';
        $query = "UPDATE $tablaBD1
            SET 
            username='$username'
            WHERE username='$username1'";
        $resultado = $cbd->query($query);    
        $query = "UPDATE $tablaBD
            SET 
            username='$username',
            Correo='$Correo'
            WHERE username='$username1'";
        $resultado = $cbd->query($query);
        return $resultado;    
    }
    public function cambiarFotoUM($datosC, $tablaBD = 'usuario'){

        $cbd = ConexionBD::cBD();

        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1=$cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username=$row1[0];
        $foto = mysqli_escape_string($cbd, $datosC['foto']);
        $query = "UPDATE $tablaBD SET fotoU='$foto' where username='$username'";
        $result = $cbd->query($query);
    }
    public function EliminarFotoUM($datosC, $tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1=$cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username=$row1[0];
        extract($datosC);
        $query = "UPDATE $tablaBD  SET  fotoU=NULL WHERE username='$username'";
        $resultado = $cbd->query($query);
    }


    public function enviarCodM($datosC, $tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        $correo = mysql_entities_fix_string($cbd, $datosC['CorreoR']);
        $query = "SELECT * FROM $tablaBD  WHERE Correo='$correo'";
        $result = $cbd->query($query);
        $row = $result->fetch_array(MYSQLI_NUM);
        return $row ;


    }
    public function actualizarContraM($datosC, $tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        $clave = mysql_entities_fix_string($cbd , $datosC['clave']);
        $correo = $_SESSION['CorreoR'];
                
        $query = "UPDATE $tablaBD  SET  password='$clave' WHERE Correo='$correo'";
        print_r($query );
        $result = $cbd->query($query);
        
    }
    /*********** */
    public function registrar_venta_boletoM($datosC, $tablaBD = 'venta_boleto'){

        $cbd = ConexionBD::cBD();

        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 =$cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $nombre = mysql_entities_fix_string($cbd, $datosC['nombre']);
        $apellido = mysql_entities_fix_string($cbd, $datosC['apellido']);
        $origen = mysql_entities_fix_string($cbd, $datosC['origen']);
        $destino = mysqli_escape_string($cbd, $datosC['destino']);
        $precio = mysqli_escape_string($cbd, $datosC['precio']);
        $n_asiento = mysqli_escape_string($cbd, $datosC['n_asiento']);
        $fecha = mysqli_escape_string($cbd, $datosC['fecha']);
        $dni = mysqli_escape_string($cbd, $datosC['dni']);
        $id_viaje = mysqli_escape_string($cbd, $datosC['id_viaje']);
        $query = "INSERT INTO $tablaBD VALUES 
            (Null,'$nombre', '$apellido', '$origen','$destino',$precio,'$n_asiento','$fecha', '$username','$dni','$id_viaje','1')";

        $result = $cbd->query($query);
        echo ("Datos guardados");
        return $result;
    }
    /*********** */

    
}
    function mysql_entities_fix_string($cbd, $string)
    { return htmlentities(mysql_fix_string($cbd, $string));
    }
    function mysql_fix_string($cbd, $string)
    { return $cbd->real_escape_string($string);
    } 
