<?php 
class Periodo{

	private $codigo;
	private $nome;
	

    public function __construct(){
      $this->codigo = " ";
      $this->nome = " ";
      

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

}

?>