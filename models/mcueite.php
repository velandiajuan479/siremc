<?php
class mCueite {

    // ATRIBUTOS
    private $noitem;
    private $nomitem;
    private $numite;


    // GETTERS
    function getnoitem(){
        return $this->noitem;
    }
    function getnomitem(){
        return $this->nomitem;
    }
    function getnumite(){
        return $this->numite;
    }


    // SETTERS
    function setnoitem($noitem){
        $this->noitem = $noitem;
    }
    function setnomitem($nomitem){
        $this->nomitem = $nomitem;
    }
    function setnumite($numite){
        $this->numite = $numite;
    }


    // Métodos Generales
    public function getAll(){
        try {
            $sql = "SELECT noitem, nomitem, numite FROM item";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
        $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function getOne(){
        try {
            $sql = "SELECT noitem, nomitem, numite FROM item WHERE noitem = :noitem";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitem = $this->getnoitem();
            $result->bindParam(":noitem", $noitem);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function save(){
        try {
            $sql = "INSERT INTO item (nomitem, numite) VALUES (:nomitem, :numite)";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nomitem = $this->getnomitem();
            $numite  = $this->getnumite();
            $result->bindParam(":nomitem", $nomitem);
            $result->bindParam(":numite", $numite);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function upd(){
        try {
            $sql = "UPDATE item SET nomitem = :nomitem, numite = :numite WHERE noitem = :noitem";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitem  = $this->getnoitem();
            $nomitem = $this->getnomitem();
            $numite  = $this->getnumite();
            $result->bindParam(":noitem", $noitem);
            $result->bindParam(":nomitem", $nomitem);
            $result->bindParam(":numite", $numite);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function del(){
        try {
            $sql = "DELETE FROM item WHERE noitem = :noitem";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitem = $this->getnoitem();
            $result->bindParam(":noitem", $noitem);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }
}
?>