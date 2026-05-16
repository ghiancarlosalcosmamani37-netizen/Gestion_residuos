<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class VanM extends ConexionBD
{

    public function registrarVanM($datosC, $tablaBD = 'van')
    {

        $cbd = ConexionBD::cBD();

        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $marca = mysql_entities_fix_string($cbd, $datosC['Marca']);
        $modelo = mysql_entities_fix_string($cbd, $datosC['Modelo']);
        $placa = mysql_entities_fix_string($cbd, $datosC['Placa']);
        $Año = mysqli_escape_string($cbd, $datosC['Año']);
        $query = "INSERT INTO $tablaBD VALUES 
            (Null,'$marca','$modelo', '$placa', '$Año',1)";

        $result = $cbd->query($query);

        return $result;
    }

    public function mostrarVanM($tablaBD = 'van')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT * FROM $tablaBD where Estado=1";
        $result = $cbd->query($query);
        return $result;
    }

    public function borrarVanM($datosC, $tablaBD = 'van')
    {
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "DELETE FROM $tablaBD WHERE IDV='$IDV'";
        $resultado = $cbd->query($query);
    }
    public function editarVanM($datosC, $tablaBD = 'van')
    {
        $cbd = ConexionBD::cBD();
        $IDV = $datosC['IDV'];
        $query = "SELECT * FROM $tablaBD WHERE IDV='$IDV'";
        $result = $cbd->query($query);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        return $rows;
    }


    public function actualizarVanM($datosC, $tablaBD = 'van')
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
     public function mostrarVanSuspendidoM($tablaBD = 'van'){
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
     public function ArchivarVanM($datosC, $tablaBD = 'van'){
        $cbd = ConexionBD::cBD();
        $id = $datosC['IDV'];
        $query="UPDATE $tablaBD
        SET Estado = '0' WHERE IDV=$id";
        $result = $cbd->query($query);
    }
    public function QArchivarVanM($datosC, $tablaBD = 'van'){
        $cbd = ConexionBD::cBD();
        $id = $datosC['IDV'];
        $query="UPDATE $tablaBD
        SET Estado = '1' WHERE IDV=$id";
        $result = $cbd->query($query);
    }
}
