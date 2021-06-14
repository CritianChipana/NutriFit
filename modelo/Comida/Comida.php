<?php 
class Comida{
    private $idcomidas;
	private $nombre;
	private $ingredientes;
    private $descripcion;
    private $preparacion;
	private $imagen;
	private $video;
	private $estadofav;
    private $iddiagnostico;
    public function getIdcomidas(){
		return $this->idcomidas;
	}

	public function setIdcomidas($idcomidas){
		$this->idcomidas = $idcomidas;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getIngredientes(){
		return $this->ingredientes;
	}

	public function setIngredientes($ingredientes){
		$this->ingredientes = $ingredientes;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getPreparacion(){
		return $this->preparacion;
	}

	public function setPreparacion($preparacion){
		$this->preparacion = $preparacion;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
	}

	public function getVideo(){
		return $this->video;
	}

	public function setVideo($video){
		$this->video = $video;
	}

	public function getEstadofav(){
		return $this->estadofav;
	}

	public function setEstadofav($estadofav){
		$this->estadofav = $estadofav;
	}

	public function getIddiagnostico(){
		return $this->iddiagnostico;
	}

	public function setIddiagnostico($iddiagnostico){
		$this->iddiagnostico = $iddiagnostico;
	}
    
}

?>