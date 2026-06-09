<?php

class mConfiguracion
{
    private $nocnf;
    private $nomcnf;
    private $dircnf;
    private $telcnf;
    private $logocnf;
    private $nomescnf;
    private $tiecnf;

    function getNocnf()    { return $this->nocnf;    }
    function getNomcnf()   { return $this->nomcnf;   }
    function getDircnf()   { return $this->dircnf;   }
    function getTelcnf()   { return $this->telcnf;   }
    function getLogocnf()  { return $this->logocnf;  }
    function getNomescnf() { return $this->nomescnf; }
    function getTiecnf()   { return $this->tiecnf;   }

    function setNocnf($v)    { $this->nocnf    = $v; }
    function setNomcnf($v)   { $this->nomcnf   = $v; }
    function setDircnf($v)   { $this->dircnf   = $v; }
    function setTelcnf($v)   { $this->telcnf   = $v; }
    function setLogocnf($v)  { $this->logocnf  = $v; }
    function setNomescnf($v) { $this->nomescnf = $v; }
    function setTiecnf($v)   { $this->tiecnf   = $v; }

    public function getAll()
    {
        try {
            $sql = "SELECT * FROM configuracion ORDER BY nocnf DESC";
            $con = (new Conexion())->get_conexion();
            $st  = $con->prepare($sql);
            $st->execute();
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function getOne()
    {
        try {
            $sql = "SELECT * FROM configuracion WHERE nocnf = :nocnf";
            $con = (new Conexion())->get_conexion();
            $st  = $con->prepare($sql);
            $st->bindParam(':nocnf', $this->nocnf);
            $st->execute();
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function search($term)
    {
        try {
            $sql = "SELECT * FROM configuracion
                    WHERE nomcnf LIKE :t
                       OR telcnf LIKE :t
                       OR dircnf LIKE :t
                    ORDER BY nocnf DESC";
            $con  = (new Conexion())->get_conexion();
            $st   = $con->prepare($sql);
            $like = "%$term%";
            $st->bindParam(':t', $like);
            $st->execute();
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function Save()
    {
        try {
            $sql = "INSERT INTO configuracion
                        (nomcnf, dircnf, telcnf, logocnf, nomescnf, tiecnf)
                    VALUES
                        (:nomcnf, :dircnf, :telcnf, :logocnf, :nomescnf, :tiecnf)";
            $con = (new Conexion())->get_conexion();
            $st  = $con->prepare($sql);
            $st->bindParam(':nomcnf',   $this->nomcnf);
            $st->bindParam(':dircnf',   $this->dircnf);
            $st->bindParam(':telcnf',   $this->telcnf);
            $st->bindParam(':logocnf',  $this->logocnf);
            $st->bindParam(':nomescnf', $this->nomescnf);
            $st->bindParam(':tiecnf',   $this->tiecnf);
            $st->execute();
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function Upd()
    {
        try {
            $sql = "UPDATE configuracion SET
                        nomcnf   = :nomcnf,
                        dircnf   = :dircnf,
                        telcnf   = :telcnf,
                        logocnf  = :logocnf,
                        nomescnf = :nomescnf,
                        tiecnf   = :tiecnf
                    WHERE nocnf  = :nocnf";
            $con = (new Conexion())->get_conexion();
            $st  = $con->prepare($sql);
            $st->bindParam(':nocnf',    $this->nocnf);
            $st->bindParam(':nomcnf',   $this->nomcnf);
            $st->bindParam(':dircnf',   $this->dircnf);
            $st->bindParam(':telcnf',   $this->telcnf);
            $st->bindParam(':logocnf',  $this->logocnf);
            $st->bindParam(':nomescnf', $this->nomescnf);
            $st->bindParam(':tiecnf',   $this->tiecnf);
            $st->execute();
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }

    public function Del()
    {
        try {
            $sql = "DELETE FROM configuracion WHERE nocnf = :nocnf";
            $con = (new Conexion())->get_conexion();
            $st  = $con->prepare($sql);
            $st->bindParam(':nocnf', $this->nocnf);
            $st->execute();
        } catch (Exception $e) {
            $misfun = new misFun();
            $misfun->ManejoError($e);
        }
    }
}
?>
