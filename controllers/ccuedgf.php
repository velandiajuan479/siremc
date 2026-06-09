	<?php
	 
	 require_once("models/mcuedgf.php");

	$ope = isset($_REQUEST["ope"]) ? $_REQUEST["ope"] : NULL;

	$nregas = isset($_REQUEST["nregas"]) ? $_REQUEST["nregas"] : NULL;
	$fecgas = isset($_POST["fecgas"]) ? $_POST["fecgas"] : NULL;
	$nomgas = isset($_POST["nomgas"]) ? $_POST["nomgas"] : NULL;
	$valor = isset($_POST["valor"]) ? $_POST["valor"] : NULL;
	$dtOn = NULL;


	 $mcuedgf = new mCuedgf();

	 $mcuedgf -> setNregas($nregas);

	 if ($ope=="save") {

	 	$mcuedgf->setNregas($nregas);
	 	$mcuedgf->setFecgas($fecgas);
	 	$mcuedgf->setNomgas($nomgas);
	 	$mcuedgf->setValor($valor);

	 	if($nregas) $mcuedgf->upd();
	 	else $mcuedgf->save();
	 }

	if($ope=="eli" AND $nregas) $mcuedgf->del();
	if($ope=="edi" AND $nregas) $dtOn = $mcuedgf->getOne();

	$datAll = $mcuedgf -> getAll();

	?>