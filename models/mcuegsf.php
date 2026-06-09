<?php
class mCuegsf{

//Atributos
	
	private $nogas;
	private $nomgas;
	private $valgas;

//gets 

Function getNogas(){
	return $this->nogas;
}

Function getNomgas(){
	return $this->nomgas;
}

Function getValgas(){
	return $this->valgas;
}

//Seters

Function setNogas($nogas){
   $this->nogas = $nogas;
}

Function setNomgas($nomgas){
   $this->nogas = $nomgas;
}
	

Function setValgas($valgas){
   $this->valgas = $valgas;
}
	



public function getAll(){
		$sql= "SELECT nogas, nomgas, valgas FROM gastofijo ORDER BY nogas DESC";

	$modelo = new conexion();
	$conexion = $modelo -> get_conexion();
	$result = $conexion -> prepare($sql);
	$result -> execute();
	return $result -> fetchAll(PDO::FETCH_ASSOC);
}


public function getOne($nogas){
	$sql= "SELECT nogas, nomgas, valgas FROM gastofijo Where nogas = :nogas";


	$modelo = new conexion();
	$conexion = $modelo -> get_conexion();
	$result = $conexion -> prepare($sql);
   $result -> bindParam (':nogas',$nogas);
   $result -> execute();

	return $result -> fetch(PDO::FETCH_ASSOC);
}


public function save(){

		$sql= "INTER INTO gastofijo ( nogas, nomgas, valgas) FROM gastofijo Where nogas = :nogas";
}
public function upd(){}
public function del(){}


	
}
?>

