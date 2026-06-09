<?php
class mCuerixg {
    // Propiedades privadas 
    private $nogas;
    private $nomgas;
    private $valgas;
    private $tipomov; 

    // Métodos Get y Set tradicionales
    public function getNogas() {
        return $this->nogas;
    }
    public function setNogas($nogas) {
        $this->nogas = $nogas;
    }

    public function getNomgas() {
        return $this->nomgas;
    }
    public function setNomgas($nomgas) {
        $this->nomgas = $nomgas;
    }

    public function getValgas() {
        return $this->valgas;
    }
    public function setValgas($valgas) {
        $this->valgas = $valgas;
    }

    public function getTipomov() {
        return $this->tipomov;
    }
    public function setTipomov($tipomov) {
        $this->tipomov = $tipomov;
    }

    // Función para Insertar un nuevo Registro
    public function Save() {
        try{
            $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        // Apunta a gastofijo
        $sql = "INSERT INTO gastofijo (nogas, nomgas, valgas, tipomov) VALUES (:nogas, :nomgas, :valgas, :tipomov)";
        
        $result = $conexion->prepare($sql);
        
        $result->bindParam(':nogas', $this->nogas);
        $result->bindParam(':nomgas', $this->nomgas);
        $result->bindParam(':valgas', $this->valgas);
        $result->bindParam(':tipomov', $this->tipomov);
        
        $result->execute();
        
        }catch (Exception $e){
            $misFun = new misFun();
            $misFun->ManejoError ($e);
    }

    // Función para Seleccionar y Listar todos los Registros
    }
    public function getAll(){
        // Consulta directa a la tabla gastofijo sin JOINs

    $sql = "SELECT gf.nogas, gf.nomgas, gf.valgas FROM gastofijo AS gf";
    try{
    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $result = $conexion->prepare($sql);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);  
    }catch (Exception $e){
        $misFun = new misFun();
        $misFun->ManejoError ($e);
        }
    }
    // Función para Eliminar un Registro
    public function Del() {
        try{
            $modelo = new Conexion();
        $conexion = $modelo->get_conexion();

        // CORREGIDO: Ahora apunta a gastofijo
        $sql = "DELETE FROM gastofijo WHERE nogas = :nogas";
        
        $result = $conexion->prepare($sql);
        $result->bindParam(':nogas', $this->nogas);
        
        $result->execute();
        }catch (Exception $e){
            $misFun = new misFun();
            $misFun->ManejoError ($e);
        }
    }
    }
?>