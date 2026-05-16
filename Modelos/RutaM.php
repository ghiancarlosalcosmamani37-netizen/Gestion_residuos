<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class RutaM extends ConexionBD
{

    public function registrarRutaM($datosC, $tablaBD = 'viajessalida')
    {

        $cbd = ConexionBD::cBD();

        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $nombre = mysql_entities_fix_string($cbd, $datosC['Fecha']);
        $apellido = mysql_entities_fix_string($cbd, $datosC['Hora']);
        $Salida = mysql_entities_fix_string($cbd, $datosC['Salida']);
        $Destino = mysqli_escape_string($cbd, $datosC['Destino']);
        $Vehiculo1 = mysqli_escape_string($cbd, $datosC['Vehiculo']);

        $lugarMQuery = "SELECT IDV FROM van WHERE Placa='$Vehiculo1'";
        $lugarMResult = $cbd->query($lugarMQuery);
        $lugarMRow = $lugarMResult->fetch_array();
        $Vehiculo = $lugarMRow[0];
        $Nombre1 = mysqli_escape_string($cbd, $datosC['Conductor']);
        $NombreMQuery = "SELECT ID FROM chofer WHERE CONCAT(Apellido,' ',Nombre) ='$Nombre1'";
        $NombreMResult = $cbd->query($NombreMQuery);
        $nombreMRow = $NombreMResult->fetch_array();
        $Nombre = $nombreMRow[0];
        $query = "INSERT INTO $tablaBD VALUES 
            (Null, '$Nombre', '$Vehiculo','$Salida','$Destino','$nombre','$apellido')";

        $result = $cbd->query($query);

        return $result;
    }

    public function mostrarRutaM($tablaBD = 'viajessalida')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT viajessalida.IDVIAJE, chofer.Nombre, chofer.Apellido, van.Placa, rutas.Lugar, rutas2.Lugar1, viajessalida.Salida, viajessalida.LLegada FROM viajessalida, van, chofer, rutas, rutas2 WHERE viajessalida.IDChofer=chofer.ID AND viajessalida.IDVan= van.IDV AND viajessalida.Partida=rutas.ID AND viajessalida.Destino=rutas2.ID;";
        $result = $cbd->query($query);
        return $result;
    }

    public function borrarRutaM($datosC, $tablaBD = 'viajessalida')
    {
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "DELETE FROM $tablaBD WHERE IDVIAJE='$IDVIAJE'";
        $resultado = $cbd->query($query);
    }
    public function editarRutaM($datosC, $tablaBD = 'viajessalida')
    {
        $cbd = ConexionBD::cBD();
        $ID = $datosC['ID'];
        $query = "SELECT * FROM viajessalida, van, chofer, rutas, rutas2 WHERE viajessalida.IDChofer=chofer.ID AND viajessalida.IDVan= van.IDV AND viajessalida.Partida=rutas.ID AND viajessalida.Destino=rutas2.ID AND viajessalida.IDVIAJE='$ID'";
        $result = $cbd->query($query);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        return $rows;
    }


    public function actualizarRutaM($datosC, $tablaBD = 'viajessalida')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
         WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        extract($datosC);
        $Salida = mysql_entities_fix_string($cbd, $datosC['Salida']);
        $Llegada = mysql_entities_fix_string($cbd, $datosC['Llegada']);
        $partida = mysql_entities_fix_string($cbd, $datosC['Partida']);
        $destino = mysqli_escape_string($cbd, $datosC['Destino']);
        $van = mysql_entities_fix_string($cbd, $datosC['Van']);
        $chofer = mysql_entities_fix_string($cbd, $datosC['Chofer']);
        $query = "UPDATE $tablaBD
            SET IDVIAJE='$ID',
            IDChofer='$chofer',
            IDVan='$van'
            WHERE IDVIAJE=$ID";      
        echo $query;
        $resultado = $cbd->query($query);
        return $resultado;
    }
     public function mostrarRutaSuspendidoM($tablaBD = 'viajessalida'){
         $cbd = ConexionBD::cBD();
         $query1 = "SELECT username FROM usuario
         WHERE username='$_SESSION[username]'";
         $result1=$cbd->query($query1);
         $row1 = $result1->fetch_array(MYSQLI_NUM);
         $username=$row1[0];
         $query = "SELECT * FROM $tablaBD  ";
         $result = $cbd->query($query);
         return $result;
     }
     public function ArchivarRutaM($datosC, $tablaBD = 'viajessalida'){
        $cbd = ConexionBD::cBD();
        $id = $datosC['ID'];
        $query="UPDATE $tablaBD
        SET Estado = '0' WHERE ID=$id";
        $result = $cbd->query($query);
    }
    public function QArchivarRutaM($datosC, $tablaBD = 'viajessalida'){
        $cbd = ConexionBD::cBD();
        $id = $datosC['ID'];
        $query="UPDATE $tablaBD
        SET Estado = '1' WHERE ID=$id";
        $result = $cbd->query($query);
    }
}
