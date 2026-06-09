<?php

require_once("models/mmatexa.php");

$idest  = isset($_REQUEST["idest"]) ? $_REQUEST["idest"] : NULL;
$idacu  = isset($_POST["idacu"]) ? $_POST["idacu"] : NULL;
$parexa = isset($_POST["parexa"]) ? $_POST["parexa"] : NULL;

$ope = isset($_REQUEST["ope"]) ? $_REQUEST["ope"] : NULL;

$dtOne = NULL;

$mmatexa = new mmatexa();

$mmatexa->setIdest($idest);

if($ope=="save"){

    $mmatexa->setIdest($idest);
    $mmatexa->setIdacu($idacu);
    $mmatexa->setParexa($parexa);

    $mmatexa->Save();
}

if($ope=="upd"){

    $mmatexa->setIdest($idest);
    $mmatexa->setIdacu($idacu);
    $mmatexa->setParexa($parexa);

    $mmatexa->Upd();
}

if($ope=="eli" && $idest){
    $mmatexa->Del();
}

if($ope=="edi" && $idest){
    $dtOne = $mmatexa->getOne();
}

$datAll = $mmatexa->getAll();

?>