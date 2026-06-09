<?php
class mUsudp{
//Atributos
    private $idper;
    private $tipdper;
    private $nuiper;
    private $nomper;
    private $papeper;
    private $sapeper;
    private $fnacper;
    private $ubinac;
    private $rhper;
    private $aleper;
    private $fotoper;
    private $dircper;
    private $ubidirc;
    private $telcper;
    private $celcper;
    private $dirtper;
    private $ubidirt;
    private $celtper;
    private $emaper;
    private $pasper;
    private $actper;
    private $fsolper;
    private $clvper;
    private $ecmper;
    private $segper;
    private $idpro;

//  GETTERS
    function getIdper(){ return $this->idper; }
    function getTipdper(){ return $this->tipdper; }
    function getNuiper(){ return $this->nuiper; }
    function getNomper(){ return $this->nomper; }
    function getPapeper(){ return $this->papeper; }
    function getSapeper(){ return $this->sapeper; }
    function getFnacper(){ return $this->fnacper; }
    function getUbinac(){ return $this->ubinac; }
    function getRhper(){ return $this->rhper; }
    function getAleper(){ return $this->aleper; }
    function getFotoper(){ return $this->fotoper; }
    function getDircper(){ return $this->dircper; }
    function getUbidirc(){ return $this->ubidirc; }
    function getTelcper(){ return $this->telcper; }
    function getCelcper(){ return $this->celcper; }
    function getDirtper(){ return $this->dirtper; }
    function getUbidirt(){ return $this->ubidirt; }
    function getCeltper(){ return $this->celtper; }
    function getEmaper(){ return $this->emaper; }
    function getPasper(){ return $this->pasper; }
    function getActper(){ return $this->actper; }
    function getFsolper(){ return $this->fsolper; }
    function getClvper(){ return $this->clvper; }
    function getEcmper(){ return $this->ecmper; }
    function getSegper(){ return $this->segper; }
    function getIdpro(){ return $this->idpro; }

// SETTERS
    function setIdper($idper){ $this->idper = $idper; }
    function setTipdper($tipdper){ $this->tipdper = $tipdper; }
    function setNuiper($nuiper){ $this->nuiper = $nuiper; }
    function setNomper($nomper){ $this->nomper = $nomper; }
    function setPapeper($papeper){ $this->papeper = $papeper; }
    function setSapeper($sapeper){ $this->sapeper = $sapeper; }
    function setFnacper($fnacper){ $this->fnacper = $fnacper; }
    function setUbinac($ubinac){ $this->ubinac = $ubinac; }
    function setRhper($rhper){ $this->rhper = $rhper; }
    function setAleper($aleper){ $this->aleper = $aleper; }
    function setFotoper($fotoper){ $this->fotoper = $fotoper; }
    function setDircper($dircper){ $this->dircper = $dircper; }
    function setUbidirc($ubidirc){ $this->ubidirc = $ubidirc; }
    function setTelcper($telcper){ $this->telcper = $telcper; }
    function setCelcper($celcper){ $this->celcper = $celcper; }
    function setDirtper($dirtper){ $this->dirtper = $dirtper; }
    function setUbidirt($ubidirt){ $this->ubidirt = $ubidirt; }
    function setCeltper($celtper){ $this->celtper = $celtper; }
    function setEmaper($emaper){ $this->emaper = $emaper; }
    function setPasper($pasper){ $this->pasper = $pasper; }
    function setActper($actper){ $this->actper = $actper; }
    function setFsolper($fsolper){ $this->fsolper = $fsolper; }
    function setClvper($clvper){ $this->clvper = $clvper; }
    function setEcmper($ecmper){ $this->ecmper = $ecmper; }
    function setSegper($segper){ $this->segper = $segper; }
    function setIdpro($idpro){ $this->idpro = $idpro; }

// Métodos
    public function getAll(){
        try {
            $sql = "SELECT p.idper, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, p.idpro FROM persona AS p LEFT JOIN valor AS r ON p.rhper=r.idval";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getOne(){
        try {
            $sql = "SELECT p.idper, p.tipdper, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, p.idpro FROM persona AS p LEFT JOIN valor AS r ON p.rhper=r.idval WHERE p.idper=:idper";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->getIdper();
            $result->bindParam("idper", $idper);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function upd(){
        try {
            $sql = "UPDATE persona SET tipdper=:tipdper, nuiper=:nuiper, nomper=:nomper, papeper=:papeper, sapeper=:sapeper, fnacper=:fnacper, ubinac=:ubinac, rhper=:rhper, aleper=:aleper, fotoper=:fotoper, dircper=:dircper, ubidirc=:ubidirc, telcper=:telcper, celcper=:celcper, dirtper=:dirtper, ubidirt=:ubidirt, celtper=:celtper, emaper=:emaper, pasper=:pasper, actper=:actper, fsolper=:fsolper, clvper=:clvper, ecmper=:ecmper, segper=:segper, idpro=:idpro WHERE idper=:idper";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);

            $idper   = $this->getIdper();
            $tipdper = $this->getTipdper();
            $nuiper  = $this->getNuiper();
            $nomper  = $this->getNomper();
            $papeper = $this->getPapeper();
            $sapeper = $this->getSapeper();
            $fnacper = $this->getFnacper();
            $ubinac  = is_numeric($this->getUbinac())  ? (int)$this->getUbinac()  : null;
            $rhper   = is_numeric($this->getRhper())   ? (int)$this->getRhper()   : null;
            $aleper  = $this->getAleper();
            $fotoper = $this->getFotoper();
            $dircper = $this->getDircper();
            $ubidirc = is_numeric($this->getUbidirc()) ? (int)$this->getUbidirc() : null;
            $telcper = $this->getTelcper();
            $celcper = $this->getCelcper();
            $dirtper = $this->getDirtper();
            $ubidirt = is_numeric($this->getUbidirt()) ? (int)$this->getUbidirt() : null;
            $celtper = $this->getCeltper();
            $emaper  = $this->getEmaper();
            $pasper  = $this->getPasper();
            $actper  = $this->getActper();
            $fsolper = $this->getFsolper();
            $clvper  = $this->getClvper();
            $ecmper  = $this->getEcmper();
            $segper  = is_numeric($this->getSegper())  ? (int)$this->getSegper()  : null;
            $idpro   = !empty($this->getIdpro())       ? $this->getIdpro()        : null;

            $result->bindParam("idper",   $idper,   PDO::PARAM_INT);
            $result->bindParam("tipdper", $tipdper, PDO::PARAM_INT);
            $result->bindParam("nuiper",  $nuiper);
            $result->bindParam("nomper",  $nomper);
            $result->bindParam("papeper", $papeper);
            $result->bindParam("sapeper", $sapeper);
            $result->bindParam("fnacper", $fnacper);
            $result->bindParam("ubinac",  $ubinac,  PDO::PARAM_INT);
            $result->bindParam("rhper",   $rhper,   PDO::PARAM_INT);
            $result->bindParam("aleper",  $aleper);
            $result->bindParam("fotoper", $fotoper);
            $result->bindParam("dircper", $dircper);
            $result->bindParam("ubidirc", $ubidirc, PDO::PARAM_INT);
            $result->bindParam("telcper", $telcper);
            $result->bindParam("celcper", $celcper);
            $result->bindParam("dirtper", $dirtper);
            $result->bindParam("ubidirt", $ubidirt, PDO::PARAM_INT);
            $result->bindParam("celtper", $celtper);
            $result->bindParam("emaper",  $emaper);
            $result->bindParam("pasper",  $pasper);
            $result->bindParam("actper",  $actper,  PDO::PARAM_INT);
            $result->bindParam("fsolper", $fsolper);
            $result->bindParam("clvper",  $clvper);
            $result->bindParam("ecmper",  $ecmper,  PDO::PARAM_INT);
            $result->bindParam("segper",  $segper,  PDO::PARAM_INT);
            $result->bindParam("idpro",   $idpro,   PDO::PARAM_INT);
            $result->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>