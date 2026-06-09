<?php
	require_once("models/mitem.php");

	$mitem = new mItem();
	$dataAll = $mitem->getAll();

?>