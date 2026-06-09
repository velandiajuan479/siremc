<?php

class mUsuemp{



private $idper;
private $nomper;
private $pasper;
private $dircper;
private $emaper;
private $fsolper;
private $clvper;
private $telcper;
private $actper;

    
    public function getIdper(){ return $this->idper;}
    public function getNomper(){ return $this->nomper;}
    public function getPasper(){ return $this->pasper;}
    public function getDircper(){ return $this->dircper;} 
    public function getEmaper(){ return $this->emaper;}
    public function getFsolper(){ return $this->fsolper;} 
    public function getClvper(){ return $this->clvper;}
    public function getTelcper(){ return $this->telcper;} 
    public function getActper(){ return $this->actper;}
    

    
    public function setIdper($idper){ $this->idper =       $idper; }
    public function setNomper($nomper){ $this->nomper =    $nomper; }
    public function setPasper($pasper){ $this->pasper =    $pasper; }
    public function setDircper($dircper){ $this->dircper = $dircper; }
    public function setEmaper($emaper){ $this->emaper =    $emaper; }
    public function setFsolper($fsolper){ $this->fsolper = $fsolper; }
    public function setClvper($clvper){ $this->clvper =    $clvper; }    
    public function setTelcper($telcper){ $this->telcper = $telcper; }
    public function setActper($actper){ $this->actper =    $actper; }



    
    public function getAll(){
        $sql = "SELECT idper, nomper, dircper, telcper, emaper, pasper, actper, fsolper, clvper
                FROM persona ";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOne(){

        $sql = "SELECT  idper, nomper, dircper, telcper, emaper, pasper, actper, fsolper, clvper
                FROM persona
                WHERE idper = :idper";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function save(){

        $sql = "INSERT INTO persona( nomper, dircper, telcper, emaper, pasper, actper, fsolper, clvper) 
                VALUES ( :nomper, :dircper, :telcper, :emaper, :pasper, :actper, :fsolper, :clvper)";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion() ;
        $result = $conexion->prepare($sql);
        $nomper  = $this->getNomper();
        $dircper = $this->getDircper();
        $telcper = $this->getTelcper();
        $emaper  = $this->getEmaper();
        $pasper  = $this->getPasper();
        $actper  = $this->getActper();
        $fsolper = $this->getFsolper();
        $clvper  = $this->getClvper();
        $result->bindParam(":nomper", $nomper);
        $result->bindParam(":dircper", $dircper);
        $result->bindParam(":telcper", $telcper);
        $result->bindParam(":emaper", $emaper);
        $result->bindParam(":pasper", $pasper);
        $result->bindParam(":actper", $actper);
        $result->bindParam(":fsolper", $fsolper);
$result->bindParam(":clvper", $clvper) ;
        return $result->execute();
    }


    public function upd(){

        $sql = "UPDATE persona SET nomper = :nomper, dircper = :dircper, telcper = :telcper, emaper = :emaper, pasper = :pasper,    actper = :actper, fsolper = :fsolper, clvper = :clvper
                WHERE idper = :idper";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper   = $this->getIdper();
        $nomper  = $this->getNomper();
        $dircper = $this->getDircper();
        $telcper = $this->getTelcper();
        $emaper  = $this->getEmaper();
        $pasper  = $this->getPasper();
        $actper  = $this->getActper();
        $fsolper = $this->getFsolper();
        $clvper  = $this->getClvper();
        $result->bindParam(":idper", $idper);
        $result->bindParam(":nomper", $nomper);
        $result->bindParam(":dircper", $dircper);
        $result->bindParam(":telcper", $telcper);
        $result->bindParam(":emaper", $emaper);
        $result->bindParam(":pasper", $pasper);
        $result->bindParam(":actper", $actper);
        $result->bindParam(":fsolper", $fsolper);
        $result->bindParam(":clvper", $clvper);
        return $result->execute();
    }

    public function Del(){

    $sql = "DELETE FROM persona
            WHERE idper = :idper";
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $result = $conexion->prepare($sql);
    $idper = $this->getIdper();
    $result->bindParam(":idper", $idper);
    return $result->execute();
    }
}

?>
