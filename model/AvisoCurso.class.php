<?php 
include_once "../../model/Aviso.class.php";
include_once "../../model/Curso.class.php";

class AvisoCurso{

	private $codigo;
	private $objCurso;
	private $objAviso;
	private $assuntosRepetidos;
	
	
	

    public function __construct(){

      $this->codigo = " ";
      $this->objCurso = new Curso();
      $this->objAviso  = new Aviso();
      $this->assuntosRepetidos = " ";
      
      

    }
   
    //get e set
	public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getObjCurso(){
		return $this->objCurso;
	}

	public function setObjCurso($objCurso){
		$this->objCurso = $objCurso;
	}

	public function getObjAviso(){
		return $this->objAviso;
	}

	public function setObjAviso($objAviso){
		$this->objAviso = $objAviso;
	}

	public function getAssuntosRepetidos(){
		return $this->assuntosRepetidos;
	}

	public function setAssuntosRepetidos($qtdeAssuntos){
		$this->assuntosRepetidos = $qtdeAssuntos;
	}

}

?>