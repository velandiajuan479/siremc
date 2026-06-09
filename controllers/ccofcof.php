<?php
require_once("models/mcofcof.php");

$nocnf  = isset($_REQUEST['nocnf'])  ? trim($_REQUEST['nocnf'])  : NULL;
$ope    = isset($_REQUEST['ope'])    ? trim($_REQUEST['ope'])    : NULL;
$buscar = isset($_REQUEST['buscar']) ? trim($_REQUEST['buscar']) : NULL;

$dtOne  = NULL;
$datAll = [];

$mcofcof = new mConfiguracion();

$mcofcof->setNocnf($nocnf);

if ($ope == "save") {
    $mcofcof->setNomcnf  (isset($_POST['nomcnf'])   ? trim($_POST['nomcnf'])   : '');
    $mcofcof->setDircnf  (isset($_POST['dircnf'])   ? trim($_POST['dircnf'])   : '');
    $mcofcof->setTelcnf  (isset($_POST['telcnf'])   ? trim($_POST['telcnf'])   : '');
    $mcofcof->setLogocnf (isset($_POST['logocnf'])  ? trim($_POST['logocnf'])  : '');
    $mcofcof->setNomescnf(isset($_POST['nomescnf']) ? trim($_POST['nomescnf']) : '');
    $mcofcof->setTiecnf  (isset($_POST['tiecnf'])   ? trim($_POST['tiecnf'])   : '');

    if ($nocnf) $mcofcof->Upd();
    else        $mcofcof->Save();

    echo '<script>window.location.href="index.php?pg=34";</script>';
    exit();
}

if ($ope == "eli" && $nocnf) {
    $mcofcof->Del();
    echo '<script>window.location.href="index.php?pg=34";</script>';
    exit();
}

if ($ope == "edi" && $nocnf) {
    $dtOne = $mcofcof->getOne();
}

if (!empty($buscar)) {
    $datAll = $mcofcof->search($buscar);
} else {
    $datAll = $mcofcof->getAll();
}
?>

