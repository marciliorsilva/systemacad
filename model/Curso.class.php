<?php 
class Curso{

	private $codigo;
	private $nome;
	private $cargaHoraria;
	private $turno;
	private $quantidadePeriodo;


    public function __construct(){
      $this->codigo = " ";
      $this->nome = " ";
      $this->cargaHoraria = " ";
      $this->turno = " ";
      $this->quantidadePeriodo = " ";

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

	public function getCargaHoraria(){
		return $this->cargaHoraria;
	}

	public function setCargaHoraria($cargaHoraria){
		$this->cargaHoraria = $cargaHoraria;
	}

	public function getTurno(){
		return $this->turno;
	}

	public function setTurno($turno){
		$this->turno = $turno;
	}

	public function getQuantidadePeriodo(){
		return $this->quantidadePeriodo;
	}

	public function setQuantidadePeriodo($quantidadePeriodo){
		$this->quantidadePeriodo = $quantidadePeriodo;
	}


}

?>