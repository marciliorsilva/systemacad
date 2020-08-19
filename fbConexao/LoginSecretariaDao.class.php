<?php
session_start();
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Usuario.class.php";
include_once "../../model/Funcionario.class.php";

/**
* 
*/
class LoginSecretariaDao extends Conexao{
	
  
    
	function __construct(){
      
	}

	public function verificarLogado(){
		if(!isset($_SESSION["logado"])){
			header("Location: ../../index.php");
			exit();
		}
	}

	public function alterarSenha($codigoUsuario, $novaSenha){
		$query = "update usuario set senha='".$novaSenha."' where codigo_usuario =".$codigoUsuario;
		$result = $this->executarQuery($query);
     
        if($result){
         return 1;
        }else{
         return 0;
        }
	}

	public function logar($login,$senha){
		
		$query = "select usuario.codigo_usuario, usuario.senha, usuario.nivelAcesso, funcionario.codigo_funcionario, funcionario.nome,funcionario.sexo, funcionario.email from funcionario inner join usuario on usuario.codigo_usuario = funcionario.codigo_usuario where funcionario.cpf_funcionario ='".$login."'";
		$result = $this->executarQuery($query);	
		
		if(mysqli_num_rows($result) == 1){
		
			$d_usuario = mysqli_fetch_array($result);

			if($d_usuario["senha"] == $senha){

				
				$objFuncionario =  new Funcionario();
				$objUsuario =  new Usuario();

				$objUsuario->setCodigo($d_usuario["codigo_usuario"]);
				$objUsuario->setNivelAcesso($d_usuario["nivelAcesso"]);
				$objFuncionario->setCodigo($d_usuario["codigo_funcionario"]);
				$objFuncionario->setNome($d_usuario["nome"]);
				$objFuncionario->setSexo($d_usuario["sexo"]);
				$objFuncionario->setEmail($d_usuario["email"]);
				$objFuncionario->setObjUsuario($objUsuario);

				$_SESSION["objUser"] = serialize($objFuncionario);
				$_SESSION["logado"] = "sim";
                
				if($senha == '123456'){
                  return 1;
				}else{
                  return null;
				}

			}else{
				$Erro = "Senha incorreta";
				return $Erro;
			}
		}else{
			$Erro = "Usuario ou/e senha incorretos";
			return $Erro;
		};		
	}

	public function getUser(){
		return $_SESSION["objUser"];
	}

	public function deslogar(){
		session_destroy();
		header("Location: ../../index.php");
	}

  
	

	
}

?>