<?php
require_once("models/mcueite.php");

$noitem  = isset($_REQUEST["noitem"])  ? $_REQUEST["noitem"]  : NULL;
$nomitem = isset($_REQUEST["nomitem"]) ? $_REQUEST["nomitem"] : NULL;
$numite  = isset($_REQUEST["numite"])  ? $_REQUEST["numite"]  : NULL;
$ope     = isset($_REQUEST["ope"])     ? $_REQUEST["ope"]     : 0;
$dtOn    = NULL;

$mcueite = new mCueite();

if ($ope == 1 && $nomitem != NULL && $numite != NULL) {
    $mcueite->setnomitem($nomitem);
    $mcueite->setnumite($numite);
    $mcueite->save();
    echo '<script>window.location.href = "index.php?pg=10";</script>';
    exit();
}

if ($ope == 3 && $noitem != NULL) {
    $mcueite->setnoitem($noitem);
    $mcueite->setnomitem($nomitem);
    $mcueite->setnumite($numite);
    $mcueite->upd();
    echo '<script>window.location.href = "index.php?pg=10";</script>';
    exit();
}

if ($ope == 4 && $noitem != NULL) {
    $mcueite->setnoitem($noitem);
    $mcueite->del();
    echo '<script>window.location.href = "index.php?pg=10";</script>';
    exit();
}

if ($ope == 2 && $noitem != NULL) {
    $mcueite->setnoitem($noitem);
    $dtOn = $mcueite->getOne();
}

$datAll = $mcueite->getAll();
?>