<?php
require_once("models/mmatest.php");
require_once("models/mcofval.php");
require_once("models/mcofubi.php");

$idper = isset($_REQUEST["idper"]) ? $_REQUEST["idper"] : NULL;
$tipdper = isset($_POST["tipdper"]) ? $_POST["tipdper"] : NULL;
$nuiper = isset($_POST["nuiper"]) ? $_POST["nuiper"] : NULL;
$nomper = isset($_POST["nomper"]) ? $_POST["nomper"] : NULL;
$papeper = isset($_POST["papeper"]) ? $_POST["papeper"] : NULL;
$sapeper = isset($_POST["sapeper"]) ? $_POST["sapeper"] : NULL;
$fnacper = isset($_POST["fnacper"]) ? $_POST["fnacper"] : NULL;
$ubinac = isset($_POST["ubinac"]) ? $_POST["ubinac"] : NULL;
$rhper = isset($_POST["rhper"]) ? $_POST["rhper"] : NULL;
$aleper = isset($_POST["aleper"]) ? $_POST["aleper"] : NULL;
$fotoper = isset($_POST["fotoper"]) ? $_POST["fotoper"] : NULL;
$dircper = isset($_POST["dircper"]) ? $_POST["dircper"] : NULL;
$ubidirc = isset($_POST["ubidirc"]) ? $_POST["ubidirc"] : NULL;
$telcper = isset($_POST["telcper"]) ? $_POST["telcper"] : NULL;
$celcper = isset($_POST["celcper"]) ? $_POST["celcper"] : NULL;
$dirtper = isset($_POST["dirtper"]) ? $_POST["dirtper"] : NULL;
$ubidirt = isset($_POST["ubidirt"]) ? $_POST["ubidirt"] : NULL;
$celtper = isset($_POST["celtper"]) ? $_POST["celtper"] : NULL;
$emaper = isset($_POST["emaper"]) ? $_POST["emaper"] : NULL;
$pasper = isset($_POST["pasper"]) ? $_POST["pasper"] : NULL;
$actper = isset($_POST["actper"]) ? $_POST["actper"] : NULL;
$segper = isset($_POST["segper"]) ? $_POST["segper"] : NULL;
$idpro = isset($_POST["idpro"]) ? $_POST["idpro"] : NULL;
$ope = isset($_REQUEST["ope"]) ? $_REQUEST["ope"] : NULL;
$dtOn = NULL;

$mmatest  = new mMatest();
$mcofval = new mCofval();
$mcofubi = new mCofubi();

$mcofval->setIddom(2);
$datRH = $mcofval->getAllVD();
$mcofval->setIddom(1);
$datEst = $mcofval->getAllVD();
$mcofval->setIddom(3);
$datTdc = $mcofval->getAllVD();
$datUbi = $mcofubi->getAll();
$datAll = $mmatest->getAll();

$mmatest->setIdper($idper);
if ($ope == "save") {
    $mmatest->setNuiper($nuiper);
    $mmatest->setNomper($nomper);
    $mmatest->setPapeper($papeper);
    $mmatest->setSapeper($sapeper);
    $mmatest->setFnacper($fnacper);
    $mmatest->setUbinac($ubinac);
    $mmatest->setRhper($rhper);
    $mmatest->setAleper($aleper);
    $mmatest->setFotoper($fotoper);
    $mmatest->setDircper($dircper);
    $mmatest->setUbidirc($ubidirc);
    $mmatest->setTelcper($telcper);
    $mmatest->setCelcper($celcper);
    $mmatest->setDirtper($dirtper);
    $mmatest->setUbidirt($ubidirt);
    $mmatest->setCeltper($celtper);
    $mmatest->setEmaper($emaper);
    $mmatest->setPasper($pasper);
    $mmatest->setActper($actper);
    $mmatest->setSegper($segper);
    $mmatest->setIdpro($idpro);
    $mmatest->setTipdper($tipdper);
    if ($idper) $mmatest->Upd();
    else $mmatest->save();
}

if ($ope == "eli" and $idper) $mmatest->del();

if ($ope == "edi" and $idper) $dtOn = $mmatest->getOne();
