<?php
class mRcn
{
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

    public function getidper()   { return $this->idper; }
    public function gettipdper() { return $this->tipdper; }
    public function getnuiper()  { return $this->nuiper; }
    public function getnomper()  { return $this->nomper; }
    public function getpapeper() { return $this->papeper; }
    public function getsapeper() { return $this->sapeper; }
    public function getfnacper() { return $this->fnacper; }
    public function getubinac()  { return $this->ubinac; }
    public function getrhper()   { return $this->rhper; }
    public function getaleper()  { return $this->aleper; }
    public function getfotoper() { return $this->fotoper; }
    public function getdircper() { return $this->dircper; }
    public function getubidirc() { return $this->ubidirc; }
    public function gettelcper() { return $this->telcper; }
    public function getcelcper() { return $this->celcper; }
    public function getdirtper() { return $this->dirtper; }
    public function getubidirt() { return $this->ubidirt; }
    public function getceltper() { return $this->celtper; }
    public function getemaper()  { return $this->emaper; }
    public function getpasper()  { return $this->pasper; }
    public function getactper()  { return $this->actper; }
    public function getfsolper() { return $this->fsolper; }
    public function getclvper()  { return $this->clvper; }
    public function getecmper()  { return $this->ecmper; }
    public function getsegper()  { return $this->segper; }
    public function getidpro()   { return $this->idpro; }

    public function setidper($idper)     { $this->idper = $idper; }
    public function settipdper($tipdper) { $this->tipdper = $tipdper; }
    public function setnuiper($nuiper)   { $this->nuiper = $nuiper; }
    public function setnomper($nomper)   { $this->nomper = $nomper; }
    public function setpapeper($papeper) { $this->papeper = $papeper; }
    public function setsapeper($sapeper) { $this->sapeper = $sapeper; }
    public function setfnacper($fnacper) { $this->fnacper = $fnacper; }
    public function setubinac($ubinac)   { $this->ubinac = $ubinac; }
    public function setrhper($rhper)     { $this->rhper = $rhper; }
    public function setaleper($aleper)   { $this->aleper = $aleper; }
    public function setfotoper($fotoper) { $this->fotoper = $fotoper; }
    public function setdircper($dircper) { $this->dircper = $dircper; }
    public function setubidirc($ubidirc) { $this->ubidirc = $ubidirc; }
    public function settelcper($telcper) { $this->telcper = $telcper; }
    public function setcelcper($celcper) { $this->celcper = $celcper; }
    public function setdirtper($dirtper) { $this->dirtper = $dirtper; }
    public function setubidirt($ubidirt) { $this->ubidirt = $ubidirt; }
    public function setceltper($celtper) { $this->celtper = $celtper; }
    public function setemaper($emaper)   { $this->emaper = $emaper; }
    public function setpasper($pasper)   { $this->pasper = $pasper; }
    public function setactper($actper)   { $this->actper = $actper; }
    public function setfsolper($fsolper) { $this->fsolper = $fsolper; }
    public function setclvper($clvper)   { $this->clvper = $clvper; }
    public function setecmper($ecmper)   { $this->ecmper = $ecmper; }
    public function setsegper($segper)   { $this->segper = $segper; }
    public function setidpro($idpro)     { $this->idpro = $idpro; }

