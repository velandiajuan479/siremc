<?php
require_once("models/mcuefac.php");

$mcuefac = new mCueFac();
$datAll = $mcuefac->getAll();

$nofact = isset($_GET['nofact']) ? (int) $_GET['nofact'] : (!empty($datAll) ? $datAll[0]['nofact'] : 0);
$detalle = $mcuefac->getDetalle($nofact);
$total = array_sum(array_column($detalle, 'subtotal'));

$facturaEditar = null;
$modoEdicion = false;

if (isset($_GET['editar']) && !empty($_GET['editar'])) {
    $facturaEditar = $mcuefac->getOne((int) $_GET['editar']);
    if ($facturaEditar) {
        $modoEdicion = true;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'guardar') {
        try {
            $mcuefac->setIdest((int) $_POST['idest']);
            $mcuefac->setIdemp((int) $_POST['idemp']);
            $mcuefac->setFecven($_POST['fecven'] ?? null);
            $mcuefac->save();
            header("Location: index.php?pg=12&msg=guardado");
            exit;
        } catch (Exception $e) {
            if (function_exists('ManejoError'))
                ManejoError($e);
            header("Location: index.php?pg=12&msg=error");
            exit;
        }
    }

    if ($accion === 'actualizar') {
        try {
            $mcuefac->setNoFact((int) $_POST['nofact']);
            $mcuefac->setIdest((int) $_POST['idest']);
            $mcuefac->setIdemp((int) $_POST['idemp']);
            $mcuefac->setFecha($_POST['fecha']);
            $mcuefac->setFecven($_POST['fecven']);
            $mcuefac->upd();
            header("Location: index.php?pg=12&msg=actualizado");
            exit;
        } catch (Exception $e) {
            if (function_exists('ManejoError'))
                ManejoError($e);
            header("Location: index.php?pg=12&msg=error");
            exit;
        }
    }

    if ($accion === 'eliminar') {
        try {
            $mcuefac->setNoFact((int) $_POST['nofact']);
            $mcuefac->del();
            header("Location: index.php?pg=12&msg=eliminado");
            exit;
        } catch (Exception $e) {
            if (function_exists('ManejoError'))
                ManejoError($e);
            header("Location: index.php?pg=12&msg=error");
            exit;
        }
    }
}
?>