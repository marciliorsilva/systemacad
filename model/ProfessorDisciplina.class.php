<?php 

include_once "../../model/Professor.class.php";
include_once "../../model/Disciplina.class.php";
class ProfessorDisciplina{


     private $codigo;
     private $objProfessor;
     private $objDisciplina;
     private $qtdeDisciplina;

	

    public function __construct(){
      
      $this->codigo = "";
      $this->objProfessor = new Professor();
      $this->objDisciplina = new Disciplina();
         

    }

   public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getObjProfessor(){
		return $this->objProfessor;
	}

	public function setObjProfessor($objProfessor){
		$this->objProfessor = $objProfessor;
	}

	public function getObjDisciplina(){
		return $this->objDisciplina;
	}

	public function setObjDisciplina($objDisciplina){
		$this->objDisciplina = $objDisciplina;
	}

	public function getQtdeDisciplina(){
		return $this->qtdeDisciplina;
	}

	public function setQtdeDisciplina($qtdeDisciplina){
		$this->qtdeDisciplina = $qtdeDisciplina;
	}
	


	
}

?>