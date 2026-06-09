<?php
require_once("models/mcofpag.php");


$idpag = isset($_REQUEST["idpag"]) ?$_REQUEST["idpag"]:NULL;
$nompag = isset($_POST["nompag"]) ?$_POST["nompag"]:NULL;
$arcpag = isset($_POST["arcpag"]) ?$_POST["arcpag"]:NULL;
$mospag = isset($_POST["mospag"]) ?$_POST["mospag"]:NULL;
$ordpag = isset($_POST["ordpag"]) ?$_POST["ordpag"]:NULL;
$icopag = isset($_POST["icopag"]) ?$_POST["icopag"]:NULL;
$despag = isset($_POST["despag"]) ?$_POST["despag"]:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
$dtOn = NULL;


$mcofpag = new mPagina();

$mcofpag->setIdpag($idpag);

if($ope=="save"){
    $mcofpag->setNompag($nompag);
    $mcofpag->setArcpag($arcpag);
    $mcofpag->setMospag($mospag);
    $mcofpag->setOrdpag($ordpag);
    $mcofpag->setIcopag($icopag);
    $mcofpag->setDespag($despag);
    if($idpag)$mcofpag->upd();
    else $mcofpag->save();
}
if($ope=="eli" AND $idpag) $mcofpag->del();

if($ope=="edi" AND $idpag)$dtOn = $mcofpag->getOne();


$datAll = $mcofpag->getAll();


?>
