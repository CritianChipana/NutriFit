<?php 

class Perfil2{

    private $idhistorial; 
    private $peso; 
    private $altura; 
    private $imc; 
    private $descripcion; 
    private $fecha;
    
    public function getIdhistorial(){
        return $this->idhistorial;
    }

    public function setIdhistorial($idhistorial){
        $this->idhistorial = $idhistorial;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function setPeso($peso){
        $this->peso = $peso;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function setAltura($altura){
        $this->altura = $altura;
    }
    public function getImc(){
        return $this->imc;
    }

    public function setImc($imc){
        $this->imc = $imc;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function getFecha(){
        return $this->fecha;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

}

?>