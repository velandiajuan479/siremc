<?php
    class mCuerfac{
//SELECT nofact, idest, idemp, fecha FROM factura
private $nofact;
private $idest;
private $idemp;
private $fecha;
//Métodos get
function getNoFact(){
    return $this->nofact;
}
function getIdest(){
    return $this->idest;
}
function getIdemp(){
    return $this->idemp;
}
function getFecha(){
    return $this->fecha;
}
//Métodos set
function setNoFact($nofact){
    $this->nofact = $nofact;
}
function setIdest($idest){
    $this->idest = $idest;
}
function setIdemp($idemp){
    $this->idemp = $idemp;
}
function setFecha($fecha){
    $this->fecha = $fecha;
}
//Metodos
    // Trae todas las facturas con datos completos (JOINs)
    public function getAll(){
        $sql = "SELECT
                    f.nofact,
                    f.fecha,
                    -- Estudiante
                    CONCAT(est.nomper,' ',est.papeper,' ',IFNULL(est.sapeper,'')) AS estudiante,
                    est.nuiper      AS doc_estudiante,
                    -- Grado (última matrícula activa)
                    cur.nomcur      AS grado,
                    -- Acudiente
                    CONCAT(acu.nomper,' ',acu.papeper,' ',IFNULL(acu.sapeper,'')) AS acudiente,
                    acu.nuiper      AS doc_acudiente,
                    acu.celcper     AS tel_acudiente,
                    acu.emaper      AS email_acudiente,
                    exa.parexa      AS parentesco,
                    -- Empleado que generó la factura
                    CONCAT(emp.nomper,' ',emp.papeper) AS empleado
                FROM factura f
                JOIN persona  est ON f.idest   = est.idper
                JOIN persona  emp ON f.idemp   = emp.idper
                JOIN estxacu  exa ON exa.idest = f.idest
                JOIN persona  acu ON exa.idacu = acu.idper
                LEFT JOIN matricula mat ON mat.idest = f.idest AND mat.actmat = 1
                LEFT JOIN curso     cur ON cur.idcur = mat.idcur";
        $modelo   = new Conexion();
        $conexion = $modelo->get_conexion();
        $result   = $conexion->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Trae el detalle de ítems de una factura específica
    public function getDetalle($nofact){
        $sql = "SELECT
                    itm.nomitem             AS concepto,
                    dite.cant,
                    iv.valor,
                    (dite.cant * iv.valor)  AS subtotal
                FROM detite  dite
                JOIN itemval iv  ON iv.noitval = dite.noitval
                JOIN item    itm ON itm.noitem = iv.noitem
                WHERE dite.nofact = :nofact";
        $modelo   = new Conexion();
        $conexion = $modelo->get_conexion();
        $result   = $conexion->prepare($sql);
        $result->bindParam(':nofact', $nofact, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // ── getOne: trae UNA factura por nofact (con JOINs completos) ────
    public function getOne(){
        $sql = "SELECT
                    f.nofact,
                    f.fecha,
                    CONCAT(est.nomper,' ',est.papeper,' ',IFNULL(est.sapeper,'')) AS estudiante,
                    est.nuiper      AS doc_estudiante,
                    cur.nomcur      AS grado,
                    CONCAT(acu.nomper,' ',acu.papeper,' ',IFNULL(acu.sapeper,'')) AS acudiente,
                    acu.nuiper      AS doc_acudiente,
                    acu.celcper     AS tel_acudiente,
                    acu.emaper      AS email_acudiente,
                    exa.parexa      AS parentesco,
                    CONCAT(emp.nomper,' ',emp.papeper) AS empleado
                FROM factura f
                JOIN persona  est ON f.idest   = est.idper
                JOIN persona  emp ON f.idemp   = emp.idper
                JOIN estxacu  exa ON exa.idest = f.idest
                JOIN persona  acu ON exa.idacu = acu.idper
                LEFT JOIN matricula mat ON mat.idest = f.idest AND mat.actmat = 1
                LEFT JOIN curso     cur ON cur.idcur = mat.idcur
                WHERE f.nofact = :nofact";
        $modelo   = new Conexion();
        $conexion = $modelo->get_conexion();
        $result   = $conexion->prepare($sql);
        $result->bindParam(':nofact', $this->nofact, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    // ── save: inserta una factura nueva (nofact es AUTO_INCREMENT) ───
    public function save(){
        $sql = "INSERT INTO factura (idest, idemp, fecha)
                VALUES (:idest, :idemp, :fecha)";
        $modelo   = new Conexion();
        $conexion = $modelo->get_conexion();
        $result   = $conexion->prepare($sql);
        $result->bindParam(':idest', $this->idest, PDO::PARAM_INT);
        $result->bindParam(':idemp', $this->idemp, PDO::PARAM_INT);
        $result->bindParam(':fecha', $this->fecha,  PDO::PARAM_STR);
        return $result->execute();
    }

    // ── upd: actualiza estudiante, empleado y/o fecha ────────────────
    public function upd(){
        $sql = "UPDATE factura
                SET    idest = :idest,
                    idemp = :idemp,
                    fecha = :fecha
                WHERE  nofact = :nofact";
        $modelo   = new Conexion();
        $conexion = $modelo->get_conexion();
        $result   = $conexion->prepare($sql);
        $result->bindParam(':nofact', $this->nofact, PDO::PARAM_INT);
        $result->bindParam(':idest',  $this->idest,  PDO::PARAM_INT);
        $result->bindParam(':idemp',  $this->idemp,  PDO::PARAM_INT);
        $result->bindParam(':fecha',  $this->fecha,  PDO::PARAM_STR);
        return $result->execute();
    }

    // ── del: elimina una factura por nofact ──────────────────────────
    // ⚠️ Elimina primero el detite relacionado o usa ON DELETE CASCADE
    public function del(){
        $sql = "DELETE FROM factura WHERE nofact = :nofact";
        $modelo   = new Conexion();
        $conexion = $modelo->get_conexion();
        $result   = $conexion->prepare($sql);
        $result->bindParam(':nofact', $this->nofact, PDO::PARAM_INT);
        return $result->execute();
    }
    }
?>