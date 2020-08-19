<?php 

include_once "../../model/Turma.class.php";
include_once "../../model/Aluno.class.php";
class AlunoTurma{


     private $codigo;
     private $objAluno;
     private $objTurma;
     private $qtdeAlunos;

    

	

    public function __construct(){
      
      $this->codigo = "";
      $this->objAluno = new Aluno();
      $this->objTurma = new Turma();
      $this->qtdeAlunos = "";
         

    }

   public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getObjAluno(){
		return $this->objAluno;
	}

	public function setObjAluno($objAluno){
		$this->objAluno = $objAluno;
	}

	public function getObjTurma(){
		return $this->objTurma;
	}

	public function setObjTurma($objTurma){
		$this->objTurma = $objTurma;
	}

	public function getQtdeAlunos(){
		return $this->qtdeAlunos;
	}

	public function setQtdeAlunos($qtdeAlunos){
		$this->qtdeAlunos = $qtdeAlunos;
	}


	
	
}

?>