<?php
class mMatlxc{
	private $idcur; 
	private $nomcur;
	private $depcur;
	private $idper;
// Metodos getters
	function getIdcur(){
		retunr $this ->idcur;
	}
	function getNomcur(){
		retunr $this ->nomcur;
	}
	function getDepcur(){
		retunr $this ->depcur;
	}
	function getIdper(){
		retunr $this ->idper;
	}
//Metodos setters
	function setIdcur($idcur){
		$this ->idcur= $idcur;
	}
	function setNomcur($nomcur){
		$this ->nomcur= $nomcur;
	}	
	function setDepcur($depcur){
		$this ->depcur= $depcur;
	}	
	function setIdper($idper){
		$this ->idper= $idper;

//Metodos generales 
	public function getALL(){

		$sql ="SELECT idest, idacu, parexa FROM valor"

		$modelo = new conexion();
		$conexion = $modelo->get_conexion();

		$result = $conexion->prepare($sql);

		retunr $result-
	>fetchAll(PDO::FETCH_ASSOC);
	}
	public function getOne(){
	    $sql = "SELECT idest, idacu, parexa FROM valor
                WHERE idest = :idest";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idest = $this->getIdest();

        $result->bindParam(":idest", $idest);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }
	public function save(){
		$sql = "INSERT INTO valor(idacu, parexa)
                VALUES (:idacu, :parexa)";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idacu  = $this->getIdacu();
        $parexa = $this->getParexa();

        $result->bindParam(":idacu", $idacu);
        $result->bindParam(":parexa", $parexa);

        return $result->execute();
	}
	public function udp(){
		$sql = "UPDATE valor
                SET idacu = :idacu,
                    parexa = :parexa
                WHERE idest = :idest";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idest  = $this->getIdest();
        $idacu  = $this->getIdacu();
        $parexa = $this->getParexa();

        $result->bindParam(":idest", $idest);
        $result->bindParam(":idacu", $idacu);
        $result->bindParam(":parexa", $parexa);

        return $result->execute()
	}
	public function del(){
		 $sql = "DELETE FROM valor
                WHERE idest = :idest";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idest = $this->getIdest();

        $result->bindParam(":idest", $idest);

        return $result->execute();
	}

//Metodos 
	public function getALL(){
		$sql = "SELEC idcur, nomcur, depcur, idper FROM";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare(sql);
		$result->execute();
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
public function getone(){
	$sql ="SELECT idest, idacu, parexa FROM valor"

		$modelo = new conexion();
		$conexion = $modelo->get_conexion();

		$result = $conexion->prepare($sql);

		retunr $result-
	>fetchAll(PDO::FETCH_ASSOC);

}
public function save(){
	$sql = "INSERT INTO valor(idacu, parexa)
                VALUES (:idacu, :parexa)";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idacu  = $this->getIdacu();
        $parexa = $this->getParexa();

        $result->bindParam(":idacu", $idacu);
        $result->bindParam(":parexa", $parexa);

        return $result->execute();

}
public function update(){
	$sql = "UPDATE valor
                SET idacu = :idacu,
                    parexa = :parexa
                WHERE idest = :idest";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idest  = $this->getIdest();
        $idacu  = $this->getIdacu();
        $parexa = $this->getParexa();

        $result->bindParam(":idest", $idest);
        $result->bindParam(":idacu", $idacu);
        $result->bindParam(":parexa", $parexa);

        return $result->execute()

}
public function del(){
	$sql = "DELETE FROM valor
                WHERE idest = :idest";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idest = $this->getIdest();

        $result->bindParam(":idest", $idest);

        return $result->execute();

}
?>