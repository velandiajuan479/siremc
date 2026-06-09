<?php
require_once("models/mcuerixg.php");

$mcuerixg = new mCuerixg();

// Captura segura de variables desde la Vista
$nogas = isset($_REQUEST["nogas"]) ? $_REQUEST["nogas"] : NULL;
$nomgas = isset($_POST["nomgas"]) ? $_POST["nomgas"] : NULL;
$valgas = isset($_POST["valgas"]) ? $_POST["valgas"] : NULL;
$tipomov = isset($_POST["tipomov"]) ? $_POST["tipomov"] : NULL; 
$operacion = isset($_REQUEST["operacion"]) ? $_REQUEST["operacion"] : NULL;

// Acción: Insertar Registro
if ($nomgas && $valgas && $tipomov) {
    $mcuerixg->setNogas($nogas);
    $mcuerixg->setNomgas($nomgas);
    $mcuerixg->setValgas($valgas);
    $mcuerixg->setTipomov($tipomov); 

    try {
        $mcuerixg->Save();
        
        echo "<script>window.location.href = window.location.href;</script>";
        exit();

    } catch (PDOException $e) {
        if ($e->getCode() == '23000') {
            echo "<script>
                alert('¡Error! El No. Registro ($nogas) ya existe en la base de datos. Usa un número diferente.');
                window.location.href = window.location.href;
            </script>";
        } else {
            echo "<script>
                alert('Error en la base de datos: " . addslashes($e->getMessage()) . "');
                window.location.href = window.location.href;
            </script>";
        }
        exit();
    }
}

// Acción: Eliminar Registro
if ($nogas && $operacion == "del") {
    $mcuerixg->setNogas($nogas);
    $mcuerixg->Del();
    echo "<script>window.location.href = window.location.href;</script>";
    exit();
}

// Obtener los datos frescos de la tabla gastofijo
$datAll = $mcuerixg->getAll();
?>