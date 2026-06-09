<?php
    require_once("models/mcofval.php");
    require_once('models/mcofdom.php');

    $idval = isset($_REQUEST ["idval"]) ? $_REQUEST ["idval"]:NULL;
    $iddom = isset($_POST ["iddom"]) ? $_POST ["iddom"]:NULL;
    $nomval = isset($_POST ["nomval"]) ? $_POST ["nomval"]:NULL;
    $parval = isset($_POST ["parval"]) ? $_POST ["parval"]:NULL;
    $actval = isset($_POST ["actval"]) ? $_POST ["actval"]:NULL;
    $ope = isset($_REQUEST["ope"]) ? $_REQUEST ["ope"]:NULL;
    $datOn = NULL;

    $mcofval = new mCofval();
    $mcofdom = new mCofdom();

    $mcofval->setIdval($idval);

    $datDom = $mcofdom -> getAll();

if($ope=="save"){
$mcofval->setIddom("$iddom");
$mcofval->setNomval("$nomval");
$mcofval->setParval("$parval");
$mcofval->setActval("$actval");
if($idval) $mcofval -> upd();
else $mcofval->save();
}

if($ope=="eli" AND $idval) $mcofval ->del();
if($ope=="edi" AND $idval) $datOn = $mcofval ->getOne();

    $datAll = $mcofval->getAll();
?>