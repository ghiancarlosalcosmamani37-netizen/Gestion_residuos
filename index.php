<?php //index.php
ob_start();
require_once 'Controladores/rutasC.php';
require_once 'Controladores/adminC.php';
require_once 'Controladores/empleadosC.php';
require_once 'Controladores/crearusuarioC.php';
require_once 'Controladores/ConductorC.php';
require_once 'Controladores/VanC.php';
require_once 'Controladores/DestinoC.php';
require_once 'Controladores/RutaC.php';
require_once 'Controladores/SalidaC.php';
require_once 'Controladores/UsuarioC.php';

require_once 'Modelos/rutasM.php';
require_once 'Modelos/adminM.php';
require_once 'Modelos/empleadosM.php';
require_once 'Modelos/crearusuarioM.php';
require_once 'Modelos/ConductorM.php';
require_once 'Modelos/VanM.php';
require_once 'Modelos/DestinoM.php';
require_once 'Modelos/RutaM.php';
require_once 'Modelos/SalidaM.php';
require_once 'Modelos/UsuarioM.php';

include 'Vistas/plantilla.php';
ob_end_flush();
?>

