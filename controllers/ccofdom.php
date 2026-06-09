<?php

require_once("models/mcofdom.php");

$mcofdom = new mcofdom();


if($_POST){

    $iddom = $_POST["iddom"];
    $nomdom = $_POST["nomdom"];

    $mcofdom->setNomdom($nomdom);

    if(!empty($iddom)){

        $mcofdom->setIddom($iddom);
        $mcofdom->upd();

    }else{

        $mcofdom->save();

    }

    header("Location:index.php?pg=30");
    exit();
}

/* ELIMINAR */

if(isset($_GET["del"])){

    $mcofdom->setIddom($_GET["del"]);
    $mcofdom->del();

    header("Location:index.php?pg=30");
    exit();
}

$datAll = $mcofdom->getAll();

?>