<?php 

include_once "../../model/Usuario.class.php";
class Funcionario{

    private $codigo;
	private $nome;
	private $cpf;
	private $rg;
	private $dataNascimento;
	private $sexo;
	private $cidade;
	private $bairro;
	private $uf;
	private $logradouro;
	private $numero;
	private $email;
	private $telefone;
	private $objUsuario;
	

    public function __construct(){
      $this->codigo = " ";
      $this->nome = " ";
      $this->cpf = " ";
      $this->rg = " ";
      $this->dataNascimento = " ";
      $this->sexo = " ";
      $this->cidade = "";
	  $this->bairro = "";
	  $this->uf = "";
	  $this->logradouro="";
	  $this->numero="";
      $this->email = " ";
      $this->telefone = " ";
      $this->objUsuario = new Usuario();
         

    }

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

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getRg(){
		return $this->rg;
	}

	public function setRg($rg){
		$this->rg = $rg;
	}

	public function getDataNascimento(){
		return $this->dataNascimento;
	}

	public function setDataNascimento($dataNascimento){
		$this->dataNascimento = $dataNascimento;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getUf(){
		return $this->uf;
	}

	public function setUf($uf){
		$this->uf = $uf;
	}

	public function getLogradouro(){
		return $this->logradouro;
	}

	public function setLogradouro($logradouro){
		$this->logradouro = $logradouro;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getObjUsuario(){
		return $this->objUsuario;
	}

	public function setObjUsuario($objUsuario){
		$this->objUsuario = $objUsuario;
	}
    
}

?>