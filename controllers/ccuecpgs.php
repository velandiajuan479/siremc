<?php
require_once("models/mcuecpgs.php");

class Ccuecpgs {

    public function getPersonas(){
    $modelo = new mCuecpgs();
    return $modelo->getPersonas();
}

    public function savePagos($data){
        $modelo = new mCuecpgs();

        $modelo->setnotfact($data["novig"]); 
        $modelo->setidest($data["idest"]);
        $modelo->setidemp($data["act"]);
        $modelo->setfecha($data["fecha_pago"]);

        $modelo->Save();
    }
}
