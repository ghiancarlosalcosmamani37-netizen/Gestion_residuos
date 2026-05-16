<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class DestinoM extends ConexionBD
{

    public function registrarDestinoM($datosC, $tablaBD = 'rutas')
    {

        $cbd = ConexionBD::cBD();

        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $Lugar = mysql_entities_fix_string($cbd, $datosC['Lugar']);
        $query = "INSERT INTO $tablaBD VALUES (Null,'$Lugar')";
        $result = $cbd->query($query);

        return $result;
    }

    public function mostrarDestinoM($tablaBD = 'rutas')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT * FROM $tablaBD";
        $result = $cbd->query($query);
        return $result;
    }

    public function borrarDestinoM($datosC, $tablaBD = 'rutas')
    {
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "DELETE FROM $tablaBD WHERE ID='$ID'";
        $resultado = $cbd->query($query);
    }

    public function editarDestinoM($datosC, $tablaBD = 'rutas')
    {
        $cbd = ConexionBD::cBD();
        $IDV = $datosC['ID'];
        $query = "SELECT * FROM $tablaBD WHERE ID='$IDV'";
        $result = $cbd->query($query);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        return $rows;
    }


    public function actualizarDestinoM($datosC, $tablaBD = 'rutas')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
         WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        extract($datosC);
        $Lugar = mysql_entities_fix_string($cbd, $datosC['Lugar']);
        $query = "UPDATE $tablaBD
            SET ID='$ID',
            Lugar='$Lugar'
            WHERE ID=$ID";      
        echo $query;
        $resultado = $cbd->query($query);
        return $resultado;
    }
}
