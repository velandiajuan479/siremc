<?php
class mMatest
{
    private $idper;
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
    private $tipdper;

    function getIdper()
    {
        return $this->idper;
    }
    function getTipdper()
    {
        return $this->tipdper;
    }
    function getRhper()
    {
        return $this->rhper;
    }
    function getNuiper()
    {
        return $this->nuiper;
    }
    function getNomper()
    {
        return $this->nomper;
    }
    function getPapeper()
    {
        return $this->papeper;
    }
    function getSapeper()
    {
        return $this->sapeper;
    }
    function getFnacper()
    {
        return $this->fnacper;
    }
    function getUbinac()
    {
        return $this->ubinac;
    }
    function getAleper()
    {
        return $this->aleper;
    }
    function getFotoper()
    {
        return $this->fotoper;
    }
    function getDircper()
    {
        return $this->dircper;
    }
    function getUbidirc()
    {
        return $this->ubidirc;
    }
    function getTelcper()
    {
        return $this->telcper;
    }
    function getCelcper()
    {
        return $this->celcper;
    }
    function getDirtper()
    {
        return $this->dirtper;
    }
    function getUbidirt()
    {
        return $this->ubidirt;
    }
    function getCeltper()
    {
        return $this->celtper;
    }
    function getEmaper()
    {
        return $this->emaper;
    }
    function getPasper()
    {
        return $this->pasper;
    }
    function getActper()
    {
        return $this->actper;
    }
    function getFsolper()
    {
        return $this->fsolper;
    }
    function getClvper()
    {
        return $this->clvper;
    }
    function getEcmper()
    {
        return $this->ecmper;
    }
    function getSegper()
    {
        return $this->segper;
    }
    function getIdpro()
    {
        return $this->idpro;
    }
    function setIdper($idper)
    {
        $this->idper = $idper;
    }
    function setTipdper($tipdper)
    {
        $this->tipdper = $tipdper;
    }
    function setRhper($rhper)
    {
        $this->rhper = $rhper;
    }
    function setNuiper($nuiper)
    {
        $this->nuiper = $nuiper;
    }
    function setNomper($nomper)
    {
        $this->nomper = $nomper;
    }
    function setPapeper($papeper)
    {
        $this->papeper = $papeper;
    }
    function setSapeper($sapeper)
    {
        $this->sapeper = $sapeper;
    }
    function setFnacper($fnacper)
    {
        $this->fnacper = $fnacper;
    }
    function setUbinac($ubinac)
    {
        $this->ubinac = $ubinac;
    }
    function setAleper($aleper)
    {
        $this->aleper = $aleper;
    }
    function setFotoper($fotoper)
    {
        $this->fotoper = $fotoper;
    }
    function setDircper($dircper)
    {
        $this->dircper = $dircper;
    }
    function setUbidirc($ubidirc)
    {
        $this->ubidirc = $ubidirc;
    }
    function setTelcper($telcper)
    {
        $this->telcper = $telcper;
    }
    function setCelcper($celcper)
    {
        $this->celcper = $celcper;
    }
    function setDirtper($dirtper)
    {
        $this->dirtper = $dirtper;
    }
    function setUbidirt($ubidirt)
    {
        $this->ubidirt = $ubidirt;
    }
    function setCeltper($celtper)
    {
        $this->celtper = $celtper;
    }
    function setEmaper($emaper)
    {
        $this->emaper = $emaper;
    }
    function setPasper($pasper)
    {
        $this->pasper = $pasper;
    }
    function setActper($actper)
    {
        $this->actper = $actper;
    }
    function setFsolper($fsolper)
    {
        $this->fsolper = $fsolper;
    }
    function setClvper($clvper)
    {
        $this->clvper = $clvper;
    }
    function setEcmper($ecmper)
    {
        $this->ecmper = $ecmper;
    }
    function setSegper($segper)
    {
        $this->segper = $segper;
    }
    function setIdpro($idpro)
    {
        $this->idpro = $idpro;
    }

