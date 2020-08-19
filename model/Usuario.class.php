<?php 
class Usuario{

	private $codigo;
	private $senha;
	private $tipoAcesso;
	

    public function __construct(){
      $this->codigo = " ";
      $this->senha = " ";
      $this->tipoAcesso = " ";
      

    }

  
    
    
   
    //get e set
	public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	
	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}


	public function getNivelAcesso(){
		return $this->nivelAcesso;
	}

	public function setNivelAcesso($nivelAcesso){
		$this->nivelAcesso = $nivelAcesso;
	}

}

?>