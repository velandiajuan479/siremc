<?php
    require_once("models/musudp.php");

    $musudp = new mUsudp();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'save') {
        $musudp->setIdper($_POST['idper'] ?? null);
        $musudp->setTipdper($_POST['tipdper'] ?? null);
        $musudp->setNuiper($_POST['nuiper'] ?? null);
        $musudp->setNomper($_POST['nomper'] ?? null);
        $musudp->setPapeper($_POST['papeper'] ?? null);
        $musudp->setSapeper($_POST['sapeper'] ?? null);
        $musudp->setFnacper($_POST['fnacper'] ?? null);
        $musudp->setUbinac(is_numeric($_POST['ubinac'] ?? '') ? (int)$_POST['ubinac'] : null);
        $musudp->setRhper($_POST['rhper'] ?? null);
        $musudp->setAleper($_POST['aleper'] ?? null);
        // --- Foto: procesar upload si llegó un archivo nuevo ---
        $fotoper_final = $_POST['fotoper_original'] ?? $_POST['fotoper'] ?? null;
        if (!empty($_FILES['foto_file']['tmp_name'])) {
            $ext      = strtolower(pathinfo($_FILES['foto_file']['name'], PATHINFO_EXTENSION));
            $allowed  = ['jpg','jpeg','png','gif','webp'];
            if (in_array($ext, $allowed) && $_FILES['foto_file']['error'] === UPLOAD_ERR_OK) {
                $dir = __DIR__ . '/../uploads/fotos/';
                if (!is_dir($dir)) mkdir($dir, 0755, true);
                $filename     = 'per_' . ($_POST['idper'] ?? time()) . '.' . $ext;
                $destino      = $dir . $filename;
                if (move_uploaded_file($_FILES['foto_file']['tmp_name'], $destino)) {
                    $fotoper_final = 'uploads/fotos/' . $filename;
                }
            }
        }
        $musudp->setFotoper($fotoper_final);
        $musudp->setDircper($_POST['dircper'] ?? null);
        $musudp->setUbidirc(is_numeric($_POST['ubidirc'] ?? '') ? (int)$_POST['ubidirc'] : null);
        $musudp->setTelcper($_POST['telcper'] ?? null);
        $musudp->setCelcper($_POST['celcper'] ?? null);
        $musudp->setDirtper($_POST['dirtper'] ?? null);
        $musudp->setUbidirt(is_numeric($_POST['ubidirt'] ?? '') ? (int)$_POST['ubidirt'] : null);
        $musudp->setCeltper($_POST['celtper'] ?? null);
        $musudp->setEmaper($_POST['emaper'] ?? null);
        $pasper_new = trim($_POST['pasper_new'] ?? '');
        $musudp->setPasper(!empty($pasper_new) ? $pasper_new : ($_POST['pasper'] ?? null));
        $musudp->setActper($_POST['actper'] ?? 1);
        $musudp->setFsolper($_POST['fsolper'] ?? null);
        $musudp->setClvper($_POST['clvper'] ?? null);
        $musudp->setEcmper($_POST['ecmper'] ?? 0);
        $musudp->setSegper(is_numeric($_POST['segper'] ?? '') ? (int)$_POST['segper'] : null);
        $musudp->setIdpro(!empty($_POST['idpro']) ? $_POST['idpro'] : null);
        $musudp->upd();
    }

    // Prioridad: sesión → GET → POST → 1
    if (!empty($_SESSION['idusu'])) {
        $idActual = (int)$_SESSION['idusu'];
    } elseif (!empty($_GET['idper'])) {
        $idActual = (int)$_GET['idper'];
    } elseif (!empty($_POST['idper'])) {
        $idActual = (int)$_POST['idper'];
    } else {
        $idActual = 1;
    }

    $musudp->setIdper($idActual);
    $datOne = $musudp->getOne();
    $e = $datOne[0] ?? [];
?>