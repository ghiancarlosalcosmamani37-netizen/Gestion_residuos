<?php  //Modelos/adminM.php
    require_once "conexionBD.php";

    class AdminM extends ConexionBD{
        public function IngresoM($datosC, $tablaBD = 'usuario'){
            $cbd = ConexionBD::cBD();
            $usuario = mysql_entities_fix_string($cbd, $datosC['usuario']);
            $clave = mysql_entities_fix_string($cbd, $datosC['clave']);
            $query = "SELECT * FROM $tablaBD 
                WHERE username='$usuario'";
            $result = $cbd->query($query);
            if ($result->num_rows)
            {
                $row = $result->fetch_array(MYSQLI_NUM);
                if (password_verify($clave, $row[2]))

                {
                    $_SESSION['username']=$row[0];
                    return true;
                }
                else {
                    echo "<script>
                    M.toast({html: 'Contraseña incorrecta'})
                    </script>";
                }
            }
            else {
                echo "<script>
                M.toast({html: 'Usuario incorrecto'})
                </script>";
          }   
            
        }
    }

?>