<?php
require_once "modelos/Usuario.php";
    class IniciarSesion {
        public function main(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                require_once "vistas/empresa/iniciar_sesion.vista.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $profile = new Usuario(
                    $_POST['usuario_email'],
                    $_POST['usuario_pass']
                );
                $profile = $profile->login();
                if ($profile) {
                    header("Location:?c=PanelControl");
                } else {
                    header("Location:?c=IniciarSesion");
                }
            }
        }    
    }
?>