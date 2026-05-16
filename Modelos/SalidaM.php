<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class SalidaM extends ConexionBD
{

    public function registrarSalidaM($datosC, $tablaBD = 'viajessalida')
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
        $Vehiculo = mysqli_escape_string($cbd, $datosC['Vehiculo']);
        $Nombre = mysqli_escape_string($cbd, $datosC['Conductor']);
        $query = "INSERT INTO $tablaBD VALUES 
            (Null, '$Nombre', '$Vehiculo','$Salida','$Destino','$nombre','$apellido')";

        $result = $cbd->query($query);

        return $result;
    }

    public function mostrarSalidaM($tablaBD = 'viajessalida')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT viajessalida.IDVIAJE, chofer.Nombre, chofer.Apellido, van.Placa, rutas.Lugar, rutas2.Lugar1, viajessalida.Salida, viajessalida.LLegada 
        FROM viajessalida, van, chofer, rutas, rutas2 WHERE viajessalida.IDChofer=chofer.ID 
        AND viajessalida.IDVan= van.IDV AND viajessalida.Partida=rutas.ID 
        AND viajessalida.Destino=rutas2.ID 
        AND (Salida > CURDATE() OR (Salida = CURDATE() AND LLegada > CURTIME()));";
        $result = $cbd->query($query);
        return $result;
    }

    //Mostrar reporte
    public function mostrarReporteM($tablaBD = 'venta_boleto')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT viajessalida.IDVIAJE, chofer.Nombre, chofer.Apellido, van.Placa, rutas.Lugar, rutas2.Lugar1, viajessalida.Salida, viajessalida.LLegada 
        FROM viajessalida, van, chofer, rutas, rutas2 WHERE viajessalida.IDChofer=chofer.ID 
        AND viajessalida.IDVan= van.IDV AND viajessalida.Partida=rutas.ID 
        AND viajessalida.Destino=rutas2.ID 
        AND (Salida < CURDATE() OR (Salida = CURDATE() AND LLegada < CURTIME()));";
        $result = $cbd->query($query);
        return $result;
    }


    public function editarRutaM($datosC, $tablaBD = 'viajessalida')
    {
        $cbd = ConexionBD::cBD();
        $ID = $datosC['ID'];
        $query = "SELECT * FROM viajessalida, van, chofer, rutas, rutas2 
        WHERE viajessalida.IDChofer=chofer.ID AND viajessalida.IDVan= van.IDV 
        AND viajessalida.Partida=rutas.ID AND viajessalida.Destino=rutas2.ID 
        AND viajessalida.IDVIAJE='$ID'";
        $result = $cbd->query($query);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        return $rows;
    }

    // public function editarRutaM2($datosC, $tablaBD = 'viajessalida')
    // {
    //     $cbd = ConexionBD::cBD();
    //     $ID = $datosC['ID'];
    //     $query = "SELECT venta_boleto.nombre, venta_boleto.apellido, venta_boleto.dni, venta_boleto.n_asiento 
    //           FROM venta_boleto, viajessalida 
    //           WHERE venta_boleto.IDVIAJE=viajessalida.IDVIAJE AND viajessalida.IDVIAJE='$ID'";
    //     $result = $cbd->query($query);
    //     $rows = $result->fetch_array(MYSQLI_ASSOC);
    //     return $rows;
    // }
}
