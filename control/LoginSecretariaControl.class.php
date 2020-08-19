<?php
include_once "../../fbConexao/LoginSecretariaDao.class.php";
/**
* 
*/
class LoginSecretariaControl{

	
	
	public function __construct(){

	}

	public function verificarLogado(){
		$objDao = new LoginSecretariaDao();
		return $objDao->verificarLogado();
	}

	public function alterarSenha($codigoUsuario,$novaSenha){
		$objDao = new LoginSecretariaDao();
		return $objDao->alterarSenha($codigoUsuario,$novaSenha);
	}

	public function logar($user,$password){
		$objDao = new LoginSecretariaDao();
		return $objDao->logar($user,$password);
	}

	public function getUser(){
		$objDao = new LoginSecretariaDao();
		return $objDao->getUser();
	}

	public function deslogar(){
		$objDao = new LoginSecretariaDao();
		$objDao->deslogar();
	}

 

}

?>