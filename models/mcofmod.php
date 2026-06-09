<?php
class mCofMod{
    //Atributos
    
    private $idmod;
    private $nommod;
    private $icomod;
    private $actmod;
    private $ordmod;
    private $idpef;
    
    //Metodos Get
    function getIdmod(){ return $this->idmod; }
    function getNommod(){ return $this->nommod; }
    function getIcomod(){ return $this->icomod; }
    function getActmod(){ return $this->actmod; }
    function getOrdmod(){ return $this->ordmod; }
    function getIdpef(){ return $this->idpef; }
    
    //Metodos Set
    function setIdmod($idmod){ return $this->idmod = $idmod; }
    function setNommod($nommod){ return $this->nommod = $nommod; }
    function setIcomod($icomod){ return $this->icomod = $icomod; }
    function setActmod($actmod){ return $this->actmod = $actmod; }
    function setOrdmod($ordmod){ return $this->ordmod = $ordmod; }
    function setIdpef($idpef){ return $this->idpef = $idpef; }
    
    //Metodos
    public function getAll(){
    try {
        $sql = "SELECT
            m.idmod, m.nommod, m.icomod, m.actmod,
            a.nomval AS estados, m.ordmod,
            p.nompef AS Perfiles,
            i.nomval AS nomicon
            FROM modulo AS m
            LEFT JOIN valor AS a ON m.actmod = a.idval AND a.iddom = 7
            LEFT JOIN perfil AS p ON m.idpef = p.idpef
            LEFT JOIN valor AS i ON m.icomod = i.idval AND i.iddom = 9";
        
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $misfun = new misFun();
        $misfun->ManejoError($e);
        return false;
    }
}
    
    public function getOne(){
    try {
        $sql = "SELECT m.idmod, m.nommod, m.icomod, m.actmod, m.ordmod, m.idpef
        FROM modulo AS m
        WHERE m.idmod = :idmod";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idmod = $this->getIdmod();
        $result->bindParam(":idmod", $idmod);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $misfun = new misFun();
        $misfun->ManejoError($e);
        return false;
    }
}
    
    public function save(){
        try {
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $sql = "INSERT INTO modulo(nommod, icomod, actmod, ordmod, idpef)
                    VALUES (:nommod, :icomod, :actmod, :ordmod, :idpef)";
            $result = $conexion->prepare($sql);
            $nommod = $this->getNommod();
            $icomod = $this->getIcomod();
            $actmod = $this->getActmod();
            $ordmod = $this->getOrdmod();
            $idpef = $this->getIdpef();
            $result->bindParam(":nommod", $nommod);
            $result->bindParam(":icomod", $icomod);
            $result->bindParam(":actmod", $actmod);
            $result->bindParam(":ordmod", $ordmod);
            $result->bindParam(":idpef", $idpef);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
            return false;
        }
    }
    
    public function upd(){
        try {
            $sql = "UPDATE modulo SET nommod=:nommod, icomod=:icomod, actmod=:actmod, ordmod=:ordmod, idpef=:idpef WHERE idmod=:idmod";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idmod = $this->getIdmod();
            $result->bindParam(":idmod", $idmod);
            $nommod = $this->getNommod();
            $result->bindParam(":nommod", $nommod);
            $icomod = $this->getIcomod();
            $result->bindParam(":icomod", $icomod);
            $actmod = $this->getActmod();
            $result->bindParam(":actmod", $actmod);
            $ordmod = $this->getOrdmod();
            $result->bindParam(":ordmod", $ordmod);
            $idpef = $this->getIdpef();
            $result->bindParam(":idpef", $idpef);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
            return false;
        }
    }
    
    public function del(){
        try {
            $sql = "DELETE FROM modulo WHERE idmod=:idmod";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idmod = $this->getIdmod();
            $result->bindParam(":idmod", $idmod);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
            return false;
        }
    }
}