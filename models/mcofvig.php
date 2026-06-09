<?php
class mCofvig {

    // Propiedades
    private $novig;
    private $finiv;
    private $ffinv;
    private $actv;

    // GETTERS
    public function getNovig() {
        return $this->novig;
    }

    public function getFiniv() {
        return $this->finiv;
    }

    public function getFfinv() {
        return $this->ffinv;
    }

    public function getActv() {
        return $this->actv;
    }

    // SETTERS
    public function setNovig($novig) {
        $this->novig = $novig;
    }

    public function setFiniv($finiv) {
        $this->finiv = $finiv;
    }

    public function setFfinv($ffinv) {
        $this->ffinv = $ffinv;
    }

    public function setActv($actv) {
        $this->actv = $actv;
    }

    // MOSTRAR TODOS LOS REGISTROS
    public function getAll() {
        $sql = "SELECT novig, finiv, ffinv, actv FROM vigencia";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // MOSTRAR UN SOLO REGISTRO
    public function getOne() {
        $sql = "SELECT novig, finiv, ffinv, actv
                FROM vigencia
                WHERE novig = :novig";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);
        $novig = $this->getNovig();

        $result->bindParam(":novig", $novig);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    // GUARDAR REGISTRO
    public function save() {
        $sql = "INSERT INTO vigencia(novig, finiv, ffinv, actv)
                VALUES (:novig, :finiv, :ffinv, :actv)";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $novig = $this->getNovig();
        $finiv = $this->getFiniv();
        $ffinv = $this->getFfinv();
        $actv = $this->getActv();

        $result->bindParam(":novig", $novig);
        $result->bindParam(":finiv", $finiv);
        $result->bindParam(":ffinv", $ffinv);
        $result->bindParam(":actv", $actv);

        return $result->execute();
    }

    // ACTUALIZAR REGISTRO
    public function upd() {
        $sql = "UPDATE vigencia
                SET finiv = :finiv,
                    ffinv = :ffinv,
                    actv = :actv
                WHERE novig = :novig";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);

        $novig = $this->getNovig();
        $finiv = $this->getFiniv();
        $ffinv = $this->getFfinv();
        $actv = $this->getActv();

        $result->bindParam(":novig", $novig);
        $result->bindParam(":finiv", $finiv);
        $result->bindParam(":ffinv", $ffinv);
        $result->bindParam(":actv", $actv);

        return $result->execute();
    }

    // ELIMINAR REGISTRO
    public function del() {
        $sql = "DELETE FROM vigencia
                WHERE novig = :novig";

        $modelo = new conexion();
        $conexion = $modelo->get_conexion();

        $result = $conexion->prepare($sql);
        $novig = $this->getNovig();

        $result->bindParam(":novig", $novig);

        return $result->execute();
    }
}
?>
