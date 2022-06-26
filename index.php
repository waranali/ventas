<?php
if (!isset($_REQUEST['controlador'])) {
    require_once 'controlador/index_controlador.php';
    $controller=new IndexControlador();
    $controller->indexInicio();
}else{
    $controller=$_REQUEST['controlador'];
    $action=$_REQUEST['action'];
    require_once 'controlador/'.$controller.'_controlador.php';
    $controller=ucwords($controller).'Controlador';
    $controller=new $controller;
    call_user_func(array($controller,$action));
}
?>