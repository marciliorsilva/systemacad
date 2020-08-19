<?php 
include_once "../../model/CursoDisciplina.class.php";
include_once "../../model/ProfessorDisciplina.class.php";
class Turma{

	private $codigo;
	private $nome;
	private $horasAulaDia;
	private $qtdeAulaSemana;
	private $dataInicio;
	private $dataFim;
	private $objCursoDisciplina;
	private $objProfessorDisciplina;


    public function __construct(){
      $this->codigo = " ";
      $this->nome = " ";
      $this->horasAulaDia = " ";
      $this->qtdeAulaSemana = " ";
      $this->dataInicio = " ";
      $this->dataFim = " ";
      $this->objCursoDisciplina = new CursoDisciplina();
      $this->objProfessorDisciplina = new ProfessorDisciplina();

    }
    
    
   
    //get e set
	public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getHorasAulaDia(){
		return $this->horasAulaDia;
	}

	public function setHorasAulaDia($horasAulaDia){
		$this->horasAulaDia = $horasAulaDia;
	}

	public function getQtdeAulaSemana(){
		return $this->qtdeAulaSemana;
	}

	public function setQtdeAulaSemana($qtdeAulaSemana){
		$this->qtdeAulaSemana = $qtdeAulaSemana;
	}

	public function getDataInicio(){
		return $this->dataInicio;
	}

	public function setDataInicio($dataInicio){
		$this->dataInicio = $dataInicio;
	}

	public function getDataFim(){
		return $this->dataFim;
	}

	public function setDataFim($dataFim){
		$this->dataFim = $dataFim;
	}

	public function getObjCursoDisciplina(){
		return $this->objCursoDisciplina;
	}

	public function setObjCursoDisciplina($objCursoDisciplina){
		$this->objCursoDisciplina = $objCursoDisciplina;
	}

	public function getObjProfessorDisciplina(){
		return $this->objProfessorDisciplina;
	}

	public function setObjProfessorDisciplina($objProfessorDisciplina){
		$this->objProfessorDisciplina = $objProfessorDisciplina;
	}

}

?>