<?php
    class PanelControl{
        public function main(){
            $sesion = $_SESSION['sesion'];
            if (!empty($_SESSION['sesion'])) {
                require_once "vistas/roles/" . $sesion . "/" . $sesion . ".vista.php";
            } else {
                header('Location: ?');
            }
        }
    }
?>