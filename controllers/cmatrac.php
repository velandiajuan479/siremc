<?php

require_once("models/mmatrac.php");
require_once("models/mmatest.php");
require_once("models/mmatcur.php");

$idcur = isset($_POST["idcur"]) ? $_POST["idcur"] : NULL;
$nomcur = isset($_POST["nomcur"]) ? $_POST["nomcur"] : NULL;
$depcur = isset($_POST["depcur"]) ? $_POST["depcur"] : NULL;
$idper = isset($_REQUEST["idper"]) ? $_REQUEST["idper"] : NULL;

$mmatrac = new mMatrac();
$mmatest = new mMatest();
$mmatCur = new MMatCur();

$ope   = isset($_REQUEST['ope'])   ? $_REQUEST['ope']   : NULL;
$idper = isset($_REQUEST['idper']) ? $_REQUEST['idper'] : NULL;



//--- Eliminar ---
if ($ope == "eli" && $idper) {
    $mmatrac->setIdper($idper);
    $mmatrac->Desactivar(); // solo cambia actper a 0, no borra nada
    echo "<script>window.location.href='index.php?pg=9';</script>";
    exit;
}
if ($ope == "edi" && $idper) {
    $mmatrac->setIdper($idper);
    $datOne = $mmatrac->getOne();
    
}
    
    

// --- EDITAR: cargar datos ---
$datOne = null;
if ($ope == "edi" && $idper) {
    $mmatrac->setIdper($idper); // 
    $datOne = $mmatrac->getOne();
    $datOne = $datOne[0] ?? null; // getOne() retorna array, tomamos el primer registro
}

if($ope == "upd") {
    $mmatrac->setIdper($_POST['idper']);
    $mmatrac->setNomper($_POST['nomper']);
    $mmatrac->setPapeper($_POST['papeper']);
    $mmatrac->setSapeper($_POST['sapeper']);
    $mmatrac->setNuiper($_POST['nuiper']);
    $mmatrac->Upd();
    echo "<script>window.location.href='index.php?pg=9';</script>";
    exit;
}
    
// getGrados viene de MMatCur, no de mMatrac
$grados = $mmatCur->getAll();
$cursos = [];

// SI SE SELECCIONÓ UN GRADO
if (isset($_POST['grado'])) {
    $mmatCur->setDepcur($_POST['grado']);
    $cursos = $mmatCur->getCursosPorGrado();
}


$datAll_trac = $mmatrac->getAll();
$datAll_test = $mmatest->getAll();
$datAll_cur  = $mmatCur->getAll();