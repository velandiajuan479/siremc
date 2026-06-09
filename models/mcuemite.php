<?php
class mCuemite{
    //SELECT `noitval`, `noitem`, `novig`, `valor` FROM `itemval` 

//Atributos
    private $noitval;
    private $noitem;
    private $novig;
    private $valor;
//Metodos Get
    function getNoitval(){
        return $this -> noitval;
    }
    function getNoitem (){
        return $this -> noitem;
    }
    function getNovig (){
        return $this -> novig;
    }
    function getValor (){
        return $this -> valor;
    }
//Metodos Set
    function setNoitval ($noitval){
        return $this -> noitval = $noitval;
    }
    function setNoitem ($noitem){
        return $this -> noitem = $noitem;
    }
    function setNovig ($novig){
        return $this -> novig = $novig;
    }
    function setValor ($valor){
        return $this -> valor = $valor;
    }

//Metodos
    public function getAll(){
        try{
            $sql = "SELECT iv.noitval, iv.noitem, iv.novig, iv.valor FROM 
            itemval AS iv 
            INNER JOIN item AS i ON iv.noitem=i.noitem /*Datos tabla item */
            INNER JOIN vigencia AS v ON iv.novig=v.novig"; /*Datos tabla vigencia */
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        };

    }
    public function getOne(){
        try{
            $sql = "SELECT iv.noitval, iv.noitem, iv.novig, iv.valor FROM 
            itemval AS iv 
            INNER JOIN iteam AS i ON iv.noitem=i.noitem 
            INNER JOIN vigencia AS v ON iv.novig=v.novig WHERE iv.noitval=:noitval";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitval = $this->getNoitval();
            $result->bindParam("noitval", $noitval);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        };
    }
    public function save(){
        try{
            $sql = "INSERT INTO itemval (noitval, noitem, novig, valor) 
            VALUES (:noitval, :noitem, :novig, :valor)";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitval = $this->getNoitval();
            $result->bindParam("noitval", $noitval);
            $noitem = $this->getNoitem();
            $result->bindParam("noitem", $noitem);
            $novig = $this->getNovig();
            $result->bindParam("novig", $novig);
            $valor = $this->getValor();
            $result->bindParam("valor", $valor);
            $result->execute();
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        };
    }

    public function upd(){
        try{
            $sql = "UPDATE itemval SET noitval=:noitval, noitem=:noitem, novig=:novig, valor=:valor 
            WHERE noitval=:noitval";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitval = $this->getNoitval();
            $result->bindParam("noitval", $noitval);
            $noitem = $this->getNoitem();
            $result->bindParam("noitem", $noitem);
            $novig = $this->getNovig();
            $result->bindParam("novig", $novig);
            $valor = $this->getValor();
            $result->bindParam("valor", $valor);
            $result->execute();
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        };
    }
    public function del(){
        try{
            $sql = "DELETE FROM itemval WHERE noitval=:noitval";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $noitval = $this->getNoitval();
            $result->bindParam("noitval", $noitval);
            $result->execute();
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun->ManejoError($e);
        };
    }

}
//verificar el query
?>