<?php
require_once 'modelo/Ventas.php';
// admiquirmos los modelos nesesarios
require_once 'modelo/Producto.php';
require_once 'modelo/Cliente.php';
class VentasControlador{
    private $model;
    public function __construct(){
        $this -> model=new Ventas();
    }
    public function index(){
        $producto= new Producto();     
        $cliente=  new Cliente();
        require_once "vista/ventas.php";
    }
    public function pos(){
        $producto= new Producto();    
        $cliente=  new Cliente();
        require_once "vista/pos.php";
    }
    
    public function cerrar(){
        session_start();
        session_destroy();
        header("location:index.php");
    }
    public function guardar(){
        session_start();
        if ($_REQUEST ['cliente'] && $_SESSION['products']) {
            $cliente_id = $_REQUEST ['cliente'];
            $ids = implode( ', ', array_keys($_SESSION['products']));
            $productos=new Producto();$prod=new Producto();
            foreach ($productos->mostrarIds($ids) as $key=>$product) {
                $cantidad=$_SESSION['products'][$product->id];
                $venta= new Ventas();
                $venta->nro_venta=0;
                $venta->cantidad=$cantidad;
                $venta->precio=$product->p_venta*$cantidad;
                $venta->producto_id=$product->id;
                $venta->cliente_id=$cliente_id;
                $venta->crear();
                //actualizar producto
                $a=new Producto();
                $p=$product->stock-$cantidad;
                $a->id =$product->id ;
                $a->nombre =$product->nombre;
                $a->codigo = $product->codigo;
                $a->p_venta = $product->p_venta;
                $a->p_compra = $product->p_compra;
                $a->stock = $p;
                $a->alerta = $product->alerta;
                $a->actualizar();

            }
            session_unset();
            session_destroy();
            header( 'location:index.php?controlador=ventas&action=pos');
        }else {
            header( 'location:index.php?controlador=ventas&action=pos&error=1' );
        }
        
    }
    public function carrito(){
        session_start();
        $product_id=$_REQUEST['id'];
        if (!array_key_exists('products', $_SESSION)) {
            $_SESSION['products'] = [];
        }
        $_SESSION['products'][$product_id] = array_key_exists($product_id, $_SESSION['products']) ? $_SESSION['products'][$product_id] + 1 : 1;
        header( 'location:index.php?controlador=ventas&action=pos' );
       
    }
    public function menoscarrito(){
        session_start();
        $product_id=$_REQUEST['id']; 
        $n=$_SESSION['products'][$product_id]- 1;
        $_SESSION['products'][$product_id]=$n;
        header( 'location:index.php?controlador=ventas&action=pos' );
    }
    public function eliminarcarrito(){
        session_start();
        $product_id=$_REQUEST['id']; 
        unset($_SESSION['products'][$product_id]);
        if (!$_SESSION['products']) {
            session_unset();
        }
        header( 'location:index.php?controlador=ventas&action=pos' );
    }
}
?>