<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class UsuarioM extends ConexionBD
{

    public function registrarUsuarioM($datosC, $tablaBD = 'usuario')
    {

        $cbd = ConexionBD::cBD();

        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $marca = mysql_entities_fix_string($cbd, $datosC['username']);
        $modelo = mysql_entities_fix_string($cbd, $datosC['Correo']);
        $placa = mysql_entities_fix_string($cbd, $datosC['password']);
        $opciones = mysql_entities_fix_string($cbd, $datosC['opciones']);
        $lugar = mysql_entities_fix_string($cbd, $datosC['Lugar']);
        $lugarMQuery = "SELECT Lugar FROM rutas WHERE ID='$lugar'";
        $lugarMResult = $cbd->query($lugarMQuery);
        $lugarMRow = $lugarMResult->fetch_array();
        $lugarM = $lugarMRow[0];
        $email = password_hash($placa, PASSWORD_DEFAULT);
        $query = "INSERT INTO $tablaBD VALUES ('$marca','$modelo', '$email',null ,$opciones,'$lugarM')";

        $result = $cbd->query($query);

        return $result;
    }

    public function mostrarUsuarioM($tablaBD = 'usuario')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT * FROM $tablaBD ";
        $result = $cbd->query($query);
        return $result;
    }

    public function borrarUsuarioM($datosC, $tablaBD = 'usuario')
    {
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "DELETE FROM $tablaBD WHERE username='$IDV'";
        $resultado = $cbd->query($query);
    }
    public function editarUsuarioM($datosC, $tablaBD = 'usuario')
    {
        $cbd = ConexionBD::cBD();
        $IDV = $datosC['IDV'];
        $query = "SELECT * FROM $tablaBD WHERE IDV='$IDV'";
        $result = $cbd->query($query);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        return $rows;
    }


    public function actualizarUsuarioM($datosC, $tablaBD = 'usuario')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
         WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        extract($datosC);
        $nombre = mysql_entities_fix_string($cbd, $datosC['Marca']);
        $apellido = mysql_entities_fix_string($cbd, $datosC['Modelo']);
        $dni = mysql_entities_fix_string($cbd, $datosC['Placa']);
        $licencia = mysqli_escape_string($cbd, $datosC['Año']);
        $query = "UPDATE $tablaBD
            SET IDV='$IDV',
            Marca='$nombre',
            Modelo='$apellido', 
            Placa='$dni', 
            Año ='$licencia'
            WHERE IDV=$IDV";      
        echo $query;
        $resultado = $cbd->query($query);
        return $resultado;
    }
     public function mostrarUsuarioSuspendidoM($tablaBD = 'usuario'){
         $cbd = ConexionBD::cBD();
         $query1 = "SELECT username FROM usuario
         WHERE username='$_SESSION[username]'";
         $result1=$cbd->query($query1);
         $row1 = $result1->fetch_array(MYSQLI_NUM);
         $username=$row1[0];
         $query = "SELECT * FROM $tablaBD where Estado=0 ";
         $result = $cbd->query($query);
         return $result;
     }
     public function ArchivarUsuarioM($datosC, $tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        $id = $datosC['IDV'];
        $query="UPDATE $tablaBD
        SET TipoUS = '5' WHERE username='$id'";
        $result = $cbd->query($query);
    }
    public function QArchivarUsuarioM($datosC, $tablaBD = 'usuario'){
        $cbd = ConexionBD::cBD();
        $id = $datosC['IDV'];
        $query="UPDATE $tablaBD
        SET TipoUS = '5' WHERE username=$id";
        $result = $cbd->query($query);
    }
}
