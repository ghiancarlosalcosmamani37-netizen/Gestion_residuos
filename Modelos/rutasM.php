<?php //  Modelos/rutasM.php
class RutasM
{
    public function procesaRutasM($ruta)
    {

        if (
            $ruta == "ingreso" ||
            $ruta == 'empleados' ||
            $ruta == 'registrar' ||
            $ruta == 'salir' ||
            $ruta == 'editar' ||
            $ruta == 'editarU' ||
            $ruta == 'usuario' ||
            $ruta == 'nooperativo' ||
            $ruta == 'Filtrar' ||
            $ruta == 'Favoritos' ||
            $ruta == 'Buscar' ||
            $ruta == 'verificar' ||
            $ruta == 'Archivados' ||
            $ruta == 'cambiarcontraseña' ||
            $ruta == 'recuperar' ||
            //Nuevos Conductor
            $ruta == 'ConductorRegistrar' ||
            $ruta == 'ConductorLista' ||
            $ruta == 'ConductorEditar' ||
            $ruta == 'ConductorSuspendido' ||
            //Nuevos Conductor
            $ruta == 'VanRegistrar' ||
            $ruta == 'VanLista' ||
            $ruta == 'VanEditar' ||
            $ruta == 'VanSuspendido' ||
            //Rutas
            $ruta == 'DestinoEditar' ||
            $ruta == 'DestinoLista' ||
            $ruta == 'DestinoRegistrar' ||
            //Nuevos Rutas Asignar
            $ruta == 'RutaRegistrar' ||
            $ruta == 'RutaLista' ||
            $ruta == 'RutaEditar' ||
            $ruta == 'RutaSuspendido' ||
            $ruta == 'Encomiendas' || //Encomiendas
            $ruta == 'Envios' ||
            $ruta == 'Seguimiento' ||
            $ruta == 'Entregados' ||  // Encomiendas
            //Kevin
            $ruta == 'formulario_venta_boleto' ||
            $ruta == 'boletos_vendidos' ||
            $ruta == 'reportes_ventas' ||
            $ruta == 'generar_boleta' ||
            //reportes dev viaje
            $ruta == 'reportes_viaje' ||
            $ruta == 'reportes_viaje_deta' ||

            //Salidas
            $ruta == 'Salidas' ||
            //Nuevos Usuarios
            $ruta == 'UsuariosRegistrar' ||
            $ruta == 'UsuariosLista' ||
            $ruta == 'UsuariosEditar' ||
            $ruta == 'UsuariosSuspendido' ||

            $ruta == 'crearusuario'
        ) {
            $pagina = "Vistas/modulos/" . $ruta . ".php";
        } else if ($ruta == 'index') {
            $pagina = "Vistas/modulos/ingreso.php";
        } else {
            $pagina = "Vistas/modulos/ingreso.php";
        }
        return $pagina;
    }
}
