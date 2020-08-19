<?php 
include_once "../../model/Periodo.class.php";
include_once "../../model/Disciplina.class.php";
include_once "../../model/Curso.class.php";

class CursoDisciplina{

	private $codigo;
	private $objCurso;
	private $objDisciplina;
	private $objPeriodo ;
	private $cargaHoraria;
	
	

    public function __construct(){
      $this->codigo = " ";
      $this->objCurso = new Curso();
      $this->objDisciplina  = new Disciplina();
      $this->objPeriodo= new Periodo();
      $this->cargaHoraria = " ";
      

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

	public function getObjDisciplina(){
		return $this->objDisciplina;
	}

	public function setObjDisciplina($objDisciplina){
		$this->objDisciplina = $objDisciplina;
	}

	public function getObjPeriodo(){
		return $this->objPeriodo;
	}

	public function setObjPeriodo($objPeriodo){
		$this->objPeriodo = $objPeriodo;
	}

	public function getCargaHoraria(){
		return $this->cargaHoraria;
	}

	public function setCargaHoraria($cargaHoraria){
		$this->cargaHoraria = $cargaHoraria;
	}
}

?>