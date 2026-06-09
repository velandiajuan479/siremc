<?php
class musuprf{

    // ATRIBUTOS
    private $idpro;
    private $nompro;

    // GETTERS
    public function getidpro(){
        return $this->idpro;
    }
    public function getnompro(){
        return $this->nompro;
    }

    // SETTERS
    public function setidpro($idpro){
        $this->idpro = $idpro;
    }
    public function setnompro($nompro){
        $this->nompro = $nompro;
    }

    // MÉTODOS
    public function getAll(){
        try{
            $sql = "SELECT idpro, nompro
                    FROM profesion";

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();

            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function getOne(){
        try{
            $sql = "SELECT idpro, nompro
                    FROM profesion
                    WHERE idpro=:idpro";

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);

            $idpro = $this->getidpro();
            $result->bindParam("idpro",$idpro);

            $result->execute();

            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function save(){
        try{
        $sql = "INSERT INTO profesion (nompro)
                VALUES (:nompro)";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);

        $nompro = $this->getnompro();
        $result->bindParam("nompro",$nompro);

        $result->execute();
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e); 
        }
    }

    public function upd(){
        try{
            $sql = "UPDATE profesion SET
                    nompro=:nompro
                    WHERE idpro=:idpro";

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);

            $idpro = $this->getidpro();
            $result->bindParam("idpro",$idpro);

            $nompro = $this->getnompro();
            $result->bindParam("nompro",$nompro);

            $result->execute();
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function del(){
        try{
            $sql = "DELETE FROM profesion
                    WHERE idpro=:idpro";

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);

            $idpro = $this->getidpro();
            $result->bindParam("idpro",$idpro);

            $result->execute();
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
}
?>