<?php
require_once 'modelo/Producto.php';
class ProductoControlador{
    private $model;
    public function __construct(){
        $this -> model=new Producto();
    }
    public function index(){
        $nombrevista='Productos';
        require_once "vista/productos.php";
    }
    
    public function cerrar(){
        session_start();
        session_destroy();
        header("location:index.php");
    }
    public function guardar(){
        $producto = new  Producto();
        $producto->id = $_REQUEST ['id'];
        $producto->nombre = $_REQUEST ['nombre'];
        $producto->codigo = $_REQUEST ['codigo'];
        $producto->p_venta = $_REQUEST ['p_venta'];
        $producto->p_compra = $_REQUEST ['p_compra'];
        $producto->stock = $_REQUEST ['stock'];
        $producto->alerta = $_REQUEST ['alerta'];
        // var_dump($producto);
        // exit;
        $producto->id>0? $producto-> actualizar(): $producto->crear();

        header( 'location:index.php?controlador=producto&action=index' );
    }
    public function addstock(){
        $producto = new  Producto();
        $productoA = new  Producto();
        $a=$producto->obtenerxId($_REQUEST ['id_p']);
        $productoA->id = $a->id;
        $productoA->nombre = $a->nombre;
        $productoA->codigo = $a->codigo;
        $productoA->p_venta = $a->p_venta;
        $productoA->p_compra = $a->p_compra;
        $productoA->stock = ($a->stock+$_REQUEST ['stock']);
        $productoA->alerta = $a->alerta;
        $productoA->actualizar();
        header( 'location:index.php?controlador=producto&action=index' );
    }
}
?>