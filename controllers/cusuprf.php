<?php
require_once("models/musuprf.php");

$idpro = isset($_REQUEST["idpro"]) ? $_REQUEST["idpro"] : NULL;
$nompro = isset($_POST["nompro"]) ? $_POST["nompro"] : NULL;
$ope = isset($_REQUEST["ope"]) ? $_REQUEST["ope"] : NULL;
$dtOn = NULL;

$musuprf = new musuprf();

$musuprf->setidpro($idpro);

if($ope=="save"){
    $musuprf->setnompro($nompro);
    if($idpro) $musuprf->upd();
    else $musuprf->save();
}

if($ope=="eli" AND $idpro) $musuprf->del();
if($ope=="edi" AND $idpro) $dtOn = $musuprf->getOne();

$datALL = $musuprf->getAll();
?>