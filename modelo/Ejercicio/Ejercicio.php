<?php 
class Ejercicio{
	private $idejercicio;
    private $nombreE;
    private $tipoE;
    private $videoE;
    private $repeticionesE;
	private $cantidadE;
	private $imgE;
	private $descripcionE;

    public function getIdejercicio(){
        return $this->idejercicio;
    }

    public function setIdejercicio($idejercicio){
        $this->idejercicio = $idejercicio;
    }

    public function getNombreE(){
        return $this->nombreE;
    }

    public function setNombreE($nombreE){
        $this->nombreE = $nombreE;
    }

    public function getTipoE(){
        return $this->tipoE;
    }

    public function setTipoE($tipoE){
        $this->tipoE = $tipoE;
    }

    public function getVideoE(){
        return $this->videoE;
    }

    public function setVideoE($videoE){
        $this->videoE = $videoE;
    }

    public function getRepeticionesE(){
        return $this->repeticionesE;
    }

    public function setRepeticionesE($repeticionesE){
        $this->repeticionesE = $repeticionesE;
    }

    public function getCantidadE(){
        return $this->cantidadE;
    }

    public function setCantidadE($cantidadE){
        $this->cantidadE = $cantidadE;
    }

    public function getImgE(){
        return $this->imgE;
    }

    public function setImgE($imgE){
        $this->imgE = $imgE;
    }

    public function getDescripcionE(){
        return $this->descripcionE;
    }

    public function setDescripcionE($descripcionE){
        $this->descripcionE = $descripcionE;
    }
}

?>