    // Trae todos los usuarios (nombre, correo y contraseña)
    public function getAll()
    {
        $sql = "SELECT idper, nomper, emaper, pasper FROM persona";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id)
    {
        $sql = "SELECT idper, nomper, emaper, pasper FROM persona WHERE idper = :id";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getByEmail($email)
    {
        $sql = "SELECT idper, emaper FROM persona WHERE emaper = :email";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(':email', $email);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function updPassword()
    {
        $sql = "UPDATE persona SET pasper = :pasper WHERE emaper = :emaper";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $pasper = $this->getpasper();
        $result->bindParam(':pasper', $pasper);
        $emaper = $this->getemaper();
        $result->bindParam(':emaper', $emaper);
        return $result->execute();
    }

    public function save()
    {
        $sql = "INSERT INTO persona (tipdper, nuiper, nomper, papeper, sapeper, fnacper, ubinac, rhper, aleper, fotoper, dircper, ubidirc, telcper, celcper, dirtper, ubidirt, celtper, emaper, pasper, actper, fsolper, clvper, ecmper, segper, idpro) 
                VALUES (:tipdper, :nuiper, :nomper, :papeper, :sapeper, :fnacper, :ubinac, :rhper, :aleper, :fotoper, :dircper, :ubidirc, :telcper, :celcper, :dirtper, :ubidirt, :celtper, :emaper, :pasper, :actper, :fsolper, :clvper, :ecmper, :segper, :idpro)";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(':tipdper', $this->gettipdper());
        $result->bindParam(':nuiper',  $this->getnuiper());
        $result->bindParam(':nomper',  $this->getnomper());
        $result->bindParam(':papeper', $this->getpapeper());
        $result->bindParam(':sapeper', $this->getsapeper());
        $result->bindParam(':fnacper', $this->getfnacper());
        $result->bindParam(':ubinac',  $this->getubinac());
        $result->bindParam(':rhper',   $this->getrhper());
        $result->bindParam(':aleper',  $this->getaleper());
        $result->bindParam(':fotoper', $this->getfotoper());
        $result->bindParam(':dircper', $this->getdircper());
        $result->bindParam(':ubidirc', $this->getubidirc());
        $result->bindParam(':telcper', $this->gettelcper());
        $result->bindParam(':celcper', $this->getcelcper());
        $result->bindParam(':dirtper', $this->getdirtper());
        $result->bindParam(':ubidirt', $this->getubidirt());
        $result->bindParam(':celtper', $this->getceltper());
        $result->bindParam(':emaper',  $this->getemaper());
        $result->bindParam(':pasper',  $this->getpasper());
        $result->bindParam(':actper',  $this->getactper());
        $result->bindParam(':fsolper', $this->getfsolper());
        $result->bindParam(':clvper',  $this->getclvper());
        $result->bindParam(':ecmper',  $this->getecmper());
        $result->bindParam(':segper',  $this->getsegper());
        $result->bindParam(':idpro',   $this->getidpro());
        return $result->execute();
    }

    public function upd()
    {
        $sql = "UPDATE persona SET tipdper=:tipdper, nuiper=:nuiper, nomper=:nomper, papeper=:papeper, sapeper=:sapeper, fnacper=:fnacper, ubinac=:ubinac, rhper=:rhper, aleper=:aleper, fotoper=:fotoper, dircper=:dircper, ubidirc=:ubidirc, telcper=:telcper, celcper=:celcper, dirtper=:dirtper, ubidirt=:ubidirt, celtper=:celtper, emaper=:emaper, pasper=:pasper, actper=:actper, fsolper=:fsolper, clvper=:clvper, ecmper=:ecmper, segper=:segper WHERE idper=:id";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(':id',      $this->getidper());
        $result->bindParam(':tipdper', $this->gettipdper());
        $result->bindParam(':nuiper',  $this->getnuiper());
        $result->bindParam(':nomper',  $this->getnomper());
        $result->bindParam(':papeper', $this->getpapeper());
        $result->bindParam(':sapeper', $this->getsapeper());
        $result->bindParam(':fnacper', $this->getfnacper());
        $result->bindParam(':ubinac',  $this->getubinac());
        $result->bindParam(':rhper',   $this->getrhper());
        $result->bindParam(':aleper',  $this->getaleper());
        $result->bindParam(':fotoper', $this->getfotoper());
        $result->bindParam(':dircper', $this->getdircper());
        $result->bindParam(':ubidirc', $this->getubidirc());
        $result->bindParam(':telcper', $this->gettelcper());
        $result->bindParam(':celcper', $this->getcelcper());
        $result->bindParam(':dirtper', $this->getdirtper());
        $result->bindParam(':ubidirt', $this->getubidirt());
        $result->bindParam(':celtper', $this->getceltper());
        $result->bindParam(':emaper',  $this->getemaper());
        $result->bindParam(':pasper',  $this->getpasper());
        $result->bindParam(':actper',  $this->getactper());
        $result->bindParam(':fsolper', $this->getfsolper());
        $result->bindParam(':clvper',  $this->getclvper());
        $result->bindParam(':ecmper',  $this->getecmper());
        $result->bindParam(':segper',  $this->getsegper());
        return $result->execute();
    }

    public function del()
    {
        $sql = "DELETE FROM persona WHERE idper = :id";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(':id', $this->getidper());
        return $result->execute();
    }
}
?>