<?php
class mCueivl {

    // ATRIBUTOS
    private $noitval;
    private $noitem;
    private $novig;
    private $valor;
    private $act_valor;


    // GETTERS
    function getnoitval(){
        return $this->noitval;
    }
    function getnoitem(){
        return $this->noitem;
    }
    function getnovig(){
        return $this->novig;
    }
    function getvalor(){
        return $this->valor;
    }
    function getact_valor(){
        return $this->act_valor;
    }


    // SETTERS
    function setnoitval($noitval){
        $this->noitval = $noitval;
    }
    function setnoitem($noitem){
        $this->noitem = $noitem;
    }
    function setnovig($novig){
        $this->novig = $novig;
    }
    function setvalor($valor){
        $this->valor = $valor;
    }
    function setact_valor($act_valor){
        $this->act_valor = $act_valor;
    }


    // Métodos Generales
    public function getAll(){
        try {
            $sql = "SELECT iv.noitval, iv.noitem, iv.novig, iv.valor, iv.act_valor, i.nomitem 
                    FROM itemval iv 
                    INNER JOIN item i ON iv.noitem = i.noitem";
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
            $sql = "SELECT noitval, noitem, novig, valor, act_valor FROM itemval WHERE noitval = :noitval";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitval = $this->getnoitval();
            $result->bindParam(":noitval", $noitval);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function getItems(){
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

    public function save(){
        try {
            $sql = "INSERT INTO itemval (noitem, novig, valor, act_valor) 
                    VALUES (:noitem, :novig, :valor, :act_valor)";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitem    = $this->getnoitem();
            $novig     = $this->getnovig();
            $valor     = $this->getvalor();
            $act_valor = $this->getact_valor();
            $result->bindParam(":noitem", $noitem);
            $result->bindParam(":novig", $novig);
            $result->bindParam(":valor", $valor);
            $result->bindParam(":act_valor", $act_valor);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function upd(){
        try {
            $sql = "UPDATE itemval 
                    SET noitem = :noitem, novig = :novig, valor = :valor, act_valor = :act_valor 
                    WHERE noitval = :noitval";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitval   = $this->getnoitval();
            $noitem    = $this->getnoitem();
            $novig     = $this->getnovig();
            $valor     = $this->getvalor();
            $act_valor = $this->getact_valor();
            $result->bindParam(":noitval", $noitval);
            $result->bindParam(":noitem", $noitem);
            $result->bindParam(":novig", $novig);
            $result->bindParam(":valor", $valor);
            $result->bindParam(":act_valor", $act_valor);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function del(){
        try {
            $sql = "DELETE FROM itemval WHERE noitval = :noitval";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitval = $this->getnoitval();
            $result->bindParam(":noitval", $noitval);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }
}
?>