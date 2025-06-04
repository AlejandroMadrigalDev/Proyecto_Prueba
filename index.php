<?php
    require_once "modelos/Database.php";
    $prueba_conn = DataBase::connection();
    if (!isset($_REQUEST['c'])) {
    require_once "controladores/Usuarios.php";
    $controlador = new Usuarios();
    $controlador->rolRegistrar();
    echo "Controlador que si funciona si no hay C";
    } else {
        echo "Controlador que funciona si hay C";
        $controlador = $_REQUEST['c'];
        require_once "controladores/" . $controlador . ".php";
        $controlador = new $controlador;
        print_r($controlador);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'main';
        call_user_func(array($controlador, $accion));
    }
?>