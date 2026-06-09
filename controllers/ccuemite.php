<?php
    require_once("models/mcuemite.php");


    $noitval = isset($_REQUEST["noitval"]) ? $_REQUEST["noitval"] : NULL; 
    $noitem = isset($_POST["noitem"]) ? $_POST["noitem"] : NULL; 
    $novig = isset($_POST["novig"]) ? $_POST["novig"] : NULL; 
    $valor = isset($_POST["valor"]) ? $_POST["valor"] : NULL;

    $ope = isset($_REQUEST["ope"]) ? $_REQUEST["ope"] :0; //funcion de crud
    $dton = NULL;//editar

    $mcuemite = new mCuemite();
    $datAll = $mcuemite->getAll();

    $mcuemite->setNoitval($noitval);

    if($ope == "save"){
    //$mcuemite->setNoitval($noitval);
    $mcuemite->setNoitem($noitem);
    $mcuemite->setNovig($novig);
    $mcuemite->setValor($valor);
    if($noitval) $mcuemite->upd();
    else $mcuemite->save();
    }


    if($ope=="eli" AND $noitval) $mcuemite->del();
    if($ope=="edi" AND $noitval) $dton = $mcuemite->getOne();

    //Dependencias(vigencia-item)
    /*
    $mcueite = new mCueite();
    $mcofvig = new mCofvig();

    faltan crear esas clases--

    */
?>
