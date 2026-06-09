<?php
class mCofpag{
    //Atributos
    private $idpag;
    private $nompag;
    private $arcpag;
    private $mospag;
    private $ordpag;
    private $icopag;
    private $despag;

    //   GETTERS
    function getIdpag(){ return $this->idpag; }
    function getNompag(){ return $this->nompag; }
    function getArcpag(){ return $this->arcpag; }
    function getMospag(){ return $this->mospag; }
    function getOrdpag(){ return $this->ordpag; }
    function getIcopag(){ return $this->icopag; }
    function getDespag(){ return $this->despag; }

    // SETTERS
    function setIdpag($idpag){ $this->idpag = $idpag; }
    function setNompag($nompag){ $this->nompag = $nompag; }
    function setArcpag($arcpag){ $this->arcpag = $arcpag; }
    function setMospag($mospag){ $this->mospag = $mospag; }
    function setOrdpag($ordpag){ $this->ordpag = $ordpag; }
    function setIcopag($icopag){ $this->icopag = $icopag; }
    function setDespag($despag){ $this->despag = $despag; }

    // Métodos
    public function getAll()
    {
        try{
            $sql = "SELECT idpag, nompag, arcpag, mospag, ordpag, icopag, despag FROM pagina";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();

            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun ->ManejoError($e);
        }
    }
    public function getOne(){
        try{
            $sql = "SELECT idpag, nompag, arcpag, mospag, ordpag, icopag, despag FROM pagina WHERE idpag=:idpag";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);

            $idpag = $this->getIdpag();
            $result->bindParam("idpag", $idpag);

            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun ->ManejoError($e);
        }
    }

    public function save(){
        try{
            $sql = "INSERT INTO pagina 
                    (nompag, arcpag, mospag, ordpag, icopag, despag)
                    VALUES
                    (:nompag, :arcpag, :mospag, :ordpag, :icopag, :despag)";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);

            $nompag = $this->getNompag();
            $result->bindParam("nompag", $nompag);

            $arcpag = $this->getArcpag();
            $result->bindParam("arcpag", $arcpag);

            $mospag = $this->getMospag();
            $result->bindParam("mospag", $mospag);

            $ordpag = $this->getOrdpag();
            $result->bindParam("ordpag", $ordpag);

            $icopag = $this->getIcopag();
            $result->bindParam("icopag", $icopag);

            $despag = $this->getDespag();
            $result->bindParam("despag", $despag);

            $result->execute();
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun ->ManejoError($e);
        }
    }

    public function upd(){
        try{
            $sql = "UPDATE pagina SET
                    nompag=:nompag,
                    arcpag=:arcpag,
                    mospag=:mospag,
                    ordpag=:ordpag,
                    icopag=:icopag,
                    despag=:despag
                    WHERE idpag=:idpag";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);

            $idpag = $this->getIdpag();
            $result->bindParam("idpag", $idpag);

            $nompag = $this->getNompag();
            $result->bindParam("nompag", $nompag);

            $arcpag = $this->getArcpag();
            $result->bindParam("arcpag", $arcpag);

            $mospag = $this->getMospag();
            $result->bindParam("mospag", $mospag);

            $ordpag = $this->getOrdpag();
            $result->bindParam("ordpag", $ordpag);

            $icopag = $this->getIcopag();
            $result->bindParam("icopag", $icopag);

            $despag = $this->getDespag();
            $result->bindParam("despag", $despag);

            $result->execute();
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun ->ManejoError($e);
        }
    }

    public function del(){
        try{
            $sql = "DELETE FROM pagina WHERE idpag=:idpag";

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);

            $idpag = $this->getIdpag();
            $result->bindParam("idpag", $idpag);

            $result->execute();
        }catch(Exception $e){
            $misfun = new misFun();
            $misfun ->ManejoError($e);
        }
    }
}
?>