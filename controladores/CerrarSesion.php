<?php
    class CerrarSesion{
        public function main(){
            session_destroy();
            header('Location: ?');
        }
    }
?>