<?php
class mCofval
{


    private $idval;
    private $iddom;
    private $nomval;
    private $parval;
    private $actval;


    function getIdval()
    {
        return $this->idval;
    }
    function getIddom()
    {
        return $this->iddom;
    }
    function getNomval()
    {
        return $this->nomval;
    }
    function getParval()
    {
        return $this->parval;
    }
    function getActval()
    {
        return $this->actval;
    }


    function setIdval($idval)
    {
        $this->idval = $idval;
    }
    function setIddom($iddom)
    {
        $this->iddom = $iddom;
    }
    function setNomval($nomval)
    {
        $this->nomval = $nomval;
    }
    function setParval($parval)
    {
        $this->parval = $parval;
    }
    function setActval($actval)
    {
        $this->actval = $actval;
    }



    public function getAll()
    {
        try {
            $sql = "SELECT  v.idval, v.iddom, d.nomdom, v.nomval, v.parval, v.actval 
                    FROM valor As v INNER JOIN dominio AS d on v.iddom = d.iddom";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
           $misfun = new misfun();
           $misfun -> ManejoError($e);
        }
    }

    public function getOne()
    {
        try {
            $sql = "SELECT v.idval, v.iddom, d.nomdom, v.nomval, v.parval, v.actval 
                FROM valor AS v INNER JOIN dominio AS d ON v.iddom = d.iddom 
                WHERE v.idval = :idval";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idval = $this->getIdval();
            $result->bindParam(":idval", $idval);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
           $misfun = new misfun();
           $misfun -> ManejoError($e);
        }
    }


    public function getAllVD()
    {
        try {
            $sql = "SELECT v.idval, d.iddom, d.nomdom, v.nomval, v.parval, v.actval 
                FROM valor AS v INNER JOIN dominio AS d ON v.iddom = d.iddom 
                WHERE v.actval=1 AND d.iddom = :iddom";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $iddom = $this->getIddom();
            $result->bindParam(":iddom", $iddom);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
           $misfun = new misfun();
           $misfun -> ManejoError($e);
        }
    }


    public function Save()
    {
        try {
            $sql = "INSERT INTO valor( iddom, nomval, parval, actval )
                VALUES( :iddom, :nomval, :parval, :actval )";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $iddom = $this->getIddom();
            $nomval = $this->getNomval();
            $parval = $this->getParval();
            $actval = $this->getActval();
            $result->bindParam(":iddom", $iddom);
            $result->bindParam(":nomval", $nomval);
            $result->bindParam(":parval", $parval);
            $result->bindParam(":actval", $actval);
            return $result->execute();
        } catch (Exception $e) {
           $misfun = new misfun();
           $misfun -> ManejoError($e);
        }
    }


    public function Upd()
    {
        try {
            $sql = "UPDATE valor  SET  iddom = :iddom, nomval = :nomval, parval = :parval, actval = :actval
                WHERE idval = :idval";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idval = $this->getIdval();
            $iddom = $this->getIddom();
            $nomval = $this->getNomval();
            $parval = $this->getParval();
            $actval = $this->getActval();
            $result->bindParam(":idval", $idval);
            $result->bindParam(":iddom", $iddom);
            $result->bindParam(":nomval", $nomval);
            $result->bindParam(":parval", $parval);
            $result->bindParam(":actval", $actval);
            return $result->execute();
        } catch (Exception $e) {
           $misfun = new misfun();
           $misfun -> ManejoError($e);
        }
    }


    public function Del()
    {
        try {
            $sql = "DELETE FROM valor 
                WHERE idval = :idval";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idval = $this->getIdval();
            $result->bindParam(":idval", $idval);
            return $result->execute();
        } catch (Exception $e) {
           $misfun = new misfun();
           $misfun -> ManejoError($e);
        }
    }
}
?>