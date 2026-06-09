<?php
     require_once("models/musupemp.php");

    $musupemp = new mUsupemp();
    $datAll = $musupemp->getAll();

?>