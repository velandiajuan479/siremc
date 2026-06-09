<?php
    require_once("models/mmatrmat.php");
    
    $mmatrmat = new mmatrmat();
    $datAll = $mmatrmat->getAll();
?>    