<?php
require_once("models/mcuempgs.php");
$mfactura = new mfactura();

$ope = isset($_POST["ope"]) ? $_POST["ope"] : (isset($_GET["ope"]) ? $_GET["ope"] : NULL);

if ($ope == "eli") {
    $id_eliminar = isset($_GET["id"]) ? $_GET["id"] : NULL;
    if ($id_eliminar) {
        $mfactura->setNofact($id_eliminar);
        $mfactura->Del(); 
        header("Location: index.php?pg=21");
        exit();
    }
}

if ($ope == "cargar_plano") {
    $novig  = isset($_POST["novig"]) ? trim($_POST["novig"]) : NULL;
    $fecini = isset($_POST["fecini"]) ? $_POST["fecini"] : date("Y-m-d");
    $act    = isset($_POST["act"]) ? $_POST["act"] : 1;

    if (isset($_FILES['archivo_pagos']) && $_FILES['archivo_pagos']['error'] == 0) {
        $fileTmpPath = $_FILES['archivo_pagos']['tmp_name'];
        
        if (($handle = fopen($fileTmpPath, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (count($row) == 1) { 
                    $row = explode(',', $row[0]); 
                }
                
                if (empty($row) || !isset($row[0]) || trim($row[0]) == "") { 
                    continue; 
                }
                
                if (!is_numeric(trim($row[0]))) {
                    continue;
                }

                $facturaArchivo = trim($row[0]); 

                $mfactura->setNofact($facturaArchivo); 
                $mfactura->setFecha($fecini);
                $mfactura->setIdest($act);
                $mfactura->setIdemp(1); 

                try {
                    $mfactura->Save();
                } catch (PDOException $e) {
                    continue; 
                }
            }
            fclose($handle);
        }
    } 
    else if (!empty($novig)) {
        $mfactura->setNofact($novig);
        $mfactura->setFecha($fecini);
        $mfactura->setIdest($act);
        $mfactura->setIdemp(1);

        try {
            $mfactura->Save();
        } catch (PDOException $e) {
        }
    }


    header("Location: index.php?pg=21");
    exit();
}

$datAll = $mfactura->getAll();
?>