<?php
class musuacu{
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
//Metodos GET
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
//Setter
	function setIdper($idper){
		return $this->idper = $idper ;
	}
	function setTipdper($tipdper){
		return $this->tipdper = $tipdper;
	}
	function setNuiper($nuiper){
		return $this->nuiper = $nuiper ;
	}
	function setNomper($nomper){
		return $this->nomper = $nomper ;
	}
	function setPapeper($papeper){
		return $this->papeper = $papeper ;
	}
	function setSapeper($sapeper){
		return $this->sapeper = $sapeper ;
	}
	function setFnacper($fnacper){
		return $this->fnacper = $fnacper ;
	}
	function setUbinac($ubinac){
		return $this->ubinac = $ubinac ;
	}
	function setRhper($rhper){
		return $this->rhper = $rhper ;
	}
	function setAleper($aleper){
		return $this->aleper = $aleper ;
	}
	function setFotoper($fotoper){
		return $this->fotoper = $fotoper ;
	}
	function setDircper($dircper){
		return $this->dircper = $dircper ;
	}
	function setUbidirc($ubidirc){
		return $this->ubidirc = $ubidirc ;
	}
	function setTelcper($telcper){
		return $this->telcper = $telcper ;
	}
	function setCelcper($celcper){
		return $this->celcper = $celcper ;
	}
	function setDirtper($dirtper){
		return $this->dirtper = $dirtper ;
	}
	function setUbidirt($ubidirt){
		return $this->ubidirt = $ubidirt ;
	}
	function setCeltper($celtper){
		return $this->celtper = $celtper ;
	}
	function setEmaper($emaper){
		return $this->emaper = $emaper ;
	}
	function setPasper($pasper){
		return $this->pasper = $pasper ;
	}
	function setActper($actper){
		return $this->actper = $actper ;
	}
	function setFsolper($fsolper){
		return $this->fsolper = $fsolper ;
	}
	function setClvper($clvper){
		return $this->clvper = $clvper ;
	}
	function setEcmper($ecmper){
		return $this->ecmper = $ecmper ;
	}
	function setSegper($segper){
		return $this->segper = $segper ;
	}
	function setIdpro($idpro){
		return $this->idpro = $idpro ;
	}
	//Modulos
	public function getAll(){
		try{
		$sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		return $result->fetchALL(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			$misfun = new misFun();
			$misfun->ManejoError($e);
		}
	}
	public function getOne(){
		try{
		$sql = "SELECT p.idper, p.tipdper, t.nomval AS tipo, p.nuiper, p.nomper, p.papeper, p.sapeper, p.fnacper, p.ubinac, p.rhper, r.nomval AS rh, p.aleper, p.fotoper, p.dircper, p.ubidirc, p.telcper, p.celcper, p.dirtper, p.ubidirt, p.celtper, p.emaper, p.pasper, p.actper, p.fsolper, p.clvper, p.ecmper, p.segper, idpro FROM persona AS p INNER JOIN valor AS t ON p.tipdper=t.idval INNER JOIN valor AS r ON p.rhper=r.idval WHERE p.idper";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		return $result->fetchALL(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			$misfun = new misFun();
			$misfun->ManejoError($e);
		}
	}
	public function save(){
		$sql = "INSERT INTO persona (tipdper, nomval, nuiper, nomper, papeper, sapeper, fnacper, ubinac, rhper, nomval, aleper, fotoper, dircper, ubidirc, telcper, celcper, dirtper, ubidirt, celtper, emaper, pasper, actper, fsolper, clvper, ecmper, segper, idpro) VALUES (:tipdper, :nomval, :nuiper, :nomper, :papeper, :sapeper, :fnacper, :ubinac, :rhper, :nomval, :aleper, :fotoper, :dircper, :ubidirc, :telcper, :celcper, :dirtper, :ubidirt, :celtper, :emaper, :pasper, :actper, :fsolper, :clvper, :ecmper, :segper, :idpro) ";
	}
	public function Upd()
{
    try
    {
        $sql = "UPDATE persona SET
                idper=:idper,
                tipdper=:tipdper,
                nuiper=:nuiper,
                nomper=:nomper,
                papeper=:papeper,
                sapeper=:sapeper,
                fnacper=:fnacper,
                ubinac=:ubinac,
                rhper=:rhper,
                aleper=:aleper,
                fotoper=:fotoper,
                dircper=:dircper,
                ubidirc=:ubidirc,
                telcper=:telcper,
                celcper=:celcper,
                dirtper=:dirtper,
                ubidirt=:ubidirt,
                celtper=:celtper,
                emaper=:emaper,
                pasper=:pasper,
                actper=:actper,
                fsolper=:fsolper,
                clvper=:clvper,
                ecmper=:ecmper,
                segper=:segper
                WHERE idpro=:idpro";

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
    }
    catch (Exception $e)
    {
        $misfun = new misFun();
        $misfun->ManejoError($e);
    }
}
	public function del(){
		try{
		$sql = "DELETE FROM persona WHERE idper=:idper"; 
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idper = $this;
		}catch(Exception $e){
			$misfun = new misFun();
			$misfun->ManejoError($e);
		}
	}
}
?>