<?php
include_once "../../fbConexao/UsuarioDao.class.php";
include_once "../../model/Usuario.class.php";
/**
* 
*/
class UsuarioControl{

	
	
	public function __construct(){

	}

 

	public function validarAcesso($user,$password){
		 $objDao = new UsuarioDao();
		 $retorno = $objDao->validarAcesso($user,$password);
		 return $retorno;
		 
	}
	public function listaUsuarios(){
      $objDao = new UsuarioDao();
      $retornoLista = $objDao->listaUsuarios();
      foreach ($retornoLista as $obj) {
      	echo '<tr id='.$obj->getCodigo().'>';
      	   echo "<td width='200px'>".$obj->getCodigo()."</td>";
      	   echo "<td>".$obj->getSenha()."</td>";
      	   echo "<td>".$obj->getNivelAcesso()."</td>";
      	echo "</tr>";

      }


	}
	
	public function selectUsuario($codigoUsuario){
	   $objDao = new UsuarioDao();
       return $objDao->selectUsuario($codigoUsuario);
	}

	public function insertUsuario($senha,$nivelAcesso){
	   $objDao = new UsuarioDao();
	   $objModel = new Usuario();
	   $objModel->setSenha($senha);
	   $objModel->setNivelAcesso($nivelAcesso);
       $retorno = $objDao->insertUsuario($objModel);
       return $retorno;

	}

	public function updateUsuario($codigo,$senha,$nivelAcesso){
       $objDao = new UsuarioDao();
	   $objModel = new Usuario();
	   $objModel->setCodigo($codigo);
	   $objModel->setSenha($senha);
	   $objModel->setNivelAcesso($nivelAcesso);
       $retorno = $objDao->updateUsuario($objModel);
       return $retorno;
	}

	public function deleteUsuario($codigoUsuario){
	   $objDao = new UsuarioDao();
       $retorno = $objDao->deleteUsuario($codigoUsuario);
       return $retorno;
	}
	

}

?>