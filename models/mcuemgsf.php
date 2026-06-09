<?php
class mCuemgsf
{


    private $nregas;
    private $fecgas;
    private $nomgas;
    private $valor;

    // GETTERS
    function getNregas()
    {
        return $this->nregas;
    }

    function getFecgas()
    {
        return $this->fecgas;
    }

    function getNomgas()
    {
        return $this->nomgas;
    }

    function getValor()
    {
        return $this->valor;
    }

    // SETTERS
    function setNregas($nregas)
    {
        $this->nregas = $nregas;
    }

    function setFecgas($fecgas)
    {
        $this->fecgas = $fecgas;
    }

    function setNomgas($nomgas)
    {
        $this->nomgas = $nomgas;
    }

    function setValor($valor)
    {
        $this->valor = $valor;
    }


    public function getAll()
    {
        try {
            $sql = "SELECT nregas, fecgas, nomgas, valor
                FROM registrogas";

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            ManejoError($e);
        }
    }


    public function getOne()
    {

        try {
            $sql = "SELECT nregas, fecgas, nomgas, valor
                FROM registrogas
                WHERE nregas = :nregas";

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nregas = $this->getNregas();
            $result->bindParam(":nregas", $nregas);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            ManejoError($e);
        }
    }


    public function save()
    {

        try {
            $sql = "INSERT INTO registrogas(fecgas, nomgas, valor)
                VALUES (:fecgas, :nomgas, :valor)";

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $fecgas = $this->getFecgas();
            $nomgas = $this->getNomgas();
            $valor = $this->getValor();
            $result->bindParam(":fecgas", $fecgas);
            $result->bindParam(":nomgas", $nomgas);
            $result->bindParam(":valor", $valor);
            return $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }


    public function upd()
    {

        try {
            $sql = "UPDATE registrogas
                SET fecgas = :fecgas, nomgas = :nomgas, valor = :valor
                WHERE nregas = :nregas";

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);

            $nregas = $this->getNregas();
            $fecgas = $this->getFecgas();
            $nomgas = $this->getNomgas();
            $valor = $this->getValor();

            $result->bindParam(":nregas", $nregas);
            $result->bindParam(":fecgas", $fecgas);
            $result->bindParam(":nomgas", $nomgas);
            $result->bindParam(":valor", $valor);

            return $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }


    public function del()
    {

        try {
            $sql = "DELETE FROM registrogas
                WHERE nregas = :nregas";

            $modelo = new conexion();
            $conexion = $modelo->get_conexion();

            $result = $conexion->prepare($sql);

            $nregas = $this->getNregas();

            $result->bindParam(":nregas", $nregas);

            return $result->execute();
        } catch (Exception $e) {
            ManejoError($e);
        }
    }

}
?>