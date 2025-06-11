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

        public function usuarioRegistrar(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "vistas/modulos/usuarios/registrar_usuario.vista.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $usuarioReg = new Usuario;
                $usuarioReg->setRolCodigo($_POST['rol_codigo']);
                $usuarioReg->setUsuarioCodigo($_POST['usuario_codigo']);
                $usuarioReg->setUsuarioNombres($_POST['usuario_nombres']);
                $usuarioReg->setUsuarioApellidos($_POST['usuario_apellidos']);
                $usuarioReg->setUsuarioIdentificacion($_POST['usuario_identificador']);
                $usuarioReg->setUsuarioEmail($_POST['usuario_email']);
                $usuarioReg->setUsuarioPass($_POST['usuario_pass']);
                $usuarioReg->setUsuarioEstado($_POST['usuario_estado']);
                $usuarioReg->registrarUsuario();
                header("Location: ?");
            }
        }

        public function usuarioConsultar(){
            $usuarioCon = new Usuario;
            $usuarioCon = $usuarioCon->readUsuarios();
            require_once "vistas/modulos/usuarios/consultar_usuarios.vista.php";
        }

        public function usuarioActualizar(){
            if ($_SERVER['REQUEST_METHOD']  == 'GET') {
                $usuarioId = new Usuario;
                $usuarioId = $usuarioId->getUsuarioById($_GET['idUsuario']);
                require_once "vistas/modulos/usuarios/actualizar_usuario.vista.php";
            }
            if ($_SERVER['REQUEST_METHOD']  == 'POST') {
                $usuarioAct = new Usuario;
                $usuarioAct->setUsuarioCodigo($_POST['usuario_codigo']);
                $usuarioAct->setRolCodigo($_POST['rol_codigo']);
                $usuarioAct->setUsuarioNombres($_POST['usuario_nombres']);
                $usuarioAct->setUsuarioApellidos($_POST['usuario_apellidos']);
                $usuarioAct->setUsuarioIdentificacion($_POST['usuario_identificador']);
                $usuarioAct->setUsuarioEmail($_POST['usuario_email']);
                $usuarioAct->setUsuarioPass($_POST['usuario_pass']);
                $usuarioAct->setUsuarioEstado($_POST['usuario_estado']);
                $usuarioAct->actualizarUsuario();
                header("Location: ?c=Usuarios&a=usuarioConsultar");
            }
        }

        public function usuarioEliminar() {
            $usuario = new Usuario;
            $usuario->eliminarUsuario($_GET['idUsuario']);
            header("Location: ?c=Usuarios&a=usuarioConsultar");
        }
    }
?>