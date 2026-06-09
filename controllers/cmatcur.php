<?php
require_once("models/mmatcur.php");

$idcur = isset($_REQUEST["idcur"]) ? $_REQUEST["idcur"] : NULL;
$nomcur = isset($_POST["nomcur"]) ? $_POST["nomcur"] : NULL;
$depcur = isset($_POST["depcur"]) ? $_POST["depcur"] : NULL;
$idper = isset($_POST["idper"]) ? $_POST["idper"] : NULL;
$ope = isset($_REQUEST["ope"]) ? $_REQUEST["ope"] : NULL;
$datOne = NULL;

$MMatCur = new MMatCur();

if($ope=="save"){
    $MMatCur->setIdcur($idcur);
    $MMatCur->setNomcur($nomcur);
    $MMatCur->setDepcur($depcur);
    $MMatCur->setIdper($idper);
    if($idcur) $MMatCur->Upd();    
    else $MMatCur->Save();
}

if($ope=="eli" AND $idcur){
    $MMatCur->setIdcur($idcur);
    $MMatCur->Del();
}

if($ope=="edi" AND $idcur){
   $MMatCur->setIdcur($idcur);
   $datOne = $MMatCur->getOne();
}

$datAll = $MMatCur->getAll();
?>