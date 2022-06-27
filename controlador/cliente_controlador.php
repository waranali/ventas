<?php
require_once 'modelo/Cliente.php';
class ClienteControlador{
    private $model;
    public function __construct(){
        $this -> model=new Cliente();
    }
    public function index(){
        $nombrevista='Clientes';
        require_once "vista/clientes.php";
    }
    
    public function cerrar(){
        session_start();
        session_destroy();
        header("location:index.php");
    }
    public function guardar(){
        $cliente = new  Cliente();
        $cliente->id = $_REQUEST ['id'];
        $cliente->nombre = $_REQUEST ['nombre'];
        $cliente->apellidos = $_REQUEST ['apellidos'];
        $cliente->ci = $_REQUEST ['ci'];
        $cliente->celular = $_REQUEST ['celular'];
        $cliente->nit = $_REQUEST ['nit'];
        $cliente->direccion = $_REQUEST ['direccion'];
        // var_dump($cliente);
        // exit;
        $cliente->id>0? $cliente-> actualizar(): $cliente->crear();

        header( 'location:index.php?controlador=cliente&action=index' );
    }

    public function quit(){
        $this->model->eliminar($_REQUEST['id']);
        header('location:index.php?controlador=cliente&action=index');
    }

}
?>