<?php
class mMatmat {
    // ATRIBUTOS
    private $nomat;
    private $novig;
    private $fecmat;
    private $folnmat;
    private $idcur;
    private $inggrado;
    private $idest;
    private $pesmat;
    private $estmat;
    private $insedu;
    private $nivel;
    private $grado;
    private $ano;
    private $ubimat;
    private $actmat;

    // GETTERS
    function getnomat()   { return $this->nomat; }
    function getnovig()   { return $this->novig; }
    function getfecmat()  { return $this->fecmat; }
    function getfolnmat() { return $this->folnmat; }
    function getidcur()   { return $this->idcur; }
    function getinggrado(){ return $this->inggrado; }
    function getidest()   { return $this->idest; }
    function getpesmat()  { return $this->pesmat; }
    function getestmat()  { return $this->estmat; }
    function getinsedu()  { return $this->insedu; }
    function getnivel()   { return $this->nivel; }
    function getgrado()   { return $this->grado; }
    function getano()     { return $this->ano; }
    function getubimat()  { return $this->ubimat; }
    function getactmat()  { return $this->actmat; }

    // SETTERS
    function setnomat($nomat)     { $this->nomat = $nomat; }
    function setnovig($novig)     { $this->novig = $novig; }
    function setfecmat($fecmat)   { $this->fecmat = $fecmat; }
    function setfolnmat($folnmat) { $this->folnmat = $folnmat; }
    function setidcur($idcur)     { $this->idcur = $idcur; }
    function setinggrado($inggrado){ $this->inggrado = $inggrado; }
    function setidest($idest)     { $this->idest = $idest; }
    function setpesmat($pesmat)   { $this->pesmat = $pesmat; }
    function setestmat($estmat)   { $this->estmat = $estmat; }
    function setinsedu($insedu)   { $this->insedu = $insedu; }
    function setnivel($nivel)     { $this->nivel = $nivel; }
    function setgrado($grado)     { $this->grado = $grado; }
    function setano($ano)         { $this->ano = $ano; }
    function setubimat($ubimat)   { $this->ubimat = $ubimat; }
    function setactmat($actmat)   { $this->actmat = $actmat; }

    // ============== MÉTODOS CRUD CORREGIDOS ==============

    public function getAll() {
        $res = NULL;
        $sql = "SELECT nomat, novig, fecmat, folnmat, idcur, inggrado, idest, pesmat, estmat,
                       insedu, nivel, grado, ano, ubimat, actmat
                FROM matricula";
        try {
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $resl = $conexion->prepare($sql);
            $resl->execute();
            $res = $resl->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
        return $res;
    }

    public function getOne() {
        try {
            $sql = "SELECT nomat, novig, fecmat, folnmat, idcur, inggrado, idest, pesmat, estmat,
                           insedu, nivel, grado, ano, ubimat, actmat
                    FROM matricula WHERE nomat = :nomat";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nomat = $this->getnomat();
            $result->bindParam(':nomat', $nomat);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
            return NULL;
        }
    }

    public function save() {
        try {
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();

            $conexion->query("SET FOREIGN_KEY_CHECKS = 0;");

            $sql = "INSERT INTO matricula
                        (novig, fecmat, folnmat, idcur, inggrado, idest, pesmat, estmat,
                         insedu, nivel, grado, ano, ubimat, actmat)
                    VALUES
                        (:novig, :fecmat, :folnmat, :idcur, :inggrado, :idest, :pesmat, :estmat,
                         :insedu, :nivel, :grado, :ano, :ubimat, :actmat)";

            $result = $conexion->prepare($sql);
            $result->bindParam(':novig',    $this->novig);
            $result->bindParam(':fecmat',   $this->fecmat);
            $result->bindParam(':folnmat',  $this->folnmat);
            $result->bindParam(':idcur',    $this->idcur);
            $result->bindParam(':inggrado', $this->inggrado);
            $result->bindParam(':idest',    $this->idest);
            $result->bindParam(':pesmat',   $this->pesmat);
            $result->bindParam(':estmat',   $this->estmat);
            $result->bindParam(':insedu',   $this->insedu);
            $result->bindParam(':nivel',    $this->nivel);
            $result->bindParam(':grado',    $this->grado);
            $result->bindParam(':ano',      $this->ano);
            $result->bindParam(':ubimat',   $this->ubimat);
            $result->bindParam(':actmat',   $this->actmat);

            $result->execute();

            $conexion->query("SET FOREIGN_KEY_CHECKS = 1;");
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function upd() {
        try {
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();

            $conexion->query("SET FOREIGN_KEY_CHECKS = 0;");

            $sql = "UPDATE matricula SET
                        novig    = :novig,
                        fecmat   = :fecmat,
                        folnmat  = :folnmat,
                        idcur    = :idcur,
                        inggrado = :inggrado,
                        idest    = :idest,
                        pesmat   = :pesmat,
                        estmat   = :estmat,
                        insedu   = :insedu,
                        nivel    = :nivel,
                        grado    = :grado,
                        ano      = :ano,
                        ubimat   = :ubimat,
                        actmat   = :actmat
                    WHERE nomat  = :nomat";

            $result = $conexion->prepare($sql);
            $result->bindParam(':nomat',    $this->nomat);
            $result->bindParam(':novig',    $this->novig);
            $result->bindParam(':fecmat',   $this->fecmat);
            $result->bindParam(':folnmat',  $this->folnmat);
            $result->bindParam(':idcur',    $this->idcur);
            $result->bindParam(':inggrado', $this->inggrado);
            $result->bindParam(':idest',    $this->idest);
            $result->bindParam(':pesmat',   $this->pesmat);
            $result->bindParam(':estmat',   $this->estmat);
            $result->bindParam(':insedu',   $this->insedu);
            $result->bindParam(':nivel',    $this->nivel);
            $result->bindParam(':grado',    $this->grado);
            $result->bindParam(':ano',      $this->ano);
            $result->bindParam(':ubimat',   $this->ubimat);
            $result->bindParam(':actmat',   $this->actmat);

            $result->execute();

            $conexion->query("SET FOREIGN_KEY_CHECKS = 1;");
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }

    public function del() {
        try {
            $sql = "DELETE FROM matricula WHERE nomat = :nomat";
            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nomat = $this->getnomat();
            $result->bindParam(":nomat", $nomat);
            $result->execute();
        } catch (Exception $e) {
            $misfun = new misfun();
            $misfun->ManejoError($e);
        }
    }
}
?>