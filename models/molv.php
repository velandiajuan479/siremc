<?php
class mOlv
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
public function getidper()
{
return $this->idper;
}
public function getnuiper()
{
return $this->nuiper;
}
public function getnomper()
{
return $this->nomper;
}
public function getpapeper()
{
return $this->papeper;
}
public function getsapeper()
{
return $this->sapeper;
}
public function getfnacper()
{
return $this->fnacper;
}
public function getubinac()
{
return $this->ubinac;
}
public function getrhper()
{
return $this->rhper;
}
public function getaleper()
{
return $this->aleper;
}
public function getfotoper()
{
return $this->fotoper;
}
public function getdircper()
{
return $this->dircper;
}
public function getubidirc()
{
return $this->ubidirc;
}
public function gettelcper()
{
return $this->telcper;
}
public function getcelcper()
{
return $this->celcper;
}
public function getdirtper()
{
return $this->dirtper;
}
public function getubidirt()
{
return $this->ubidirt;
}
public function getceltper()
{
return $this->celtper;
}
public function getemaper()
{
return $this->emaper;
}
public function getpasper()
{
return $this->pasper;
}
public function getactper()
{
return $this->actper;
}
public function getfsolper()
{
return $this->fsolper;
}
public function getclvper()
{
return $this->clvper;
}
public function getecmper()
{
return $this->ecmper;
}
public function getsegper()
{
return $this->segper;
}
public function getidpro()
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
public function getAll(){
    try{
$sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval";
$modelo = new Conexion();
$conexion = $modelo->get_conexion();
$result = $conexion->prepare($sql);
$result->execute();
return $result->fetchAll(PDO::FETCH_ASSOC);

}catch(Exception $e){
        $misfun = new misfun();
        $misfun->ManejoError($e);   
    }
}






public function getOne($id){
    try{
$sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval WHERE p.idper = :idper";
$modelo = new Conexion();
$conexion = $modelo->get_conexion();
$result = $conexion->prepare($sql);
$result->bindParam(':idper', $id);
$result->execute();
return $result->fetchAll(PDO::FETCH_ASSOC);

}catch(Exception $e){
        $misfun = new misfun();
        $misfun->ManejoError($e);   
    }
}


public function save(){
    try{
$sql = "INSERT INTO persona (tipdper, nuiper, nomper, papeper, sapeper, fnacper,
ubinac, rhper, aleper, fotoper, dircper, ubidirc, telcper, celcper, dirtper,
ubidirt, celtper, emaper, pasper, actper, fsolper, clvper, ecmper, segper,
idpro) VALUES (:tipdper, :nuiper, :nomper, :papeper, :sapeper, :fnacper,
:ubinac, :rhper, :aleper, :fotoper, :dircper, :ubidirc, :telcper, :celcper,
:dirtper, :ubidirt, :celtper, :emaper, :pasper, :actper, :fsolper, :clvper,
:ecmper, :segper, :idpro)";
$modelo = new Conexion();
$conexion = $modelo->get_conexion();
$result = $conexion->prepare($sql);
$tipdper = $this->getTipdper();
$result->bindParam(":tipdper", $tipdper);
$nuiper = $this->getNuiper();
$result->bindParam(":nuiper", $nuiper);
$nomper = $this->getNomper();
$result->bindParam(":nomper", $nomper);
$papeper = $this->getPapeper();
$result->bindParam(":papeper", $papeper);
$sapeper = $this->getSapeper();
$result->bindParam(":sapeper", $sapeper);
$fnacper = $this->getFnacper();
$result->bindParam(":fnacper", $fnacper);
$ubinac = $this->getUbinac();
$result->bindParam(":ubinac", $ubinac);
$rhper = $this->getRhper();
$result->bindParam(":rhper", $rhper);
$aleper = $this->getAleper();
$result->bindParam(":aleper", $aleper);
$fotoper = $this->getFotoper();
$result->bindParam(":fotoper", $fotoper);
$dircper = $this->getDircper();
$result->bindParam(":dircper", $dircper);
$ubidirc = $this->getUbidirc();
$result->bindParam(":ubidirc", $ubidirc);
$telcper = $this->getTelcper();
$result->bindParam(":telcper", $telcper);
$celcper = $this->getCelcper();
$result->bindParam(":celcper", $celcper);
$dirtper = $this->getDirtper();
$result->bindParam(":dirtper", $dirtper);
$ubidirt = $this->getUbidirt();
$result->bindParam(":ubidirt", $ubidirt);
$celtper = $this->getCeltper();
$result->bindParam(":celtper", $celtper);
$emaper = $this->getEmaper();
$result->bindParam(":emaper", $emaper);
$pasper = $this->getPasper();
$result->bindParam(":pasper", $pasper);
$actper = $this->getActper();
$result->bindParam(":actper", $actper);
$fsolper = $this->getFsolper();
$result->bindParam(":fsolper", $fsolper);
$clvper = $this->getClvper();
$result->bindParam(":clvper", $clvper);
$ecmper = $this->getEcmper();
$result->bindParam(":ecmper", $ecmper);
$segper = $this->getSegper();
$result->bindParam(":segper", $segper);
$idpro = $this->getIdpro();
$result->bindParam(":idpro", $idpro);
$result->execute();

}catch(Exception $e){
        $misfun = new misfun();
        $misfun->ManejoError($e);   
    }
}


