<?php
require_once("models/musuper.php");
$musuper = new mUsuper();
$mensaje = "";
$tipoMensaje = "";

// Capturar la acción del formulario
$accion = isset($_POST['accion']) ? $_POST['accion'] : NULL;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. CARGA MASIVA DE ARCHIVO CSV
    if ($accion === 'cargar_masiva' || (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK)) {
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['archivo']['tmp_name'];
            $fileName = $_FILES['archivo']['name'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if ($fileExtension === 'csv') {
                $resultado = $musuper->importFromCSV($fileTmpPath);
                if ($resultado['status'] === 'success') {
                    $mensaje = "¡Carga masiva realizada con éxito! Se procesaron " . $resultado['count'] . " registros.";
                    $tipoMensaje = "success";
                } else {
                    $mensaje = "Error en la carga: " . implode(", ", $resultado['errors']);
                    $tipoMensaje = "danger";
                }
            } else {
                $mensaje = "Formato no válido. Por favor suba un archivo con extensión .csv";
                $tipoMensaje = "danger";
            }
        }
    }
    // 2. REGISTRO INDIVIDUAL DESDE EL FORMULARIO
    else if ($accion === 'guardar') {
        // Datos del Estudiante (Mapeados a la tabla 'persona')
        $musuper->setNuiper($_POST['doc_est']);

        // Procesar nombre y apellido paterno (Obligatorio en la BD)
        $nombreCompleto = trim($_POST['nombre_est']);
        $partesNombre = explode(" ", $nombreCompleto, 2);
        $musuper->setNomper($partesNombre[0]);
        $musuper->setPapeper(isset($partesNombre[1]) ? $partesNombre[1] : 'S/A');

        $musuper->setFnacper($_POST['fecha_nac']);
        $musuper->setAleper($_POST['genero']);
        $musuper->setTelcper($_POST['telefono']);
        $musuper->setEmaper($_POST['email']);
        $musuper->setActper(($_POST['estado'] === 'Activo') ? 1 : 0);

        // Datos complementarios de Matrícula
        $musuper->setGrado($_POST['grado']);
        $musuper->setFecmat($_POST['fecha_mat']);

        // Ejecutar inserción combinada
        if ($musuper->saveIndividual()) {
            $mensaje = "El estudiante y su matrícula se registraron correctamente.";
            $tipoMensaje = "success";
        } else {
            $mensaje = "Error al guardar el registro. Verifique los datos o que el documento del estudiante no esté duplicado.";
            $tipoMensaje = "danger";
        }
    }
}

// Obtener todas las matrículas y personas registradas para pintarlas en la vista
$datAll = $musuper->getAllMatriculas();
?>