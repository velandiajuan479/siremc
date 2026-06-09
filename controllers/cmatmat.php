<?php
require_once("models/mmatmat.php");

// ===== POST =====
$nomat    = isset($_POST["nomat"])    ? $_POST["nomat"]    : NULL;
$novig    = isset($_POST["novig"])    ? $_POST["novig"]    : NULL;
$fecmat   = isset($_POST["fecmat"])   ? $_POST["fecmat"]   : NULL;
$folnmat  = isset($_POST["folnmat"])  ? $_POST["folnmat"]  : NULL;
$idcur    = isset($_POST["idcur"])    ? $_POST["idcur"]    : NULL;
$inggrado = isset($_POST["inggrado"]) ? $_POST["inggrado"] : NULL; // Adicionado
$idest    = isset($_POST["idest"])    ? $_POST["idest"]    : NULL;
$pesmat   = isset($_POST["pesmat"])   ? $_POST["pesmat"]   : NULL;
$estmat   = isset($_POST["estmat"])   ? $_POST["estmat"]   : NULL;
$insedu   = isset($_POST["insedu"])   ? $_POST["insedu"]   : NULL;
$nivel    = isset($_POST["nivel"])    ? $_POST["nivel"]    : NULL;
$grado    = isset($_POST["grado"])    ? $_POST["grado"]    : NULL;
$ano      = isset($_POST["ano"])      ? $_POST["ano"]      : NULL;
$ubimat   = isset($_POST["ubimat"])   ? $_POST["ubimat"]   : NULL;
$actmat   = isset($_POST["actmat"])   ? $_POST["actmat"]   : NULL;
$accion   = isset($_POST["accion"])   ? $_POST["accion"]   : NULL;

// ===== GET =====
$accion_get = isset($_GET["accion"]) ? $_GET["accion"] : NULL;
$id_get     = isset($_GET["id"])     ? $_GET["id"]     : NULL;

$mmatmat = new mMatmat();

// --- GUARDAR ---
if ($accion == "guardar" && $nomat != NULL) {
    $mmatmat->setnomat($nomat);
    $mmatmat->setnovig($novig);
    $mmatmat->setfecmat($fecmat);
    $mmatmat->setfolnmat($folnmat);
    $mmatmat->setidcur($idcur);
    $mmatmat->setinggrado($inggrado); // Mapeado
    $mmatmat->setidest($idest);
    $mmatmat->setpesmat($pesmat);
    $mmatmat->setestmat($estmat);
    $mmatmat->setinsedu($insedu);
    $mmatmat->setnivel($nivel);
    $mmatmat->setgrado($grado);
    $mmatmat->setano($ano);
    $mmatmat->setubimat($ubimat);
    $mmatmat->setactmat($actmat);
    $mmatmat->save();
}

// --- ACTUALIZAR ---
if ($accion == "actualizar" && $nomat != NULL) {
    $mmatmat->setnomat($nomat);
    $mmatmat->setnovig($novig);
    $mmatmat->setfecmat($fecmat);
    $mmatmat->setfolnmat($folnmat);
    $mmatmat->setidcur($idcur);
    $mmatmat->setinggrado($inggrado); // Mapeado
    $mmatmat->setidest($idest);
    $mmatmat->setpesmat($pesmat);
    $mmatmat->setestmat($estmat);
    $mmatmat->setinsedu($insedu);
    $mmatmat->setnivel($nivel);
    $mmatmat->setgrado($grado);
    $mmatmat->setano($ano);
    $mmatmat->setubimat($ubimat);
    $mmatmat->setactmat($actmat);
    $mmatmat->upd();
}

// --- ELIMINAR ---
if ($accion_get == "eliminar" && $id_get != NULL) {
    $mmatmat->setnomat($id_get);
    $mmatmat->del();
}

// --- EDITAR (cargar para edición) ---
$editando = NULL;
if ($accion_get == "editar" && $id_get != NULL) {
    $mmatmat->setnomat($id_get);
    $editando = $mmatmat->getOne();
}

// --- LISTAR ---
$datAll = $mmatmat->getAll();
?>