public function upd(){
    try{
$sql = "UPDATE persona SET tipdper=:tipdper, nuiper=:nuiper, nomper=:nomper, papeper=:papeper, sapeper=:sapeper, fnacper=:fnacper, ubinac=:ubinac, rhper=:rhper, aleper=:aleper, fotoper=:fotoper, dircper=:dircper, ubidirc=:ubidirc, telcper=:telcper, celcper=:celcper, dirtper=:dirtper, ubidirt=:ubidirt, celtper=:celtper, emaper=:emaper, pasper=:pasper, actper=:actper, fsolper=:fsolper, clvper=:clvper, ecmper=:ecmper, segper=:segper, idpro=:idpro WHERE idper=:idper";
$modelo = new Conexion();
$conexion = $modelo->get_conexion();
$result = $conexion->prepare($sql);
$idper = $this->getIdper();
$result->bindParam(":idper", $idper);
$tipdper = $this->getTipdper();
$result->bindParam(":tipdper", $tipdper);
$nuiper = $this->getNuiper();
$result->bindParam(":nuiper", $nuiper);
$nomper = $this->getNomper();
$result->bindParam(":nomper", $nomper);
$papeper = $this->getPapeper();
$result->bindParam(":papeper", $papeper);
$sapeper = $this->getSapeper();
$result->bindParam(":sapeper", $sapeper);
$fnacper = $this->getFnacper();
$result->bindParam(":fnacper", $fnacper);
$ubinac = $this->getUbinac();
$result->bindParam(":ubinac", $ubinac);
$rhper = $this->getRhper();
$result->bindParam(":rhper", $rhper);
$aleper = $this->getAleper();
$result->bindParam(":aleper", $aleper);
$fotoper = $this->getFotoper();
$result->bindParam(":fotoper", $fotoper);
$dircper = $this->getDircper();
$result->bindParam(":dircper", $dircper);
$ubidirc = $this->getUbidirc();
$result->bindParam(":ubidirc", $ubidirc);
$telcper = $this->getTelcper();
$result->bindParam(":telcper", $telcper);
$celcper = $this->getCelcper();
$result->bindParam(":celcper", $celcper);
$dirtper = $this->getDirtper();
$result->bindParam(":dirtper", $dirtper);
$ubidirt = $this->getUbidirt();
$result->bindParam(":ubidirt", $ubidirt);
$celtper = $this->getCeltper();
$result->bindParam(":celtper", $celtper);
$emaper = $this->getEmaper();
$result->bindParam(":emaper", $emaper);
$pasper = $this->getPasper();
$result->bindParam(":pasper", $pasper);
$actper = $this->getActper();
$result->bindParam(":actper", $actper);
$fsolper = $this->getFsolper();
$result->bindParam(":fsolper", $fsolper);
$clvper = $this->getClvper();
$result->bindParam(":clvper", $clvper);
$ecmper = $this->getEcmper();
$result->bindParam(":ecmper", $ecmper);
$segper = $this->getSegper();
$result->bindParam(":segper", $segper);
$idpro = $this->getIdpro();
$result->bindParam(":idpro", $idpro);
$result->execute();

}catch(Exception $e){
        $misfun = new misfun();
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
$result->bindParam(":idper",$idper);
$result->execute();

}catch(Exception $e){
        $misfun = new misfun();
        $misfun->ManejoError($e);   
    }
}
}?>
