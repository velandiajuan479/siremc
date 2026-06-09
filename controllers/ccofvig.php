<?php
require_once("models/mcofvig.php");
require_once("models/conexion.php");

class cCofvig {

    // Mostrar todos los registros
    public function index() {
        $modelo = new mCofvig();
        $vigencias = $modelo->getAll();
        return $vigencias;
    }

    // Guardar nuevo registro
    public function guardar($novig, $finiv, $ffinv, $actv) {
        $modelo = new mCofvig();
        $modelo->setNovig($novig);
        $modelo->setFiniv($finiv);
        $modelo->setFfinv($ffinv);
        $modelo->setActv($actv);
        return $modelo->save();
    }

    // Actualizar registro existente
    public function actualizar($novig, $finiv, $ffinv, $actv) {
        $modelo = new mCofvig();
        $modelo->setNovig($novig);
        $modelo->setFiniv($finiv);
        $modelo->setFfinv($ffinv);
        $modelo->setActv($actv);
        return $modelo->upd();
    }

    // Eliminar registro
    public function eliminar($novig) {
        $modelo = new mCofvig();
        $modelo->setNovig($novig);
        return $modelo->del();
    }
}

// Instancia del controlador
$controlador = new cCofvig();

// Si se envía el formulario de guardar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novig = $_POST['novig'];
    $finiv = $_POST['fecini'];
    $ffinv = $_POST['fechfin'];
    $actv = $_POST['act'];

    $controlador->guardar($novig, $finiv, $ffinv, $actv);
}

// Obtener todos los registros para mostrar en la vista
$vigencias = $controlador->index();
?>
