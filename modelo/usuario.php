<?php
require_once 'core/crud.php';
class Usuario extends Crud{
    private $id;
    private $usuario;
    private $password;
    private $nivel;
    private $estado;
    private $empleado_id_empleado;
    const TABLE='usuarios';
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
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (usuario,password,nivel,estado,empleado_id_empleado) VALUES (?,?,?,?,?)");
            $stm->execute(array($this->usuario,$this->password,$this->nivel,$this->estado,$this->empleado_id_empleado));
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
    
    public function actualizar(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET usuario=?,password=?,nivel=?,estado=?,empleado_id_empleado=? WHERE id=?");
            $stm->execute(array($this->usuario,$this->password,$this->nivel,$this->estado,$this->empleado_id_empleado,$this->id));
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
    public function login($user,$pass){
        try{
            $stm=$this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE usuario=? AND password=?");
            $stm->execute(array($user,$pass));
            return $stm->fetch(PDO::FETCH_OBJ);
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    }
}
?>