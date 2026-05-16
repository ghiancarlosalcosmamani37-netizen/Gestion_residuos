<?php  //Modelos/empleadosM.php
require_once "conexionBD.php";

class EmpleadosM extends ConexionBD
{

    public function registrarEmpleadosM($datosC, $tablaBD = 'datos')
    {

        $cbd = ConexionBD::cBD();

        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $nombre = mysql_entities_fix_string($cbd, $datosC['titulo']);
        $apellido = mysql_entities_fix_string($cbd, $datosC['contenido']);
        $email = mysql_entities_fix_string($cbd, $datosC['fecha']);
        $foto = mysqli_escape_string($cbd, $datosC['foto']);
        $query = "INSERT INTO $tablaBD VALUES 
            (Null,'$username','$nombre', '$apellido', '$email','$foto',1)";

        $result = $cbd->query($query);

        return $result;
    }

    public function mostrarEmpleadosM($tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT IDDatos,titulo, Contenido, fecha,foto,Estado FROM $tablaBD where username='$username' and (Estado=2 or Estado=1)";
        $result = $cbd->query($query);
        return $result;
    }
    public function mostrarEmpleadosArchivadosM($tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT IDDatos,titulo, Contenido, fecha,foto,Estado FROM $tablaBD where username='$username' and Estado=0 ";
        $result = $cbd->query($query);
        return $result;
    }
    public function mostrarEmpleadosFavoritosM($tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT IDDatos,titulo, Contenido, fecha,foto,Estado FROM $tablaBD where username='$username' and Estado=2 ";
        $result = $cbd->query($query);
        return $result;
    }
    public function mostrarFiltroEmpleadosM($datosC, $tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $FechaI = $datosC['FechaI'];
        $FechaF = $datosC['FechaF'];
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "datos.fecha>='$FechaI' and datos.fecha<='$FechaF' order by fecha asc";
        $query = "SELECT IDDatos,titulo, Contenido, fecha,foto,Estado FROM $tablaBD where username='$username' and fecha between '$FechaI' and DATE_ADD('$FechaF',interval 1 DAY)";
        $result = $cbd->query($query);
        return $result;
    }
    public function mostrarFiltroPalabraM($datosC, $tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $Palabra = $datosC['Palabra'];
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        $query = "SELECT IDDatos,titulo, Contenido, fecha,foto,Estado FROM $tablaBD where username='$username' and (titulo like '%$Palabra%' or Contenido like '%$Palabra%')";;
        $result = $cbd->query($query);
        return $result;
    }
    public function editarEmpleadoM($datosC, $tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $IDDatos = $datosC['IDDatos'];
        $query = "SELECT IDDatos,titulo, Contenido, fecha,foto,Estado FROM $tablaBD WHERE IDDatos='$IDDatos'";
        $result = $cbd->query($query);
        $rows = $result->fetch_array(MYSQLI_ASSOC);
        return $rows;
    }

    public function actualizarEmpleadoM($datosC, $tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $query1 = "SELECT username FROM usuario
        WHERE username='$_SESSION[username]'";
        $result1 = $cbd->query($query1);
        $row1 = $result1->fetch_array(MYSQLI_NUM);
        $username = $row1[0];
        extract($datosC);
        $titulo = mysql_entities_fix_string($cbd, $datosC['titulo']);
        $Contenido = mysql_entities_fix_string($cbd, $datosC['Contenido']);
        $fecha = mysql_entities_fix_string($cbd, $datosC['fecha']);
        $foto = mysqli_escape_string($cbd, $datosC['foto']);
        if ($foto == NULL) {
            $query = "UPDATE $tablaBD
            SET IDDatos='$IDDatos',
            username='$username',
            titulo='$titulo', 
            Contenido='$Contenido', 
            fecha='$fecha'
            WHERE IDDatos=$IDDatos";
        } else {
            $query = "UPDATE $tablaBD
            SET IDDatos='$IDDatos',
            username='$username',
            titulo='$titulo', 
            Contenido='$Contenido', 
            fecha='$fecha',
            foto='$foto'
            WHERE IDDatos=$IDDatos";
        }

        echo $query;
        $resultado = $cbd->query($query);
        return $resultado;
    }

    public function borrarEmpleadoM($datosC, $tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        extract($datosC);
        $query = "DELETE FROM $tablaBD WHERE IDDatos='$IDDatos'";
        $resultado = $cbd->query($query);
    }

    public function favoritoEmpleadoM($datosC, $tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $id = $datosC['IDDatos'];
        $query = "UPDATE $tablaBD
        SET Estado = '2' WHERE IDDatos=$id";
        $result = $cbd->query($query);
    }
    public function QfavoritoEmpleadoM($datosC, $tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $id = $datosC['IDDatos'];
        $query = "UPDATE $tablaBD
        SET Estado = '1' WHERE IDDatos=$id";
        $result = $cbd->query($query);
    }
    public function ArchivarEmpleadoM($datosC, $tablaBD = 'datos')
    {
        $cbd = ConexionBD::cBD();
        $id = $datosC['IDDatos'];
        $query = "UPDATE $tablaBD
        SET Estado = '0' WHERE IDDatos=$id";
        $result = $cbd->query($query);
    }
    /************ */
    public function mostrar_asientoM($IDViaje)
    {
        $cbd = ConexionBD::cBD();

        $query = "SELECT n_asiento FROM venta_boleto WHERE IDVIAJE = $IDViaje AND asiento_disponible = 1";
        $result = $cbd->query($query);
        return $result;
    }

    public function mostrar_boletoM($tablaBD = 'venta_boleto')
    {
        $cbd = ConexionBD::cBD();
        $query = "SELECT id_boleto,nombre, apellido, origen, destino, precio, n_asiento, fecha, dni  FROM $tablaBD ORDER BY fecha DESC";
        $result = $cbd->query($query);
        return $result;
    }

    public function cancelar_boletoM($datosC,$tablaBD = 'venta_boleto'){
        echo("llegue al modelo");
        $cbd = ConexionBD::cBD();
        $id = $datosC['id_boleto'];
        echo($id);
        $query= "DELETE FROM  $tablaBD WHERE id_boleto = '$id'";
        $result = $cbd->query($query);
        return $result;
    }

    public function mostrar_ReportesM($datosC, $tablaBD = 'venta_boleto')
    {
        $cbd = ConexionBD::cBD();
        $ID = $datosC['ID'];
        $query = "SELECT venta_boleto.nombre, venta_boleto.apellido, venta_boleto.dni, venta_boleto.n_asiento 
                  FROM venta_boleto, viajessalida 
                  WHERE venta_boleto.IDVIAJE=viajessalida.IDVIAJE 
                  AND viajessalida.IDVIAJE='$ID'";
        $result = $cbd->query($query);
        return $result;
    }

    public function mostrar_reporteM($tablaBD = 'venta_boleto')
    {
        $cbd = ConexionBD::cBD();
        $query = "SELECT precio, fecha  FROM $tablaBD ORDER BY fecha DESC";
        $result = $cbd->query($query);
        return $result;
    }
    /************ */
}
