<?php

class mmatexa {

   
    private $idest;
    private $idacu;
    private $parexa;

    private static $datos = array();

  
    public function getIdest() {
        return $this->idest;
    }

    public function getIdacu() {
        return $this->idacu;
    }

    public function getParexa() {
        return $this->parexa;
    }

   
    public function setIdest($idest) {
        $this->idest = $idest;
    }

    public function setIdacu($idacu) {
        $this->idacu = $idacu;
    }

    public function setParexa($parexa) {
        $this->parexa = $parexa;
    }

 
 
   
public function getAll(){
    try{

        $sql = "SELECT m.idest,
                       e.nomest,
                       m.idacu,
                       a.nomacu,
                       m.parexa
                FROM matexa AS m
                INNER JOIN estudiante AS e
                    ON m.idest = e.idest
                INNER JOIN acudiente AS a
                    ON m.idacu = a.idacu";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }catch(Exception $e){

    }
}

    public function Upd(){
    try{

        $sql = "UPDATE matexa
                SET parexa = :parexa
                WHERE idest = :idest
                AND idacu = :idacu";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idest = $this->getIdest();
        $idacu = $this->getIdacu();
        $parexa = $this->getParexa();

        $result->bindParam(":idest", $idest);
        $result->bindParam(":idacu", $idacu);
        $result->bindParam(":parexa", $parexa);

        $result->execute();

    }catch(Exception $e){

        ManejoError($e);

    }
}

    public function Save(){
    try{

        $sql = "INSERT INTO matexa(idest,idacu,parexa)
                VALUES(:idest,:idacu,:parexa)";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idest = $this->getIdest();
        $idacu = $this->getIdacu();
        $parexa = $this->getParexa();

        $result->bindParam(":idest",$idest);
        $result->bindParam(":idacu",$idacu);
        $result->bindParam(":parexa",$parexa);

        $result->execute();

    }catch(Exception $e){
        echo $e->getMessage();
    }
}
   
public function Del(){
    try{

        $sql = "DELETE FROM matexa
                WHERE idest = :idest";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idest = $this->getIdest();

        $result->bindParam(":idest", $idest);

        $result->execute();

    }catch(Exception $e){

        ManejoError($e);

    }
}
}
?>