<?php
require_once("models/mcueivl.php");

$noitval   = isset($_REQUEST["noitval"])   ? $_REQUEST["noitval"]   : NULL;
$noitem    = isset($_REQUEST["noitem"])    ? $_REQUEST["noitem"]    : NULL;
$novig     = isset($_REQUEST["novig"])     ? $_REQUEST["novig"]     : NULL;
$valor     = isset($_REQUEST["valor"])     ? $_REQUEST["valor"]     : NULL;
$act_valor = isset($_REQUEST["act_valor"]) ? $_REQUEST["act_valor"] : NULL;
$ope       = isset($_REQUEST["ope"])       ? $_REQUEST["ope"]       : 0;
$dtOn      = NULL;

$mcueivl = new mCueivl();

if ($ope == 1 && $noitem != NULL && $valor != NULL) {
    $mcueivl->setnoitem($noitem);
    $mcueivl->setnovig($novig);
    $mcueivl->setvalor($valor);
    $mcueivl->setact_valor($act_valor);
    $mcueivl->save();
    echo '<script>window.location.href = "index.php?pg=11";</script>';
    exit();
}

if ($ope == 3 && $noitval != NULL) {
    $mcueivl->setnoitval($noitval);
    $mcueivl->setnoitem($noitem);
    $mcueivl->setnovig($novig);
    $mcueivl->setvalor($valor);
    $mcueivl->setact_valor($act_valor);
    $mcueivl->upd();
    echo '<script>window.location.href = "index.php?pg=11";</script>';
    exit();
}

if ($ope == 4 && $noitval != NULL) {
    $mcueivl->setnoitval($noitval);
    $mcueivl->del();
    echo '<script>window.location.href = "index.php?pg=11";</script>';
    exit();
}

if ($ope == 2 && $noitval != NULL) {
    $mcueivl->setnoitval($noitval);
    $dtOn = $mcueivl->getOne();
}

$datAll = $mcueivl->getAll();
$itemsDisponibles = $mcueivl->getItems();
?>