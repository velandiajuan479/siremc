<?php
class mPerfil {

    // Atributos
    private $idpef;
    private $nompef;
    private $pgprin;
    private $idmod;

    // GETTERS
    function getIdpef(){
        return $this->idpef;
    }

    function getNompef(){
        return $this->nompef;
    }

    function getPgprin(){
        return $this->pgprin;
    }

    function getIdmod(){
        return $this->idmod;
    }

    // SETTERS
    function setIdpef($idpef){
        $this->idpef = $idpef;
    }

    function setNompef($nompef){
        $this->nompef = $nompef;
    }

    function setPgprin($pgprin){
        $this->pgprin = $pgprin;
    }

    function setIdmod($idmod){
        $this->idmod = $idmod;
    }

    // LISTAR TODOS
    public function getAll(){

        $sql = "SELECT * FROM perfil";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // CONSULTAR UNO
    public function getOne(){

        $sql = "SELECT * FROM perfil
                WHERE idpef = :idpef";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idpef = $this->getIdpef();

        $result->bindParam(":idpef", $idpef);

        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    // GUARDAR
    public function save(){

        $sql = "INSERT INTO perfil
                (nompef, pgprin, idmod)
                VALUES
                (:nompef, :pgprin, :idmod)";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $nompef = $this->getNompef();
        $pgprin = $this->getPgprin();
        $idmod = $this->getIdmod();

        $result->bindParam(":nompef", $nompef);
        $result->bindParam(":pgprin", $pgprin);
        $result->bindParam(":idmod", $idmod);

        return $result->execute();
    }

    // ACTUALIZAR
    public function upd(){

        $sql = "UPDATE perfil
                SET nompef = :nompef,
                    pgprin = :pgprin,
                    idmod = :idmod
                WHERE idpef = :idpef";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idpef = $this->getIdpef();
        $nompef = $this->getNompef();
        $pgprin = $this->getPgprin();
        $idmod = $this->getIdmod();

        $result->bindParam(":idpef", $idpef);
        $result->bindParam(":nompef", $nompef);
        $result->bindParam(":pgprin", $pgprin);
        $result->bindParam(":idmod", $idmod);

        return $result->execute();
    }

    // ELIMINAR
    public function del(){

        $sql = "DELETE FROM perfil
                WHERE idpef = :idpef";

        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $idpef = $this->getIdpef();

        $result->bindParam(":idpef", $idpef);

        return $result->execute();
    }
}
?>                                                  