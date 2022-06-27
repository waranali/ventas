<?php
require_once 'core/crud.php';
class Ventas extends Crud{
    private $id;
    private $nro_venta;
    private $cantidad;
    private $precio;
    private $producto_id;
    private $cliente_id;
    private $fecha;
    const TABLE='ventas';
    private $pdo;
    public function __construct(){
        parent::__construct(self::TABLE);
        $this->pdo=parent::conexion();
    }
    
    public function __set($name, $value){
        $this->$name=$value;
    }
    public function __get($name){
        return $this->$name;
    }

    public function crear(){  
          try{
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (nro_venta, cantidad, precio, producto_id, cliente_id,fecha) VALUES (?,?,?,?,?,now())");
            $stm->execute(array($this->nro_venta,$this->cantidad,$this->precio,$this->producto_id,$this->cliente_id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET nro_venta=?, cantidad=?, precio=?, producto_id=?, cliente_id=? WHERE id=?");
            $stm->execute(array($this->nro_venta,$this->cantidad,$this->precio,$this->producto_id,$this->cliente_id,$this->id));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    public function buscar($a){
      $consulta = "SELECT * FROM ".self::TABLE." ";
      $busqueda = null;
      if (isset($a)) {
          $busqueda = $a;
          $consulta = "SELECT * FROM ".self::TABLE."  WHERE usuario LIKE ?";
      }
      $stm = $this->pdo->prepare($consulta, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL,]);
      if ($busqueda === null) {
          $stm->execute();
      } else {
          $parametros = ["%$busqueda%"];
          $stm->execute($parametros);
      }
     return $stm->fetchAll(PDO::FETCH_OBJ);
     
    }
}
?>