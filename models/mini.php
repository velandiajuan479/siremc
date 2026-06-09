<?php
class mIni
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

    // ---------------------------
    // Métodos Getters
    // ---------------------------
    public function getidper($idper)
    {
        return $this->idper;
    }

    public function getnuiper($nuiper)
    {
        return $this->nuiper;
    }

    public function getnomper($nomper)
    {
        return $this->nomper;
    }

    public function getpapeper($papeper)
    {
        return $this->papeper;
    }

    public function getsapeper($sapeper)
    {
        return $this->sapeper;
    }

    public function getfnacper($fnacper)
    {
        return $this->fnacper;
    }

    public function getubinac($ubinac)
    {
        return $this->ubinac;
    }

    public function getrhper($rhper)
    {
        return $this->rhper;
    }

    public function getaleper($aleper)
    {
        return $this->aleper;
    }

    public function getfotoper($fotoper)
    {
        return $this->fotoper;
    }

    public function getdircper($dircper)
    {
        return $this->dircper;
    }

    public function getubidirc($ubidirc)
    {
        return $this->ubidirc;
    }

    public function gettelcper($telcper)
    {
        return $this->telcper;
    }

    public function getcelcper($celcper)
    {
        return $this->celcper;
    }

    public function getdirtper($dirtper)
    {
        return $this->dirtper;
    }

    public function getubidirt($ubidirt)
    {
        return $this->ubidirt;
    }

    public function getceltper($celtper)
    {
        return $this->celtper;
    }

    public function getemaper($emaper)
    {
        return $this->emaper;
    }

    public function getpasper($pasper)
    {
        return $this->pasper;
    }

    public function getactper($actper)
    {
        return $this->actper;
    }

    public function getfsolper($fsolper)
    {
        return $this->fsolper;
    }

    public function getclvper($clvper)
    {
        return $this->clvper;
    }

    public function getecmper($ecmper)
    {
        return $this->ecmper;
    }

    public function getsegper($segper)
    {
        return $this->segper;
    }

    public function getidpro($idpro)
    {
        return $this->idpro;
    }

    // ---------------------------
    // Métodos Setters
    // ---------------------------
    public function setidper($idper)
    {
        $this->idper = $idper;
    }

    public function setnuiper($nuiper)
    {
        $this->nuiper = $nuiper;
    }

    public function setnomper($nomper)
    {
        $this->nomper = $nomper;
    }

    public function setpapeper($papeper)
    {
        $this->papeper = $papeper;
    }

    public function setsapeper($sapeper)
    {
        $this->sapeper = $sapeper;
    }

    public function setfnacper($fnacper)
    {
        $this->fnacper = $fnacper;
    }

    public function setubinac($ubinac)
    {
        $this->ubinac = $ubinac;
    }

    public function setrhper($rhper)
    {
        $this->rhper = $rhper;
    }

    public function setaleper($aleper)
    {
        $this->aleper = $aleper;
    }

    public function setfotoper($fotoper)
    {
        $this->fotoper = $fotoper;
    }

    public function setdircper($dircper)
    {
        $this->dircper = $dircper;
    }

    public function setubidirc($ubidirc)
    {
        $this->ubidirc = $ubidirc;
    }

    public function settelcper($telcper)
    {
        $this->telcper = $telcper;
    }

    public function setcelcper($celcper)
    {
        $this->celcper = $celcper;
    }

    public function setdirtper($dirtper)
    {
        $this->dirtper = $dirtper;
    }

    public function setubidirt($ubidirt)
    {
        $this->ubidirt = $ubidirt;
    }

    public function setceltper($celtper)
    {
        $this->celtper = $celtper;
    }

    public function setemaper($emaper)
    {
        $this->emaper = $emaper;
    }

    public function setpasper($pasper)
    {
        $this->pasper = $pasper;
    }

    public function setactper($actper)
    {
        $this->actper = $actper;
    }

    public function setfsolper($fsolper)
    {
        $this->fsolper = $fsolper;
    }

    public function setclvper($clvper)
    {
        $this->clvper = $clvper;
    }

    public function setecmper($ecmper)
    {
        $this->ecmper = $ecmper;
    }

    public function setsegper($segper)
    {
        $this->segper = $segper;
    }

    public function setidpro($idpro)
    {
        $this->idpro = $idpro;
    }

    // ---------------------------
    // Métodos generales CRUD
    // ---------------------------
    public function getAll()
    {
        $sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, 
        p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id)
    {
        $sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, 
        p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval WHERE p.idper = :id";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $sql = "INSERT INTO persona (tipdper, nuiper, nomper, papeper, sapeper, fnacper, ubinac, rhper, aleper, fotoper, dircper, ubidirc, telcper, celcper, dirtper, ubidirt,
         celtper, emaper, pasper, actper, fsolper, clvper, ecmper, segper, idpro) VALUES (:tipdper, :nuiper, :nomper, :papeper, :sapeper, :fnacper, :ubinac, :rhper, :aleper, :fotoper, :dircper, :ubidirc, :telcper, :celcper, :dirtper, :ubidirt, :celtper, :emaper, :pasper, :actper, :fsolper, :clvper, :ecmper, :segper)";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $tidper = $this->gettipdper();
        $result->bindParam(':tipdper', $tidper);
        $nuiper = $this->getnuiper();
        $result->bindParam(':nuiper', $nuiper);
        $nomper = $this->getnomper();
        $result->bindParam(':nomper', $nomper);
        $papeper = $this->getpapeper();
        $result->bindParam(':papeper', $papeper);
        $sapeper = $this->getsapeper();
        $result->bindParam(':sapeper', $sapeper);
        $fnacper = $this->getfnacper();
        $result->bindParam(':fnacper', $fnacper);
        $ubinac = $this->getubinac();
        $result->bindParam(':ubinac', $ubinac);
        $rhper = $this->getrhper();
        $result->bindParam(':rhper', $rhper);
        $aleper = $this->getaleper();
        $result->bindParam(':aleper', $aleper);
        $fotoper = $this->getfotoper();
        $result->bindParam(':fotoper', $fotoper);
        $dircper = $this->getdircper();
        $result->bindParam(':dircper', $dircper);
        $ubidirc = $this->getubidirc();
        $result->bindParam(':ubidirc', $ubidirc);
        $telcper = $this->gettelcper();
        $result->bindParam(':telcper', $telcper);
        $celcper = $this->getcelcper();
        $result->bindParam(':celcper', $celcper);
        $dirtper = $this->getdirtper();
        $result->bindParam(':dirtper', $dirtper);
        $ubidirt = $this->getubidirt();
        $result->bindParam(':ubidirt', $ubidirt);
        $celtper = $this->getceltper();
        $result->bindParam(':celtper', $celtper);
        $emaper = $this->getemaper();
        $result->bindParam(':emaper', $emaper);
        $pasper = $this->getpasper();
        $result->bindParam(':pasper', $pasper);
        $actper = $this->getactper();
        $result->bindParam(':actper', $actper);
        $result->execute();
    }

    public function upd()
    {
        $sql = "UPDATE persona SET tipdper=:tipdper, nuiper=:nuiper, nomper=:nomper, papeper=:papeper, sapeper=:sapeper, fnacper=:fnacper, ubinac=:ubinac, rhper=:rhper, aleper=:aleper, fotoper=:fotoper, dircper=:dircper, ubidirc=:ubidirc, telcper=:telcper, celcper=:celcper, dirtper=:dirtper, ubidirt=:ubidirt,
         celtper=:celtper, emaper=:emaper, pasper=:pasper, actper=:actper, fsolper=:fsolper, clvper=:clvper, ecmper=:ecmper, segper=:segper WHERE idper = :id";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper = $this->getidper();
        $result->bindParam(':id', $idper);
        $tidper = $this->gettipdper();
        $result->bindParam(':tipdper', $tidper);
        $nuiper = $this->getnuiper();
        $result->bindParam(':nuiper', $nuiper);
        $nomper = $this->getnomper();
        $result->bindParam(':nomper', $nomper);
        $papeper = $this->getpapeper();
        $result->bindParam(':papeper', $papeper);
        $sapeper = $this->getsapeper();
        $result->bindParam(':sapeper', $sapeper);
        $fnacper = $this->getfnacper();
        $result->bindParam(':fnacper', $fnacper);
        $ubinac = $this->getubinac();
        $result->bindParam(':ubinac', $ubinac);
        $rhper = $this->getrhper();
        $result->bindParam(':rhper', $rhper);
        $aleper = $this->getaleper();
        $result->bindParam(':aleper', $aleper);
        $fotoper = $this->getfotoper();
        $result->bindParam(':fotoper', $fotoper);
        $dircper = $this->getdircper();
        $result->bindParam(':dircper', $dircper);
        $ubidirc = $this->getubidirc();
        $result->bindParam(':ubidirc', $ubidirc);
        $telcper = $this->gettelcper();
        $result->bindParam(':telcper', $telcper);
        $celcper = $this->getcelcper();
        $result->bindParam(':celcper', $celcper);
        $dirtper = $this->getdirtper();
        $result->bindParam(':dirtper', $dirtper);
        $result->execute();
    }

    public function del()
    {
        $sql = "DELETE FROM persona WHERE idper = :id";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idper = $this->getidper();
        $result->bindParam(':id', $idper);
        return $result->execute();
    }
}

?>