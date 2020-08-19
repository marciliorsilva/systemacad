<?php 
include_once "../../model/Aluno.class.php";
include_once "../../model/Curso.class.php";

class Matricula{

	private $codigo;
	private $objCurso;
	private $objAluno;
	private $data;
	
	
	

    public function __construct(){
      $this->codigo = " ";
      $this->objCurso = new Curso();
      $this->objAluno  = new Aluno();
      $this->data = " ";
      

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

	public function getObjAluno(){
		return $this->objAluno;
	}

	public function setObjAluno($objAluno){
		$this->objAluno = $objAluno;
	}


	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}
}

?>