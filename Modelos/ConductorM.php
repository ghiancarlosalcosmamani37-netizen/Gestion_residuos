<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class ConductorM extends ConexionBD
{

    public function registrarConductorM($datosC, $tablaBD = 'chofer')
    {

        $cbd = ConexionBD::cBD();

        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $nombre = mysql_entities_fix_string($cbd, $datosC['Nombre']);
        $apellido = mysql_entities_fix_string($cbd, $datosC['Apellido']);
        $dni = mysql_entities_fix_string($cbd, $datosC['DNI']);
        $NLicencia = mysqli_escape_string($cbd, $datosC['Numero de Licencia']);
        $telefono = mysqli_escape_string($cbd, $datosC['Telefono']);
        $CunetaBanco = mysqli_escape_string($cbd, $datosC['NumeroCuentabancaria']);
        $query = "INSERT INTO $tablaBD VALUES 
            (Null,'$nombre','$apellido', '$dni', '$NLicencia','$telefono','$CunetaBanco',1)";

        $result = $cbd->query($query);

        return $result;
    }

    public function mostrarConductorM($tablaBD = 'chofer')
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

    public function borrarConductorM($datosC, $tablaBD = 'chofer')
    {
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "DELETE FROM $tablaBD WHERE ID='$ID'";
        $resultado = $cbd->query($query);
    }
    public function editarConductorM($datosC, $tablaBD = 'chofer')
    {
        $cbd = ConexionBD::cBD();
        $ID = $datosC['ID'];
        $query = "SELECT * FROM $tablaBD WHERE ID='$ID'";
        $result = $cbd->query($query);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        return $rows;
    }


    public function actualizarConductorM($datosC, $tablaBD = 'chofer')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
         WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        extract($datosC);
        $nombre = mysql_entities_fix_string($cbd, $datosC['Nombre']);
        $apellido = mysql_entities_fix_string($cbd, $datosC['Apellido']);
        $dni = mysql_entities_fix_string($cbd, $datosC['DNI']);
        $licencia = mysqli_escape_string($cbd, $datosC['Numero de Licencia']);
        $telefono = mysql_entities_fix_string($cbd, $datosC['Telefono']);
        $cuenta = mysql_entities_fix_string($cbd, $datosC['NumeroCuentabancaria']);
        $query = "UPDATE $tablaBD
            SET ID='$ID',
            Nombre='$nombre',
            Apellido='$apellido', 
            DNI='$dni', 
            `Numero de Licencia` ='$licencia',
            Telefono='$telefono', 
            NumeroCuentabancaria='$cuenta'
            WHERE ID=$ID";      
        echo $query;
        $resultado = $cbd->query($query);
        return $resultado;
    }
     public function mostrarConductorSuspendidoM($tablaBD = 'chofer'){
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
     public function ArchivarConductorM($datosC, $tablaBD = 'chofer'){
        $cbd = ConexionBD::cBD();
        $id = $datosC['ID'];
        $query="UPDATE $tablaBD
        SET Estado = '0' WHERE ID=$id";
        $result = $cbd->query($query);
    }
    public function QArchivarConductorM($datosC, $tablaBD = 'chofer'){
        $cbd = ConexionBD::cBD();
        $id = $datosC['ID'];
        $query="UPDATE $tablaBD
        SET Estado = '1' WHERE ID=$id";
        $result = $cbd->query($query);
    }
}
