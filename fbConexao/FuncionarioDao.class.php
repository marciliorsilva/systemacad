<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Funcionario.class.php";
include_once "../../model/Usuario.class.php";

/**
* 
*/
class FuncionarioDao extends Conexao{
	
  
    
	function __construct(){
      
	}


	public function listaFuncionarios(){
      
      $query = "select * from funcionario";
      $result = $this->executarQuery($query);
      $retornoFuncionarios = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         $objFuncionario = new Funcionario();
         $objFuncionario->setCodigo($row['codigo_funcionario']);
         $objFuncionario->setCpf($row['cpf_funcionario']);
         $objFuncionario->setNome($row['nome']);
         $objFuncionario->setRg($row['rg']);
         $objFuncionario->setDataNascimento($row['dtNascimento']);
         $objFuncionario->setSexo($row['sexo']);
         $objFuncionario->setCidade($row['cidade']);
         $objFuncionario->setBairro($row['bairro']);
         $objFuncionario->setUf($row['uf']);
         $objFuncionario->setLogradouro($row['logradouro']);
         $objFuncionario->setNumero($row['numero']);
         $objFuncionario->setEmail($row['email']);
         $objFuncionario->setTelefone($row['telefone']);
         $retornoFuncionarios[]=$objFuncionario;
        }
      }

      return $retornoFuncionarios;


  }

	public function selectFuncionario($codigoFuncionario){
     $query = "select *, usuario.senha, usuario.nivelAcesso from funcionario inner join usuario on funcionario.codigo_usuario = usuario.codigo_usuario where funcionario.codigo_funcionario=".$codigoFuncionario;
     $result = $this->executarQuery($query);
     $objFuncionario = new Funcionario();
     $objUsuario = new Usuario();

     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         $objUsuario->setCodigo($row['codigo_usuario']);
         $objUsuario->setSenha($row['senha']);
         $objUsuario->setNivelAcesso($row['nivelAcesso']);
                  
         $objFuncionario->setCodigo($row['codigo_funcionario']);
         $objFuncionario->setCpf($row['cpf_funcionario']);
         $objFuncionario->setNome($row['nome']);
         $objFuncionario->setRg($row['rg']);
         $objFuncionario->setDataNascimento($row['dtNascimento']);
         $objFuncionario->setSexo($row['sexo']);
         $objFuncionario->setCidade($row['cidade']);
         $objFuncionario->setBairro($row['bairro']);
         $objFuncionario->setUf($row['uf']);
         $objFuncionario->setLogradouro($row['logradouro']);
         $objFuncionario->setNumero($row['numero']);
         $objFuncionario->setEmail($row['email']);
         $objFuncionario->setTelefone($row['telefone']);
         $objFuncionario->setObjUsuario($objUsuario);
         
         
        }
      }
     return $objFuncionario;
	}

	public function insertFuncionario($objFuncionario){
      
        
       $query = "insert into funcionario(cpf_funcionario,nome,rg,dtNascimento,sexo,cidade,bairro,uf,logradouro,numero,email,telefone,codigo_usuario)values('".$objFuncionario->getCpf()."','".$objFuncionario->getNome()."','".$objFuncionario->getRg()."','".$objFuncionario->getDataNascimento()."','".$objFuncionario->getSexo()."','".$objFuncionario->getCidade()."','".$objFuncionario->getBairro()."','".$objFuncionario->getUf()."','".$objFuncionario->getLogradouro()."','".$objFuncionario->getNumero()."','".$objFuncionario->getEmail()."','".$objFuncionario->getTelefone()."',".$objFuncionario->getObjUsuario()->getCodigo().")";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}

	public function updateFuncionario($objFuncionario){
     $query = "update funcionario set  cpf_funcionario='".$objFuncionario->getCpf()."',nome='".$objFuncionario->getNome()."', rg='".$objFuncionario->getRg()."', dtNascimento='".$objFuncionario->getDataNascimento()."', sexo='".$objFuncionario->getSexo()."', cidade='".$objFuncionario->getCidade()."' , bairro='".$objFuncionario->getBairro()."' , uf='".$objFuncionario->getUf()."' , logradouro='".$objFuncionario->getLogradouro()."' , numero='".$objFuncionario->getNumero()."' , email='".$objFuncionario->getEmail()."' , telefone='".$objFuncionario->getTelefone()."' where codigo_funcionario=".$objFuncionario->getCodigo();
      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deleteFuncionario($codigoFuncionario){
      $query = "delete from funcionario where codigo_funcionario=".$codigoFuncionario;
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>