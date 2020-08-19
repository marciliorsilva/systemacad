<?php 
include_once "../../model/Usuario.class.php";

class Aviso{

	private $codigo;
	private $assunto;
	private $data;
	private $img;
	private $mensagem;
	private $objUsuario;
	

	

    public function __construct(){
      $this->codigo = " ";
      $this->assunto = " ";
      $this->data = " ";
      $this->img = " ";
      $this->mensagem = " ";
      $this->objUsuario = new Usuario();
      

    }

  
    
    
   
    //get e set
	public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getAssunto(){
		return $this->assunto;
	}

	public function setAssunto($assunto){
		$this->assunto = $assunto;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function getImg(){
		return $this->img;
	}

	public function setImg($img){
		$this->img = $img;
	}

	public function getMensagem(){
		return $this->mensagem;
	}

	public function setMensagem($mensagem){
		$this->mensagem = $mensagem;
	}

	public function getObjUsuario(){
		return $this->objUsuario;
	}

	public function setObjUsuario($objUsuario){
		$this->objUsuario = $objUsuario;
	}
}

?>