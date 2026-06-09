<?php
class mCuedgf{

  

//Atributos

   private $nregas;
   private $fecgas;
   private $nomgas;
   private $valor;

//gets

   Function getNregas(){
   return $this->nregas;

}


   Function getFecgas(){
   return $this->fecgas;
}

   Function getNomgas(){
   return $this->nomgas;
}

   Function getValor(){
   return $this->valor;
}


//SetTers


Function setNregas($nregas){
   $this->nregas = $nregas;
}

Function setFecgas($fecgas){
   $this->fecgas = $fecgas;
}


Function setNomgas($nomgas){
   $this->nomgas = $nomgas;
}


Function setValor($valor){
   $this->valor = $valor;
}



public function getAll(){

   try{

     $sql = "SELECT nregas, fecgas, nomgas, valor FROM registrogas ";

     $modelo = new conexion();
     $conexion = $modelo -> get_conexion();
     $result = $conexion -> prepare($sql);
     $result -> execute();
     return $result -> fetchAll(PDO::FETCH_ASSOC);

   }catch(Exception $e){
      $misfun = new misFun();
      $misfun->ManejoError($e);
   }
}


public function getOne(){

   try{

    $sql= "SELECT nregas, fecgas, nomgas, valor FROM registrogas Where nregas = :nregas";


    $modelo = new conexion();
    $conexion = $modelo -> get_conexion();
    $result = $conexion -> prepare($sql);
    $nregas = $this ->getNregas();
    $result ->bindParam (':nregas',$nregas);
    $result ->execute();
    return $result -> fetchALL(PDO::FETCH_ASSOC);

   }catch(Exception $e){
       $misfun = new misFun();
      $misfun->ManejoError($e);
   }
}


public function save(){

   try{

    $sql = "INSERT INTO registrogas (nregas, fecgas, nomgas, valor) VALUES (:nregas, :fecgas, :nomgas, :valor)";

    $modelo = new Conexion();
    $conexion = $modelo->get_conexion();
    $result = $conexion->prepare($sql);

    $nregas = $this->getNregas();
    $result->bindParam(":nregas", $nregas);

    $fecgas = $this->getFecgas();
    $result->bindParam(":fecgas", $fecgas);

    $nomgas = $this->getNomgas();
    $result->bindParam(":nomgas", $nomgas);

    $valor = $this->getValor();
    $result->bindParam(":valor", $valor);

    $result->execute();

    }catch(Exception $e){
       $misfun = new misFun();
      $misfun->ManejoError($e);
   }
}

public function upd(){

   try{


    $sql = "UPDATE registrogas SET fecgas=:fecgas, nomgas=:nomgas, valor=:valor  WHERE nregas=:nregas";


     $modelo = new Conexion();
     $conexion = $modelo->get_conexion();
     $result = $conexion->prepare($sql);

     $nregas = $this->getNregas();
     $result->bindParam(":nregas", $nregas);

     $fecgas = $this->getFecgas();
     $result->bindParam(":fecgas", $fecgas);

     $nomgas = $this->getNomgas();
    $result->bindParam(":nomgas", $nomgas);

     $valor = $this->getValor();
     $result->bindParam(":valor", $valor);


     $result->execute();

    }catch(Exception $e){
      $misfun = new misFun();
      $misfun->ManejoError($e);
   }



}

public function del(){

   try{

    $sql = "DELETE FROM registrogas WHERE nregas = :nregas";
 
   
      $modelo = new Conexion();
      $conexion = $modelo->get_conexion();
      $result = $conexion->prepare($sql);
 
      $nregas = $this->getNregas();
      $result->bindParam(":nregas", $nregas);
 
      $result->execute();  

      }catch(Exception $e){
       $misfun = new misFun();
      $misfun->ManejoError($e);
   }
}



}
?>