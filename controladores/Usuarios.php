<?php
require_once "modelos/Usuario.php";
    class Usuarios {
        public function main(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "vistas/roles/admin/admin.vista.php";
            }
        }

        public function rolRegistrar(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "vistas/modulos/usuarios/registrar_rol.vista.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $rol = new Usuario;
                $rol->setRolCodigo(null);
                $rol->setRolNombre($_POST['rol_nombre']);
                $rol->registrarRol();
                header("Location: ?c=Usuarios&a=rolConsultar");

                //$profile = $profile->login();
                // if ($rol) {
                //     header("Location:?c=PanelControl");
                // } else {
                //     header("Location:?c=IniciarSesion");
                // }
            }

        }

        public function rolConsultar(){
            $roles = new Usuario;
            $roles = $roles->readRoles();
            require_once "vistas/modulos/usuarios/consultar_roles.vista.php";
        }

        public function rolActualizar(){
            if ($_SERVER['REQUEST_METHOD']  == 'GET') {
                $rolId = new Usuario;
                $rolId = $rolId->getRolById($_GET['idRol']);
                require_once "vistas/modulos/usuarios/actualizar_rol.vista.php";
            }
            if ($_SERVER['REQUEST_METHOD']  == 'POST') {
                $rolAct = new Usuario;
                $rolAct->setRolCodigo($_POST['rol_codigo']);
                $rolAct->setRolNombre($_POST['rol_nombre']);
                $rolAct->actualizarRol();
                header("Location: ?c=Usuarios&a=rolConsultar");
            }
        }

        public function rolEliminar() {
            $rol = new Usuario;
            $rol->eliminarRol($_GET['idRol']);
            header("Location: ?c=Usuarios&a=rolConsultar");
        }

    }
?>