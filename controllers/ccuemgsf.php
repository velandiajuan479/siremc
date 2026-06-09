<?php
require_once("models/mcuemgsf.php");

$nregas = isset ($_REQUEST ["nregas"]) ? $_REQUEST ["nregas"]:NULL; 
$fecgas = isset ($_POST ["fecgas"]) ? $_POST ["fecgas"]:NULL; 
$nomgas = isset ($_POST ["nomgas"]) ? $_POST ["nomgas"]:NULL; 
$valor = isset ($_POST ["valor"]) ? $_POST ["valor"]:NULL; 
$ope = isset ($_REQUEST ["ope"]) ? $_REQUEST ["ope"]:NULL;
$dtOne = NULL;

$mcuemgsf = new mCuemgsf();

$mcuemgsf->setNregas($nregas);

if($ope=="save"){
$mcuemgsf -> setNregas("$nregas");
$mcuemgsf -> setFecgas("$fecgas");
$mcuemgsf -> setNomgas("$nomgas");
$mcuemgsf -> setValor("$valor");
if($nregas) $mcuemgsf -> upd();
else $mcuemgsf -> save();
}

if($ope=="eli" AND $nregas){ $mcuemgsf->del();}
if($ope=="edi" AND $nregas) $dtOne = $mcuemgsf ->getOne();


// ================= CARGA CSV =================

if(isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0){

    $archivo = $_FILES['archivo']['tmp_name'];

    if(($handle = fopen($archivo, "r")) !== FALSE){

        while(($datos = fgetcsv($handle, 1000, ",")) !== FALSE){

            if(count($datos) >= 3){

                $nomgas = trim($datos[0]);
                $valor = trim($datos[1]);
                $fecgas = trim($datos[2]);

                $mcuemgsf->setNomgas($nomgas);
                $mcuemgsf->setValor($valor);
                $mcuemgsf->setFecgas($fecgas);

                $mcuemgsf->save();
            }
        }

        fclose($handle);
    }
}

$datAll = $mcuemgsf->getAll();
?>