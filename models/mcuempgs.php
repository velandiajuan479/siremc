<?php
class mfactura {
    // --- ATRIBUTOS ---
    private $nofact;
    private $idest;
    private $idemp;
    private $fecha;

    // --- GETTERS ---
    public function getNofact() { 
        return $this->nofact;
    }
    public function getIdest() {
        return $this->idest; 
    }
    public function getIdemp() {
        return $this->idemp; 
    }
    public function getFecha() {
        return $this->fecha; 
    }

    // --- SETTERS ---
    public function setNofact($nofact) {
        $this->nofact = $nofact; 
    }
    public function setIdest($idest) {
        $this->idest = $idest; 
    }
    public function setIdemp($idemp) {
        $this->idemp = $idemp; 
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha; 
    }

    // --- MÉTODOS CRUD ---

    public function getAll(){
        try {
            $sql = "SELECT nofact, idest, idemp, fecha FROM factura";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function getOne(){
        try {
            $sql = "SELECT nofact, idest, idemp, fecha 
                    FROM factura 
                    WHERE nofact = :nofact";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            
            $nofact = $this->getNofact();
            $result->bindParam(":nofact", $nofact);
            
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function Save(){
        try {
            $sql = "INSERT INTO factura (nofact, idest, idemp, fecha) 
                    VALUES (:nofact, :idest, :idemp, :fecha)";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            
            $nofact = $this->getNofact();
            $result->bindParam(":nofact", $nofact);
            
            $idest = $this->getIdest();
            $result->bindParam(":idest", $idest);
            
            $idemp = $this->getIdemp();
            $result->bindParam(":idemp", $idemp);
            
            $fecha = $this->getFecha();
            $result->bindParam(":fecha", $fecha);

            $result->execute();

        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function upd(){
        try {
            $sql = "UPDATE factura 
                    SET idest = :idest, idemp = :idemp, fecha = :fecha 
                    WHERE nofact = :nofact";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            
            $nofact = $this->getNofact();
            $result->bindParam(":nofact", $nofact);
            
            $idest = $this->getIdest();
            $result->bindParam(":idest", $idest);
            
            $idemp = $this->getIdemp();
            $result->bindParam(":idemp", $idemp);
            
            $fecha = $this->getFecha();
            $result->bindParam(":fecha", $fecha);

            $result->execute();
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function Del(){
        try {
            $sql = "DELETE FROM factura 
                    WHERE nofact = :nofact";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            
            $nofact = $this->getNofact();
            $result->bindParam(":nofact", $nofact);
            
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
}
?>