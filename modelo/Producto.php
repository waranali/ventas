<?php
require_once 'core/crud.php';
class Producto extends Crud{
    private $id;
    private $nombre;
    private $codigo;
    private $p_venta;
    private $p_compra;
    private $stock;
    private $alerta;
    const TABLE='producto';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (nombre, codigo, p_venta, p_compra, stock, alerta) VALUES (?,?,?,?,?,?)");
            $stm->execute(array($this->nombre,$this->codigo,$this->p_venta,$this->p_compra,$this->stock,$this->alerta));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET nombre=?, codigo=?, p_venta=?, p_compra=?, stock=?, alerta=? WHERE id=?");
            $stm->execute(array($this->nombre,$this->codigo,$this->p_venta,$this->p_compra,$this->stock,$this->alerta,$this->id));
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