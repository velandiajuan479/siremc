<?php
 class mMatrmat{
    private $nomat;
    private $novig;
    private $fecmat;
    private $folnmat; 
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

    //METODOS GETTERS

        function get_nomat($nomat){
                return $this->nomat;
        }

        function get_novig($novig){
                return $this->novig;
        }

        function get_fecmat($fecmat){
                return $this->fecmat;
        }

        function get_folnmat($folnmat){
                return $this->folnmat;
        }

        function get_inggrado($inggrado){
                return $this->inggrado;
        }

        function get_idest($idest){
                return $this->idest;
        }

        function get_pesmat($pesmat){
                return $this->pesmat;
        }

        function get_estmat($estmat){
                return $this->estmat;
        }

        function get_insedu($insedu){
                return $this->insedu;
        }

        function get_nivel($nivel){
                return $this->nivel;
        }
        function get_grado($grado){
                return $this->grado;
        }
        function get_ano($ano){
                return $this->ano;
        }

        function get_ubimat($ubimat){
                return $this->ubimat;
        }

        function get_actmat($actmat){
                return $this->actmat;
        }

//METODOS SETTERS
      
function setnommat($nomat){
        $this -> nomat = $nomat;
}
function setnovig($novig){
        $this -> novig = $novig;
}
function setfecmat($fecmat){
        $this -> fecmat = $fecmat;
}
function setfolnmat($folnmat){
        $this -> folnmat = $folnmat;
}
function setingrado($inggrado){
        $this -> inggrado = $inggrado;
}
function setidest($idest){
        $this -> idest = $idest;
}
function setpesmat($pesmat){
        $this -> pesmat =$pesmat;
}
function setestmat($estmat){
        $this -> estmat = $estmat;
}
function setinsedu($insedu){
        $this -> insedu = $insedu;
}
function setnivel($nivel){
        $this -> nivel = $nivel;
}
function setgrado($grado){
        $this -> grado = $grado;
}
function setano($ano){
        $this -> ano = $ano;
}
function setactmat($actmat){
        $this -> actmat =$actmat;
}

//METODOS 

public function getALL(){
                $sql = "SELECT M.nomat, M.novig, M.fecmat, M.folnmat, M.inggrado , M.idest, M.pesmat, M.estmat, M.insedu, M.nivel, M.grado, M.ano, M.ubimat, M.actmat, FROM matricula";
                $modelo = new Conexion();
                $conexion =$modelo-> get_Conexion();
                $result = $conexion ->prepare($sql);
                $result->execute();
                return $result->fetchAll(PDO::FETCH_ASSOC);
                
        }
public function getOne(){
        $sql = "SELECT M.nomat, M.novig, M.fecmat, M.folnmat, M.inggrado , M.idest, M.pesmat, M.estmat, M.insedu, M.nivel, M.grado, M.ano, M.ubimat, M.actmat, FROM matricula AS r INNER JOIN
        valor AS M ON M.nomat = () INNER JOIN valor AS r ON
        p.rhper= r.idval WHERE p.idper=idper";
        $modelo = new;
}
public function save(){

}
public function upd(){

}
public function del(){

 

}
?>

       