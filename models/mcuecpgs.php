<?php
class mCuecpgs{
    // Atributos
    private $nofact;
    private $idest;
    private $idemp;
    private $fecha; 
    private $WHERE;

    // GETTERS
    function get_nofact(){
        return $this->nofact;
    }
    function get_idest(){
        return $this->idest;
    }
    function get_idemp(){
        return $this->idemp;
    }
    function get_fecha(){
        return $this->fecha;
    }
    function get_WHERE(){
        return $this->WHERE;
    }

    // SETTERS
    function setnotfact($nofact){
        $this->nofact = $nofact;
    }
    function setidest($idest){
        $this->idest = $idest;
    }
    function setidemp($idemp){
        $this->idemp = $idemp;
    }
    function setfecha($fecha){
        $this->fecha = $fecha;
    }
    function setWHERE($WHERE){
        $this->WHERE = $WHERE;
    }

    // Métodos

    public function getAll(){
        $sql = "SELECT nofact, idest, idemp, fecha FROM factura";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne(){
        $sql = "SELECT nofact, idest, idemp, fecha FROM factura WHERE nofact = :nofact";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        
        $nofact = $this->get_nofact();
        $result->bindParam(":nofact", $nofact);
        
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Save(){
        $sql = "INSERT INTO factura (nofact, idest, idemp, fecha) VALUES (:nofact, :idest, :idemp, :fecha)";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        
        $nofact = $this->get_nofact();
        $idest = $this->get_idest();
        $idemp = $this->get_idemp();
        $fecha = $this->get_fecha();
        
        $result->bindParam(":nofact", $nofact);
        $result->bindParam(":idest", $idest);
        $result->bindParam(":idemp", $idemp);
        $result->bindParam(":fecha", $fecha);
        
        $result->execute();
    }

    public function Upd(){
        $sql = "UPDATE factura SET idest = :idest, idemp = :idemp, fecha = :fecha WHERE nofact = :nofact";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        
        $nofact = $this->get_nofact();
        $idest = $this->get_idest();
        $idemp = $this->get_idemp();
        $fecha = $this->get_fecha();
        
        $result->bindParam(":nofact", $nofact);
        $result->bindParam(":idest", $idest);
        $result->bindParam(":idemp", $idemp);
        $result->bindParam(":fecha", $fecha);
        
        $result->execute();
    }

    public function Del(){
        $sql = "DELETE FROM factura WHERE nofact = :nofact";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        
        $nofact = $this->get_nofact();
        $result->bindParam(":nofact", $nofact);
        
        $result->execute();
    } 

  public function getPersonas(){
    $sql = "SELECT idper, nomper FROM persona";
    
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    
    $result = $conexion->prepare($sql);
    $result->execute();
    
    return $result->fetchAll(PDO::FETCH_ASSOC);
}
}