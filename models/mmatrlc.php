<?php

class mMatrlc{

private $idcur;
private $nomcur;
private $depcur;
private $idper;
    
  function getIdcur(){
        return $this->idcur;
    }
    function getNomcur(){
        return $this->nomcur;
    }
    function getDepcur(){
        return $this->depcur;
    }
    function getIdper(){
        return $this->idper;
    }

    function setIdcur($idcur){
        $this->idcur = $idcur;
    }
    function setNomcur($nomcur){
        $this->nomcur = $nomcur;
    }
    function setDepcur($depcur){
        $this->depcur = $depcur;
    }
    function setIdper($idper){
        $this->idper = $idper;
    }

    
     public function getAll() {

        $sql = "SELECT idcur, nomcur, depcur, idper
                FROM curso";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);
        

        return $result->fetchAll(PDO::FETCH_ASSOC);
    
    }
    public function getOne() {

        $sql = "SELECT idcur, nomcur, depcur, idper
                FROM curso
                WHERE idcur = :idcur";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idcur = $this->getIdcur();

        $result->bindParam(":idcur", $idcur);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function Save(){
    

        $sql = "INSERT INTO curso(idcurso, idper)
                VALUES (:idcur, :idper)";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idcur  = $this->getIdcur();
        $idper = $this->getIdper();

        $result->bindParam(":idcur", $idcu);
        $result->bindParam(":idper", $idper);

        return $result->execute();
    }
    public function Upd() {

        $sql = "UPDATE curso
                SET idcur = :idcur,
                    nomcur = :nomcur
                WHERE idper = :idper";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idcur  = $this->getIdcur();
        $idper = $this->getIdper();
        $nomcur = $this->getNomcur();

        $result->bindParam(":idcur", $idcur);
        $result->bindParam(":idper", $idper);
        $result->bindParam(":nomcur", $nomcur);

        return $result->execute();
    }
    public function Del() {

        $sql = "DELETE FROM curso
                WHERE idcur = :idcur";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idest = $this->getIdest();

        $result->bindParam(":idcur", $idcur);

        return $result->execute();
    }

    

        

        

        
        
    
}

?>

