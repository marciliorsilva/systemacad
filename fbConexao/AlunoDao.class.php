<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Aluno.class.php";
include_once "../../model/Usuario.class.php";

/**
* 
*/
class AlunoDao extends Conexao{
	
  
    
	function __construct(){
      
	}


	public function listaAlunos(){
      
      $query = "select * from aluno";
      $result = $this->executarQuery($query);
      $retornoAlunos = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         $objAluno = new Aluno();
         $objUsuario = new Usuario();
         $objUsuario->setCodigo($row['codigo_usuario']);
         $objAluno->setCodigo($row['codigo_aluno']);
         $objAluno->setCpf($row['cpf_aluno']);
         $objAluno->setNome($row['nome']);
         $objAluno->setRg($row['rg']);
         $objAluno->setDataNascimento($row['dtNascimento']);
         $objAluno->setSexo($row['sexo']);
         $objAluno->setCidade($row['cidade']);
         $objAluno->setBairro($row['bairro']);
         $objAluno->setUf($row['uf']);
         $objAluno->setLogradouro($row['logradouro']);
         $objAluno->setNumero($row['numero']);
         $objAluno->setEmail($row['email']);
         $objAluno->setTelefone($row['telefone']);
         $objAluno->setObjUsuario($objUsuario);
         $retornoAlunos[]=$objAluno;
        }
      }

      return $retornoAlunos;


  }

	public function selectAluno($codigoAluno){
     $query = "select *, usuario.senha, usuario.nivelAcesso from aluno inner join usuario on aluno.codigo_usuario = usuario.codigo_usuario where aluno.codigo_aluno=".$codigoAluno;
     $result = $this->executarQuery($query);
     $objAluno = new Aluno();
     $objUsuario = new Usuario();

     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         $objUsuario->setCodigo($row['codigo_usuario']);
         $objUsuario->setSenha($row['senha']);
         $objUsuario->setNivelAcesso($row['nivelAcesso']);
                  
         $objAluno->setCodigo($row['codigo_aluno']);
         $objAluno->setCpf($row['cpf_aluno']);
         $objAluno->setNome($row['nome']);
         $objAluno->setRg($row['rg']);
         $objAluno->setDataNascimento($row['dtNascimento']);
         $objAluno->setSexo($row['sexo']);
         $objAluno->setCidade($row['cidade']);
         $objAluno->setBairro($row['bairro']);
         $objAluno->setUf($row['uf']);
         $objAluno->setLogradouro($row['logradouro']);
         $objAluno->setNumero($row['numero']);
         $objAluno->setEmail($row['email']);
         $objAluno->setTelefone($row['telefone']);
         $objAluno->setObjUsuario($objUsuario);
         
         
        }
      }
     return $objAluno;
	}

	public function insertAluno($objAluno){
      
        
       $query = "insert into aluno(cpf_aluno,nome,rg,dtNascimento,sexo,cidade,bairro,uf,logradouro,numero,email,telefone,codigo_usuario)values('".$objAluno->getCpf()."','".$objAluno->getNome()."','".$objAluno->getRg()."','".$objAluno->getDataNascimento()."','".$objAluno->getSexo()."','".$objAluno->getCidade()."','".$objAluno->getBairro()."','".$objAluno->getUf()."','".$objAluno->getLogradouro()."','".$objAluno->getNumero()."','".$objAluno->getEmail()."','".$objAluno->getTelefone()."',".$objAluno->getObjUsuario()->getCodigo().")";
       $result = $this->retornarUltimoId($query);
       if($result){
         return $result;
       }else{
         return 0;
       }

	}

	public function updateAluno($objAluno){
     $query = "update aluno set  cpf_aluno='".$objAluno->getCpf()."',nome='".$objAluno->getNome()."', rg='".$objAluno->getRg()."', dtNascimento='".$objAluno->getDataNascimento()."', sexo='".$objAluno->getSexo()."', cidade='".$objAluno->getCidade()."' , bairro='".$objAluno->getBairro()."' , uf='".$objAluno->getUf()."' , logradouro='".$objAluno->getLogradouro()."' , numero='".$objAluno->getNumero()."' , email='".$objAluno->getEmail()."' , telefone='".$objAluno->getTelefone()."' where codigo_aluno=".$objAluno->getCodigo();
      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deleteAluno($codigoAluno){
      $query = "delete from aluno where codigo_aluno=".$codigoAluno;
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>