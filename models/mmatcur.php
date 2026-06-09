<?php
class MMatCur
{
    
    // SELECT `nomat`, `novig`, `fecmat`, `folnmat`, `inggrado`, `idest`, `pesmat`, `estmat`, `insedu`, `nivel`, `grado`, `ano`, `ubimat`, `actmat` FROM `matricula` WHERE 1
    //Atributos
    private $idcur;
    private $nomcur;
    private $depcur;
    private $idper;
    //metodo getters
    function getIdcur()
    {
        return $this->idcur;
    }

    function getNomcur()
    {
        return $this->nomcur;
    }

    function getDepcur()
    {
        return $this->depcur;
    }

    function getIdper()
    {
        return $this->idper;
    }
    //metodo setters
    function setIdcur($idcur)
    {
        $this->idcur = $idcur;
    }
    function setNomcur($nomcur)
    {
        $this->nomcur = $nomcur;
    }
    function setDepcur($depcur)
    {
        $this->depcur = $depcur;
    }
    function setIdper($idper)
    {
        $this->idper = $idper;
    }

    //Metodos
    public function getAll()
    {   
        try {
            $sql = "SELECT `idcur`, `nomcur`, `depcur`, `idper` FROM `curso`";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function getOne()
    {
        try {
            $sql = "SELECT `idcur`, `nomcur`, `depcur`, `idper` FROM `curso` WHERE idcur = :idcur";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idcur = $this->getIdcur();
            $result->bindParam("idcur", $idcur);
            $result->execute();
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function Save()
    {
        try {
            $sql = "INSERT INTO `curso` (`idcur`, `nomcur`, `depcur`, `idper`) VALUES(:idcur, :nomcur, :depcur, :idper)";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idcur = $this->getIdcur();
            $result->bindParam("idcur", $idcur);
            $nomcur = $this->getNomcur();
            $result->bindParam("nomcur", $nomcur);
            $depcur = $this->getDepcur();
            $result->bindParam("depcur", $depcur);
            $idper = $this->getIdper();
            $result->bindParam("idper", $idper);
            $result->execute();
        } catch (PDOException $e) { 
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function Upd()
    {
        try {
            $sql = "UPDATE curso SET nomcur = :nomcur, depcur = :depcur, idper = :idper WHERE idcur = :idcur";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idcur = $this->getIdcur();
            $result->bindParam("idcur", $idcur);
            $nomcur = $this->getNomcur();
            $result->bindParam("nomcur", $nomcur);
            $depcur = $this->getDepcur();
            $result->bindParam("depcur", $depcur);
            $idper = $this->getIdper();
            $result->bindParam("idper", $idper);
            $result->execute();
        } catch (PDOException $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function Del()
    {
        try {
            $sql = "DELETE FROM curso WHERE idcur = :idcur";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idcur = $this->getIdcur();
            $result->bindParam("idcur", $idcur);
            $result->execute();
        } catch (PDOException $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

}
?>