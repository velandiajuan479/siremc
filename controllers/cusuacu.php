<?php
    require_once("models/musuacu.php");
    $idper = isset($_POST["idper"]) ? $_POST["idper"]:NULL;
	$tipdper = isset($_POST["tipdper"]) ? $_POST["tipdper"]:NULL;
	$nuiper = isset($_POST["nuiper"]) ? $_POST["nuiper"]:NULL;
	$nomper = isset($_POST["nomper"]) ? $_POST["nomper"]:NULL;
	$papeper = isset($_POST["papeper"]) ? $_POST["papeper"]:NULL;
	$sapeper = isset($_POST["sapeper"]) ? $_POST["sapeper"]:NULL;
	$fnacper = isset($_POST["fnacper"]) ? $_POST["fnacper"]:NULL;
	$ubinac = isset($_POST["ubinac"]) ? $_POST["ubinac"]:NULL;
	$rhper = isset($_POST["rhper"]) ? $_POST["rhper"]:NULL;
	$aleper = isset($_POST["aleper"]) ? $_POST["aleper"]:NULL;
	$fotoper = isset($_POST["fotoper"]) ? $_POST["fotoper"]:NULL;
	$dircper = isset($_POST["dircper"]) ? $_POST["dircper"]:NULL;
	$ubidirc = isset($_POST["ubidirc"]) ? $_POST["ubidirc"]:NULL;
	$telcper = isset($_POST["telcper"]) ? $_POST["telcper"]:NULL;
	$celcper = isset($_POST["celcper"]) ? $_POST["celcper"]:NULL;
	$dirtper = isset($_POST["dirtper"]) ? $_POST["dirtper"]:NULL;
	$ubidirt = isset($_POST["ubidirt"]) ? $_POST["ubidirt"]:NULL;
	$celtper = isset($_POST["celtper"]) ? $_POST["celtper"]:NULL;
	$emaper = isset($_POST["emaper"]) ? $_POST["emaper"]:NULL;
	$pasper = isset($_POST["pasper"]) ? $_POST["pasper"]:NULL;
	$actper = isset($_POST["actper"]) ? $_POST["actper"]:NULL;
	$fsolper = isset($_POST["fsolper"]) ? $_POST["fsolper"]:NULL;
	$clvper = isset($_POST["clvper"]) ? $_POST["clvper"]:NULL;
	$ecmper = isset($_POST["ecmper"]) ? $_POST["ecmper"]:NULL;
	$segper = isset($_POST["segper"]) ? $_POST["segper"]:NULL;
	$idpro = isset($_POST["idpro"]) ? $_POST["idpro"]:NULL;
	$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:0;

    $musuacu = new musuacu();

	$musuacu->setIdper($idper);

	if($ope=="save"){
		$musuacu->setTipdper($tipdper);
        $musuacu->setNuiper($nuiper);
        $musuacu->setNomper($nomper);
        $musuacu->setPapeper($papeper);
        $musuacu->setSapeper($sapeper);
        $musuacu->setFnacper($fnacper);
        $musuacu->setUbinac($ubinac);
        $musuacu->setRhper($rhper);
        $musuacu->setAleper($aleper);
        $musuacu->setFotoper($fotoper);
        $musuacu->setDircper($dircper);
        $musuacu->setUbidirc($ubidirc);
        $musuacu->setTelcper($telcper);
        $musuacu->setCelcper($celcper);
        $musuacu->setDirtper($dirtper);
        $musuacu->setUbidirt($ubidirt);
        $musuacu->setCeltper($celtper);
        $musuacu->setEmaper($emaper);
        $musuacu->setPasper($pasper);
        $musuacu->setActper($actper);
        $musuacu->setFsolper($fsolper);
        $musuacu->setClvper($clvper);
        $musuacu->setEcmper($ecmper);
        $musuacu->setSegper($segper);
        $musuacu->setIdpro($idpro);
	}

    $datAll = $musuacu->getAll();
?>
