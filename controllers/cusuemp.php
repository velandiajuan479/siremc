<?php
     require_once("models/musuemp.php");

    $musuemp = new mUsuemp();
    $datAll = $musuemp->getAll();

?>