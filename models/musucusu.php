<?php
class mUsuper {
    // Atributos de Persona (Estudiante)
    private $idper;
    private $nuiper;
    private $nomper;
    private $papeper;
    private $fnacper;
    private $aleper;
    private $telcper;
    private $emaper;
    private $actper;

    // Atributos Adicionales para el flujo de Matrícula
    private $grado;
    private $fecmat;

    // GETTERS Y SETTERS
    function getIdper() { return $this->idper; }
    function setIdper($idper) { $this->idper = $idper; }

    function getNuiper() { return $this->nuiper; }
    function setNuiper($nuiper) { $this->nuiper = $nuiper; }

    function getNomper() { return $this->nomper; }
    function setNomper($nomper) { $this->nomper = $nomper; }

    function getPapeper() { return $this->papeper; }
    function setPapeper($papeper) { $this->papeper = $papeper; }

    function getFnacper() { return $this->fnacper; }
    function setFnacper($fnacper) { $this->fnacper = $fnacper; }

    function getAleper() { return $this->aleper; }
    function setAleper($aleper) { $this->aleper = $aleper; }

    function getTelcper() { return $this->telcper; }
    function setTelcper($telcper) { $this->telcper = $telcper; }

    function getEmaper() { return $this->emaper; }
    function setEmaper($emaper) { $this->emaper = $emaper; }

    function getActper() { return $this->actper; }
    function setActper($actper) { $this->actper = $actper; }

    function getGrado() { return $this->grado; }
    function setGrado($grado) { $this->grado = $grado; }

    function getFecmat() { return $this->fecmat; }
    function setFecmat($fecmat) { $this->fecmat = $fecmat; }


    // Helper: genera el siguiente número de matrícula (MAX + 1)
    private function siguienteNomat($conexion) {
        $stmt = $conexion->query("SELECT COALESCE(MAX(nomat), 0) + 1 AS siguiente FROM matricula");
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila['siguiente'];
    }


    // MÉTODO: OBTENER TODOS LOS REGISTROS REALES DE MATRÍCULAS CON SUS ESTUDIANTES
    public function getAllMatriculas() {
        $sql = "SELECT p.nuiper, CONCAT(p.nomper, ' ', p.papeper) AS nomper, p.emaper, p.telcper, m.nomat, m.grado, m.fecmat, m.actmat 
                FROM matricula AS m 
                INNER JOIN persona AS p ON m.idest = p.idper 
                ORDER BY m.fecmat DESC";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // MÉTODO: ACCIÓN GUARDAR DESDE EL FORMULARIO INDIVIDUAL
    public function saveIndividual() {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        try {
            $conexion->beginTransaction();

            // 1. Insertar Estudiante en tabla 'persona'
            $sqlPersona = "INSERT INTO persona (nuiper, nomper, papeper, fnacper, aleper, telcper, emaper, actper) 
                           VALUES (:nuiper, :nomper, :papeper, :fnacper, :aleper, :telcper, :emaper, :actper)";
            $stmtP = $conexion->prepare($sqlPersona);
            $stmtP->bindValue(":nuiper", $this->nuiper);
            $stmtP->bindValue(":nomper", $this->nomper);
            $stmtP->bindValue(":papeper", $this->papeper);
            $stmtP->bindValue(":fnacper", $this->fnacper);
            $stmtP->bindValue(":aleper", $this->aleper);
            $stmtP->bindValue(":telcper", $this->telcper);
            $stmtP->bindValue(":emaper", $this->emaper);
            $stmtP->bindValue(":actper", $this->actper);
            $stmtP->execute();

            $lastIdest = $conexion->lastInsertId();

            // 2. Generar el número de matrícula e insertar la matrícula
            $nomat = $this->siguienteNomat($conexion);

            $sqlMatricula = "INSERT INTO matricula (nomat, novig, fecmat, folnmat, inggrado, idest, grado, actmat) 
                             VALUES (:nomat, 1, :fecmat, 1, 1, :idest, :grado, :actmat)";
            $stmtM = $conexion->prepare($sqlMatricula);
            $stmtM->bindValue(":nomat", $nomat);
            $stmtM->bindValue(":fecmat", $this->fecmat);
            $stmtM->bindValue(":idest", $lastIdest);
            $stmtM->bindValue(":grado", $this->grado);
            $stmtM->bindValue(":actmat", $this->actper);
            $stmtM->execute();

            $conexion->commit();
            return true;
        } catch (Exception $e) {
            $conexion->rollBack();
            return false;
        }
    }

    // MÉTODO: CARGA MASIVA DESDE ARCHIVO CSV
    public function importFromCSV($filePath) {
        $response = ['status' => 'success', 'count' => 0, 'errors' => []];
        
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            fgetcsv($handle, 1000, ";"); // Omitir cabecera

            $modelo = new Conexion();
            $conexion = $modelo->get_conexion();

            try {
                $conexion->beginTransaction();

                $sqlP = "INSERT INTO persona (nuiper, nomper, papeper, fnacper, aleper, telcper, emaper, actper) 
                         VALUES (:nuiper, :nomper, :papeper, :fnacper, :aleper, :telcper, :emaper, :actper)";
                $stmtP = $conexion->prepare($sqlP);

                $sqlM = "INSERT INTO matricula (nomat, novig, fecmat, folnmat, inggrado, idest, grado, actmat) 
                         VALUES (:nomat, 1, :fecmat, 1, 1, :idest, :grado, :actmat)";
                $stmtM = $conexion->prepare($sqlM);

                // Número de matrícula base (se va incrementando en el bucle)
                $nomat = $this->siguienteNomat($conexion);

                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    if (count($data) >= 8) {
                        $nuiper  = trim($data[0]);
                        $nombreCompleto = trim($data[1]);
                        
                        $partes = explode(" ", $nombreCompleto, 2);
                        $nomper  = $partes[0];
                        $papeper = isset($partes[1]) ? $partes[1] : 'S/A';

                        $fnacper = trim($data[2]);
                        $aleper  = trim($data[3]);
                        $telcper = trim($data[4]);
                        $emaper  = trim($data[5]);
                        $grado   = trim($data[6]);
                        $fecmat  = trim($data[7]);
                        $actmat  = (isset($data[8]) && trim($data[8]) === 'Inactivo') ? 0 : 1;

                        // Insertar Persona
                        $stmtP->bindValue(":nuiper", $nuiper);
                        $stmtP->bindValue(":nomper", $nomper);
                        $stmtP->bindValue(":papeper", $papeper);
                        $stmtP->bindValue(":fnacper", $fnacper);
                        $stmtP->bindValue(":aleper", $aleper);
                        $stmtP->bindValue(":telcper", $telcper);
                        $stmtP->bindValue(":emaper", $emaper);
                        $stmtP->bindValue(":actper", $actmat);
                        $stmtP->execute();

                        $lastId = $conexion->lastInsertId();

                        // Insertar Matrícula asociada con su número generado
                        $stmtM->bindValue(":nomat", $nomat);
                        $stmtM->bindValue(":fecmat", $fecmat);
                        $stmtM->bindValue(":idest", $lastId);
                        $stmtM->bindValue(":grado", $grado);
                        $stmtM->bindValue(":actmat", $actmat);
                        $stmtM->execute();

                        $nomat++; // siguiente matrícula para la próxima fila
                        $response['count']++;
                    }
                }
                $conexion->commit();
            } catch (Exception $e) {
                $conexion->rollBack();
                $response['status'] = 'error';
                $response['errors'][] = "Error de base de datos: " . $e->getMessage();
            }
            fclose($handle);
        }
        return $response;
    }
}
?>