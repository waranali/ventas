<?php
require_once 'core/crud.php';
class Cliente extends Crud{
    private $id;
    private $nombre;
    private $apellidos;
    private $ci;
    private $celular;
    private $nit;
    private $direccion;
    const TABLE='cliente';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (nombre, apellidos, ci, celular, nit, direccion) VALUES (?,?,?,?,?,?)");
            $stm->execute(array($this->nombre,$this->apellidos,$this->ci,$this->celular,$this->nit,$this->direccion));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET nombre=?, apellidos=?, ci=?, celular=?, nit=?, direccion=? WHERE id=?");
            $stm->execute(array($this->nombre,$this->apellidos,$this->ci,$this->celular,$this->nit,$this->direccion,$this->id));
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