<?php
require_once("models/musuper.php");
require_once("models/mcofval.php");
require_once("models/mcofubi.php");

$idper = isset($_REQUEST["idper"]) ? $_REQUEST["idper"]:1;
$tipdper = isset($_POST["tipdper"]) ? $_POST["tipdper"]:NULL;
$nuiper = isset($_POST["nuiper"]) ? $_POST["nuiper"]:NULL;
$nomper = isset($_POST["nomper"]) ? $_POST["nomper"]:NULL;
$papeper = isset($_POST["papeper"]) ? $_POST["papeper"]:NULL;
$sapeper = isset($_POST["sapeper"]) ? $_POST["sapeper"]:NULL;
$fnacper = isset($_POST["fnacper"]) ? $_POST["fnacper"]:NULL;
$ubinac = isset($_POST["ubinac"]) ? $_POST["ubinac"]:NULL;
$rhper = isset($_POST["rhper"]) ? $_POST["rhper"]:NULL;
$aleper = isset($_POST["aleper"]) ? $_POST["aleper"]:NULL;
$fotoper = isset($_POST["fotoper"]) ? $_POST["fotoper"]:NULL;
$dircper = isset($_POST["dircper"]) ? $_POST["dircper"]:NULL;
$ubidirc = isset($_POST["ubidirc"]) ? $_POST["ubidirc"]:NULL;
$telcper = isset($_POST["telcper"]) ? $_POST["telcper"]:NULL;
$celcper = isset($_POST["celcper"]) ? $_POST["celcper"]:NULL;
$dirtper = isset($_POST["dirtper"]) ? $_POST["dirtper"]:NULL;
$ubidirt = isset($_POST["ubidirt"]) ? $_POST["ubidirt"]:NULL;
$celtper = isset($_POST["celtper"]) ? $_POST["celtper"]:NULL;
$emaper = isset($_POST["emaper"]) ? $_POST["emaper"]:NULL;
$pasper = isset($_POST["pasper"]) ? $_POST["pasper"]:NULL;
$actper = isset($_POST["actper"]) ? $_POST["actper"]:NULL;
$segper = isset($_POST["segper"]) ? $_POST["segper"]:NULL;
$idpro = isset($_POST["idpro"]) ? $_POST["idpro"]:NULL;
$idpef = isset($_POST["idpef"]) ? $_POST["idpef"]:1;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:0;
$dtOn = NULL;

$musuper = new mUsuper();
$mcofval = new mCofval();
$mcofubi = new mCofubi();

$musuper->setIdper($idper);

if($ope=="save"){
	$musuper->setTipdper($tipdper);
	$musuper->setNuiper($nuiper);
	$musuper->setNomper($nomper);
	$musuper->setPapeper($papeper);
	$musuper->setSapeper($sapeper);
	$musuper->setFnacper($fnacper);
	$musuper->setUbinac($ubinac);
	$musuper->setRhper($rhper);
	$musuper->setAleper($aleper);
	$musuper->setFotoper($fotoper);
	$musuper->setDircper($dircper);
	$musuper->setUbidirc($ubidirc);
	$musuper->setTelcper($telcper);
	$musuper->setCelcper($celcper);
	$musuper->setDirtper($dirtper);
	$musuper->setUbidirt($ubidirt);
	$musuper->setCeltper($celtper);
	$musuper->setEmaper($emaper);
	$musuper->setPasper($pasper);
	$musuper->setActper($actper);
	$musuper->setSegper($segper);
	$musuper->setIdpro($idpro);
	if($idper) $musuper->upd();
	else $musuper->save();
}

if($ope=="eli" AND $idper) $musuper->del();
if($ope=="edi" OR $idper) $dtOn = $musuper->getOne();

$mcofval->setIddom(1);
$datRH = $mcofval->getAllVD();
$mcofval->setIddom(7);
$datEst = $mcofval->getAllVD();
$mcofval->setIddom(3);
$datTdc = $mcofval->getAllVD();
$mcofval->setIddom(8);
$datGen = $mcofval->getAllVD();
$mcofval->setIddom(5);
$datPar = $mcofval->getAllVD();
$mcofval->setIddom(2);
$datEps = $mcofval->getAllVD();
$mcofval->setIddom(4);
$datEsc = $mcofval->getAllVD();
$datUbi = $mcofubi->getAll();

$datAll = $musuper->getAll($idpef);
?>