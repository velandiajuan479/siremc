<?php
require_once("models/mcofmod.php");
require_once("models/mcofval.php");
require_once("models/musupef.php");
require_once("controllers/misfun.php");

$idmod = isset($_REQUEST["idmod"]) ? $_REQUEST["idmod"] : NULL;
$nommod = isset($_POST["nommod"]) ? $_POST["nommod"] : NULL;
$icomod = isset($_POST["icomod"]) ? $_POST["icomod"] : NULL;
$actmod = isset($_POST["actmod"]) ? $_POST["actmod"] : NULL;
$ordmod = isset($_POST["ordmod"]) ? $_POST["ordmod"] : NULL;
$idpef = isset($_POST["idpef"]) && $_POST["idpef"] != "0" ? $_POST["idpef"] : NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST["ope"] : NULL;

$datOne = NULL;
$mcofmod = new mCofMod();
$mcofval = new mCofval();
$musupef = new mPerfil();

$mcofmod->setIdmod($idmod);

if($ope == "save") {
    $mcofmod->setNommod($nommod);
    $mcofmod->setIcomod($icomod);
    $mcofmod->setActmod($actmod);
    $mcofmod->setOrdmod($ordmod);
    $mcofmod->setIdpef($idpef);
    $mcofmod->setIdmod($idmod);
    
    if($idmod) {
        $mcofmod->upd();
    } else {
        $mcofmod->save();
    }
    
    echo '<script>window.location.href = "index.php?pg=29";</script>';
    exit();
}

if($ope == "eli" AND $idmod) {
    $mcofmod->setIdmod($idmod);
    $mcofmod->del();
    
    echo '<script>window.location.href = "index.php?pg=29";</script>';
    exit();
}


if($ope == "edi" AND $idmod) {
    $mcofmod->setIdmod($idmod);
    $datOne = $mcofmod->getOne();
}

$datus = $musupef->getAll();
$datAll = $mcofmod->getAll();

$mcofval->setIddom(9);
$datIcons = $mcofval->getAllVD();

$mcofval->setIddom(7);
$datAct = $mcofval->getAllVD();
?>