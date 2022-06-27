<?php
require_once 'modelo/usuario.php';
class IndexControlador{
    private $model;
    private $vista='vista/content/';
    public function __construct(){
        $this -> model=new Usuario();
    }
    public function indexInicio(){
        require_once 'vista/index.php';
    }
    public function indexVentas(){
        require_once 'vista/ventas.php';
    }
    public function login(){
        session_start();
        $login=new Usuario();
        if(isset($_REQUEST['user']) && isset($_REQUEST['pass'])){
            $cot=$login->login($_REQUEST['user'],$_REQUEST['pass']);
            if ($cot) {
                $_SESSION['nane']=$cot->usuario;
                $_SESSION['idEmpleado']=$cot->id;
                $_SESSION['nivel']=$cot->nivel;
                if ($cot->nivel =="admin") {
                    header("location:index.php?controlador=cargo&action=indexCargo");
                    
                }else{
                    header("location:index.php?controlador=cargo&action=indexCargo");
                    
                }
            }else {
                header("location:index.php?res=1");
            }
            
        }else{
            header("location:index.php?res=2");
        }
    }
    public function cerrar(){
        session_start();
        session_destroy();
        header("location:index.php");
    }
    
}
?>