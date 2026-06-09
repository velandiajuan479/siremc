<?php
require_once("conexion.php");

class mCueFac
{
    private $nofact;
    private $idest;
    private $idemp;
    private $fecha;
    private $fecven;
    private $cn;

    public function __construct()
    {
        $modelo = new Conexion();
        $this->cn = $modelo->get_conexion();
    }

    function getNoFact()
    {
        return $this->nofact;
    }
    function setNoFact($nofact)
    {
        $this->nofact = $nofact;
    }

    function getIdest()
    {
        return $this->idest;
    }
    function setIdest($idest)
    {
        $this->idest = $idest;
    }

    function getIdemp()
    {
        return $this->idemp;
    }
    function setIdemp($idemp)
    {
        $this->idemp = $idemp;
    }

    function getFecha()
    {
        return $this->fecha;
    }
    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function getFecven()
    {
        return $this->fecven;
    }
    function setFecven($fecven)
    {
        $this->fecven = $fecven;
    }


    public function getAll()
    {
        try {
            $sql = "SELECT
                        f.nofact,
                        f.fecha,
                        f.fecven,
                        est.nomper AS nom_est,
                        est.papeper AS ape_est,
                        est.sapeper AS sape_est,
                        est.nuiper AS doc_estudiante,
                        cur.nomcur AS grado,
                        acu.nomper AS nom_acu,
                        acu.papeper AS ape_acu,
                        acu.sapeper AS sape_acu,
                        acu.nuiper AS doc_acudiente,
                        acu.celcper AS tel_acudiente,
                        acu.emaper AS email_acudiente,
                        exa.parexa AS parentesco,
                        CONCAT(emp.nomper,' ',emp.papeper) AS empleado
                    FROM factura f
                    JOIN persona est ON f.idest = est.idper
                    JOIN persona emp ON f.idemp = emp.idper
                    JOIN estxacu exa ON exa.idest = f.idest
                    JOIN persona acu ON exa.idacu = acu.idper
                    LEFT JOIN matricula mat ON mat.idest = f.idest AND mat.actmat = 1
                    LEFT JOIN curso cur ON cur.idcur = mat.idcur
                    ORDER BY f.nofact DESC";

            $result = $this->cn->prepare($sql);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getAll: " . $e->getMessage());
            return [];
        }
    }


    public function getDetalle($nofact)
    {
        try {
            $sql = "SELECT
                        itm.nomitem AS concepto,
                        dite.cant,
                        iv.valor,
                        (dite.cant * iv.valor) AS subtotal
                    FROM detite dite
                    JOIN itemval iv ON iv.noitval = dite.noitval
                    JOIN item itm ON itm.noitem = iv.noitem
                    WHERE dite.nofact = :nofact";

            $result = $this->cn->prepare($sql);
            $result->bindParam(':nofact', $nofact, PDO::PARAM_INT);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getDetalle: " . $e->getMessage());
            return [];
        }
    }


    public function getOne($nofact)
    {
        try {
            $sql = "SELECT
                        f.nofact,
                        f.fecha,
                        f.fecven,
                        est.nomper AS nom_est,
                        est.papeper AS ape_est,
                        est.sapeper AS sape_est,
                        est.nuiper AS doc_estudiante,
                        cur.nomcur AS grado,
                        acu.nomper AS nom_acu,
                        acu.papeper AS ape_acu,
                        acu.sapeper AS sape_acu,
                        acu.nuiper AS doc_acudiente,
                        acu.celcper AS tel_acudiente,
                        acu.emaper AS email_acudiente,
                        exa.parexa AS parentesco,
                        CONCAT(emp.nomper,' ',emp.papeper) AS empleado
                    FROM factura f
                    JOIN persona est ON f.idest = est.idper
                    JOIN persona emp ON f.idemp = emp.idper
                    JOIN estxacu exa ON exa.idest = f.idest
                    JOIN persona acu ON exa.idacu = acu.idper
                    LEFT JOIN matricula mat ON mat.idest = f.idest AND mat.actmat = 1
                    LEFT JOIN curso cur ON cur.idcur = mat.idcur
                    WHERE f.nofact = :nofact";

            $result = $this->cn->prepare($sql);
            $result->bindParam(':nofact', $nofact, PDO::PARAM_INT);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en getOne: " . $e->getMessage());
            return false;
        }
    }


    public function save()
    {
        try {
            $sql = "INSERT INTO factura (idest, idemp, fecha, fecven) VALUES (:idest, :idemp, NOW(), :fecven)";
            $result = $this->cn->prepare($sql);
            $result->bindParam(':idest', $this->idest, PDO::PARAM_INT);
            $result->bindParam(':idemp', $this->idemp, PDO::PARAM_INT);
            $result->bindParam(':fecven', $this->fecven, PDO::PARAM_STR);
            return $result->execute();
        } catch (PDOException $e) {
            error_log("Error en save: " . $e->getMessage());
            return false;
        }
    }


    public function upd()
    {
        try {
            $sql = "UPDATE factura SET idest = :idest, idemp = :idemp, fecha = :fecha, fecven = :fecven WHERE nofact = :nofact";
            $result = $this->cn->prepare($sql);
            $result->bindParam(':nofact', $this->nofact, PDO::PARAM_INT);
            $result->bindParam(':idest', $this->idest, PDO::PARAM_INT);
            $result->bindParam(':idemp', $this->idemp, PDO::PARAM_INT);
            $result->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
            $result->bindParam(':fecven', $this->fecven, PDO::PARAM_STR);
            return $result->execute();
        } catch (PDOException $e) {
            error_log("Error en upd: " . $e->getMessage());
            return false;
        }
    }


    public function del()
    {
        try {
            $sql = "DELETE FROM factura WHERE nofact = :nofact";
            $result = $this->cn->prepare($sql);
            $result->bindParam(':nofact', $this->nofact, PDO::PARAM_INT);
            return $result->execute();
        } catch (PDOException $e) {
            error_log("Error en del: " . $e->getMessage());
            return false;
        }
    }
}
?>