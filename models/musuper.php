<?php
class mUsuper{
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
    function getIdper(){
        return $this->idper;
    }
    function getTipdper(){
        return $this->tipdper;
    }
    function getNuiper(){
        return $this->nuiper;
    }
    function getNomper(){
        return $this->nomper;
    }
    function getPapeper(){
        return $this->papeper;
    }
    function getSapeper(){
        return $this->sapeper;
    }
    function getFnacper(){
        return $this->fnacper;
    }
    function getUbinac(){
        return $this->ubinac;
    }
    function getRhper(){
        return $this->rhper;
    }
    function getAleper(){
        return $this->aleper;
    }
    function getFotoper(){
        return $this->fotoper;
    }
    function getDircper(){
        return $this->dircper;
    }
    function getUbidirc(){
        return $this->ubidirc;
    }
    function getTelcper(){
        return $this->telcper;
    }
    function getCelcper(){
        return $this->celcper;
    }
    function getDirtper(){
        return $this->dirtper;
    }
    function getUbidirt(){
        return $this->ubidirt;
    }
    function getCeltper(){
        return $this->celtper;
    }
    function getEmaper(){
        return $this->emaper;
    }
    function getPasper(){
        return $this->pasper;
    }
    function getActper(){
        return $this->actper;
    }
    function getFsolper(){
        return $this->fsolper;
    }
    function getClvper(){
        return $this->clvper;
    }
    function getEcmper(){
        return $this->ecmper;
    }
    function getSegper(){
        return $this->segper;
    }
    function getIdpro(){
        return $this->idpro;
    }
// SETTERS
    function setIdper($idper){
        $this->idper = $idper;
    }
    function setTipdper($tipdper){
        $this->tipdper = $tipdper;
    }
    function setNuiper($nuiper){
        $this->nuiper = $nuiper;
    }
    function setNomper($nomper){
        $this->nomper = $nomper;
    }
    function setPapeper($papeper){
        $this->papeper = $papeper;
    }
    function setSapeper($sapeper){
        $this->sapeper = $sapeper;
    }
    function setFnacper($fnacper){
        $this->fnacper = $fnacper;
    }
    function setUbinac($ubinac){
        $this->ubinac = $ubinac;
    }
    function setRhper($rhper){
        $this->rhper = $rhper;
    }
    function setAleper($aleper){
        $this->aleper = $aleper;
    }
    function setFotoper($fotoper){
        $this->fotoper = $fotoper;
    }
    function setDircper($dircper){
        $this->dircper = $dircper;
    }
    function setUbidirc($ubidirc){
        $this->ubidirc = $ubidirc;
    }
    function setTelcper($telcper){
        $this->telcper = $telcper;
    }
    function setCelcper($celcper){
        $this->celcper = $celcper;
    }
    function setDirtper($dirtper){
        $this->dirtper = $dirtper;
    }
    function setUbidirt($ubidirt){
        $this->ubidirt = $ubidirt;
    }
    function setCeltper($celtper){
        $this->celtper = $celtper;
    }
    function setEmaper($emaper){
        $this->emaper = $emaper;
    }
    function setPasper($pasper){
        $this->pasper = $pasper;
    }
    function setActper($actper){
        $this->actper = $actper;
    }
    function setFsolper($fsolper){
        $this->fsolper = $fsolper;
    }
    function setClvper($clvper){
        $this->clvper = $clvper;
    }
    function setEcmper($ecmper){
        $this->ecmper = $ecmper;
    }
    function setSegper($segper){
        $this->segper = $segper;
    }
    function setIdpro($idpro){
        $this->idpro = $idpro;
    }

// Métodos
    public function getAll($idpef=1){
        try{
            $sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, p.idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval";
            if($idpef AND $idpef!=1)
                $sql .= " INNER JOIN pefxper AS f ON p.idper=f.idper WHERE f.idpef=".$idpef;

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
    public function getOne(){
        try{
            $sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, p.idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval WHERE p.idper=:idper";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->getIdper();
            $result->bindParam("idper",$idper);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch (Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
    public function save(){
        try{
            $fotoper = $this->getFotoper();
            $pasper = $this->getPasper();
            $sql = "INSERT INTO persona (tipdper, nuiper, nomper, papeper, sapeper, fnacper, ubinac, rhper, aleper, ";
            if($fotoper) $sql .= " fotoper,";
            $sql .= " dircper, ubidirc, telcper, celcper, dirtper, ubidirt, celtper, emaper, ";
            if($pasper) $sql .= " pasper,";
            $sql .= " actper, segper, idpro) VALUES (:tipdper, :nuiper, :nomper, :papeper, :sapeper, :fnacper, :ubinac, :rhper, :aleper, ";
            if($fotoper) $sql .= " :fotoper,";
            $sql .= " :dircper, :ubidirc, :telcper, :celcper, :dirtper, :ubidirt, :celtper, :emaper, ";
            if($pasper) $sql .= " :pasper,";
            $sql .= " :actper, :segper, :idpro) ";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $tipdper = $this->getTipdper();
            $result->bindParam("tipdper",$tipdper);
            $nuiper = $this->getNuiper();
            $result->bindParam("nuiper",$nuiper);
            $nomper = $this->getNomper();
            $result->bindParam("nomper",$nomper);
            $papeper = $this->getPapeper();
            $result->bindParam("papeper",$papeper);
            $sapeper = $this->getSapeper();
            $result->bindParam("sapeper",$sapeper);
            $fnacper = $this->getFnacper();
            $result->bindParam("fnacper",$fnacper);
            $ubinac = $this->getUbinac();
            $result->bindParam("ubinac",$ubinac);
            $rhper = $this->getRhper();
            $result->bindParam("rhper",$rhper);
            $aleper = $this->getAleper();
            $result->bindParam("aleper",$aleper);
            if($fotoper) $result->bindParam("fotoper",$fotoper);
            $dircper = $this->getDircper();
            $result->bindParam("dircper",$dircper);
            $ubidirc = $this->getUbidirc();
            $result->bindParam("ubidirc",$ubidirc);
            $telcper = $this->getTelcper();
            $result->bindParam("telcper",$telcper);
            $celcper = $this->getCelcper();
            $result->bindParam("celcper",$celcper);
            $dirtper = $this->getDirtper();
            $result->bindParam("dirtper",$dirtper);
            $ubidirt = $this->getUbidirt();
            $result->bindParam("ubidirt",$ubidirt);
            $celtper = $this->getCeltper();
            $result->bindParam("celtper",$celtper);
            $emaper = $this->getEmaper();
            $result->bindParam("emaper",$emaper);
            if($pasper) $result->bindParam("pasper",$pasper);
            $actper = $this->getActper();
            $result->bindParam("actper",$actper);
            $segper = $this->getSegper();
            $result->bindParam("segper",$segper);
            $idpro = $this->getIdpro();
            $result->bindParam("idpro",$idpro);
            $result->execute();
        }catch (Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
    public function upd(){
        try{
            $sql = "UPDATE persona SET tipdper=:tipdper, nuiper=:nuiper, nomper=:nomper, papeper=:papeper, sapeper=:sapeper, fnacper=:fnacper, ubinac=:ubinac, rhper=:rhper, aleper=:aleper, fotoper=:fotoper, dircper=:dircper, ubidirc=:ubidirc, telcper=:telcper, celcper=:celcper, dirtper=:dirtper, ubidirt=:ubidirt, celtper=:celtper, emaper=:emaper, pasper=:pasper, actper=:actper, segper=:segper, idpro=:idpro WHERE idper=:idper";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->getIdper();
            $result->bindParam("idper",$idper);
            $tipdper = $this->getTipdper();
            $result->bindParam("tipdper",$tipdper);
            $nuiper = $this->getNuiper();
            $result->bindParam("nuiper",$nuiper);
            $nomper = $this->getNomper();
            $result->bindParam("nomper",$nomper);
            $papeper = $this->getPapeper();
            $result->bindParam("papeper",$papeper);
            $sapeper = $this->getSapeper();
            $result->bindParam("sapeper",$sapeper);
            $fnacper = $this->getFnacper();
            $result->bindParam("fnacper",$fnacper);
            $ubinac = $this->getUbinac();
            $result->bindParam("ubinac",$ubinac);
            $rhper = $this->getRhper();
            $result->bindParam("rhper",$rhper);
            $aleper = $this->getAleper();
            $result->bindParam("aleper",$aleper);
            $fotoper = $this->getFotoper();
            $result->bindParam("fotoper",$fotoper);
            $dircper = $this->getDircper();
            $result->bindParam("dircper",$dircper);
            $ubidirc = $this->getUbidirc();
            $result->bindParam("ubidirc",$ubidirc);
            $telcper = $this->getTelcper();
            $result->bindParam("telcper",$telcper);
            $celcper = $this->getCelcper();
            $result->bindParam("celcper",$celcper);
            $dirtper = $this->getDirtper();
            $result->bindParam("dirtper",$dirtper);
            $ubidirt = $this->getUbidirt();
            $result->bindParam("ubidirt",$ubidirt);
            $celtper = $this->getCeltper();
            $result->bindParam("celtper",$celtper);
            $emaper = $this->getEmaper();
            $result->bindParam("emaper",$emaper);
            $pasper = $this->getPasper();
            $result->bindParam("pasper",$pasper);
            $actper = $this->getActper();
            $result->bindParam("actper",$actper);
            $fsolper = $this->getFsolper();
            $segper = $this->getSegper();
            $result->bindParam("segper",$segper);
            $idpro = $this->getIdpro();
            $result->bindParam("idpro",$idpro);
            $result->execute();
        }catch (Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
    public function del(){
        try{
            $sql = "DELETE FROM persona WHERE idper=:idper";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->getIdper();
            $result->bindParam("idper",$idper);
            $result->execute();
        }catch (Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
}
?>