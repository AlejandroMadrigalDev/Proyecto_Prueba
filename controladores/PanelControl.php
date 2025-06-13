<?php
    class PanelControl{
        public function main(){
            $sesion = $_SESSION['sesion'];
            require_once "vistas/roles/admin/admin.vista.php";
        }
    }
?>