    public function getAll()
    {
        try {
            $sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, p.idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function getOne()
    {
        try {
            $sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, p.idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval WHERE p.idper=:idper";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->idper;
            $result->bindparam(":idper", $idper);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
    public function Save()
    {
        try {
            $sql = "INSERT INTO persona(idper, tipdper, nuiper, nomper, papeper, sapeper, fnacper, ubinac, rhper, aleper, fotoper, dircper, ubidirc, telcper, celcper, dirtper, ubidirt, celtper, emaper, pasper, actper, fsolper, clvper, ecmper, segper, idpro) values(:idper, :tipdper, :nuiper, :nomper, :papeper, :sapeper, :fnacper, :ubinac, :rhper, :aleper, :fotoper, :dircper, :ubidirc, :telcper, :celcper, :dirtper, :ubidirt, :celtper, :emaper, :pasper, :actper, :fsolper, :clvper, :ecmper, :segper, :idpro)";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $tipdper = $this->getTipdper();
            $result->bindparam(":tipdper", $tipdper);
            $nuiper = $this->getNuiper();
            $result->bindparam(":nuiper", $nuiper);
            $nomper = $this->getNomper();
            $result->bindparam(":nomper", $nomper);
            $papeper = $this->getPapeper();
            $result->bindparam(":papeper", $papeper);
            $sapeper = $this->getSapeper();
            $result->bindparam(":sapeper", $sapeper);
            $fnacper = $this->getFnacper();
            $result->bindparam(":fnacper", $fnacper);
            $ubinac = $this->getUbinac();
            $result->bindparam(":ubinac", $ubinac);
            $rhper = $this->getRhper();
            $result->bindparam(":rhper", $rhper);
            $aleper = $this->getAleper();
            $result->bindparam(":aleper", $aleper);
            $fotoper = $this->getFotoper();
            $result->bindparam(":fotoper", $fotoper);
            $dircper = $this->getDircper();
            $result->bindparam(":dircper", $dircper);
            $ubidirc = $this->getUbidirc();
            $result->bindparam(":ubidirc", $ubidirc);
            $telcper = $this->getTelcper();
            $result->bindparam(":telcper", $telcper);
            $celcper = $this->getCelcper();
            $result->bindparam(":celcper", $celcper);
            $dirtper = $this->getDirtper();
            $result->bindparam(":dirtper", $dirtper);
            $ubidirt = $this->getUbidirt();
            $result->bindparam(":ubidirt", $ubidirt);
            $celtper = $this->getCeltper();
            $result->bindparam(":celtper", $celtper);
            $emaper = $this->getEmaper();
            $result->bindparam(":emaper", $emaper);
            $pasper = $this->getPasper();
            $result->bindparam(":pasper", $pasper);
            $actper = $this->getActper();
            $result->bindparam(":actper", $actper);
            $fsolper = $this->getFsolper();
            $result->bindparam(":fsolper", $fsolper);
            $clvper = $this->getClvper();
            $result->bindparam(":clvper", $clvper);
            $ecmper = $this->getEcmper();
            $result->bindparam(":ecmper", $ecmper);
            $segper = $this->getSegper();
            $result->bindparam(":segper", $segper);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
    public function Upd()
    {
        try {
            $sql = "UPDATE persona SET idper=:idper, tipdper=:tipdper, nuiper=:nuiper, nomper=:nomper, papeper=:papeper, sapeper=:sapeper, fnacper=:fnacper, ubinac=:ubinac, rhper=:rhper, aleper=:aleper, fotoper=:fotoper, 
            dircper=:dircper, ubidirc=:ubidirc, telcper=:telcper, celcper=:celcper, 
            dirtper=:dirtper, ubidirt=:ubidirt, celtper=:celtper, emaper=:emaper, pasper=:pasper, actper=:actper, fsolper=:fsolper, clvper=:clvper, ecmper=:ecmper, segper=:segper, idpro=:idpro 
            WHERE idper=:idper";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->idper;
            $result->bindparam(":idper", $idper);
            $tipdper = $this->tipdper;
            $result->bindparam(":tipdper", $tipdper);
            $nuiper = $this->nuiper;
            $result->bindparam(":nuiper", $nuiper);
            $nomper = $this->nomper;
            $result->bindparam(":nomper", $nomper);
            $papeper = $this->papeper;
            $result->bindparam(":papeper", $papeper);
            $sapeper = $this->sapeper;
            $result->bindparam(":sapeper", $sapeper);
            $fnacper = $this->fnacper;
            $result->bindparam(":fnacper", $fnacper);
            $ubinac = $this->ubinac;
            $result->bindparam(":ubinac", $ubinac);
            $rhper = $this->rhper;
            $result->bindparam(":rhper", $rhper);
            $aleper = $this->aleper;
            $result->bindparam(":aleper", $aleper);
            $fotoper = $this->fotoper;
            $result->bindparam(":fotoper", $fotoper);
            $dircper = $this->dircper;
            $result->bindparam(":dircper", $dircper);
            $ubidirc = $this->ubidirc;
            $result->bindparam(":ubidirc", $ubidirc);
            $telcper = $this->telcper;
            $result->bindparam(":telcper", $telcper);
            $celcper = $this->celcper;
            $result->bindparam(":celcper", $celcper);
            $dirtper = $this->dirtper;
            $result->bindparam(":dirtper", $dirtper);
            $ubidirt = $this->ubidirt;
            $result->bindparam(":ubidirt", $ubidirt);
            $celtper = $this->celtper;
            $result->bindparam(":celtper", $celtper);
            $emaper = $this->emaper;
            $result->bindparam(":emaper", $emaper);
            $pasper = $this->pasper;
            $result->bindparam(":pasper", $pasper);
            $actper = $this->actper;
            $result->bindparam(":actper", $actper);
            $fsolper = $this->fsolper;
            $result->bindparam(":fsolper", $fsolper);
            $clvper = $this->clvper;
            $result->bindparam(":clvper", $clvper);
            $ecmper = $this->ecmper;
            $result->bindparam(":ecmper", $ecmper);
            $segper = $this->segper;
            $result->bindparam(":segper", $segper);
            $idpro = $this->idpro;
            $result->bindparam(":idpro", $idpro);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
    public function Del()
    {
        try {
            $sql = "DELETE FROM persona WHERE idper=:idper";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idper = $this->idper;
            $result->bindparam(":idper", $idper);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
}
