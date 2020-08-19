<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Professor.class.php";
include_once "../../model/Usuario.class.php";

/**
* 
*/
class ProfessorDao extends Conexao{
	
  
    
	function __construct(){
      
	}


	public function listaProfessores(){
      
      $query = "select * from professor";
      $result = $this->executarQuery($query);
      $retornoProfessores = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         $objProfessor = new Professor();
         $objProfessor->setCodigo($row['codigo_professor']);
         $objProfessor->setCpf($row['cpf_professor']);
         $objProfessor->setNome($row['nome']);
         $objProfessor->setRg($row['rg']);
         $objProfessor->setDataNascimento($row['dtNascimento']);
         $objProfessor->setSexo($row['sexo']);
         $objProfessor->setCidade($row['cidade']);
         $objProfessor->setBairro($row['bairro']);
         $objProfessor->setUf($row['uf']);
         $objProfessor->setLogradouro($row['logradouro']);
         $objProfessor->setNumero($row['numero']);
         $objProfessor->setEmail($row['email']);
         $objProfessor->setTelefone($row['telefone']);
         $retornoProfessores[]=$objProfessor;
        }
      }

      return $retornoProfessores;


  }

	public function selectProfessor($codigoProfessor){
     $query = "select *, usuario.senha, usuario.nivelAcesso from professor inner join usuario on professor.codigo_usuario = usuario.codigo_usuario where professor.codigo_professor=".$codigoProfessor;
     $result = $this->executarQuery($query);
     $objProfessor = new Professor();
     $objUsuario = new Usuario();

     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         $objUsuario->setCodigo($row['codigo_usuario']);
         $objUsuario->setSenha($row['senha']);
         $objUsuario->setNivelAcesso($row['nivelAcesso']);
                  
         $objProfessor->setCodigo($row['codigo_professor']);
         $objProfessor->setCpf($row['cpf_professor']);
         $objProfessor->setNome($row['nome']);
         $objProfessor->setRg($row['rg']);
         $objProfessor->setDataNascimento($row['dtNascimento']);
         $objProfessor->setSexo($row['sexo']);
         $objProfessor->setCidade($row['cidade']);
         $objProfessor->setBairro($row['bairro']);
         $objProfessor->setUf($row['uf']);
         $objProfessor->setLogradouro($row['logradouro']);
         $objProfessor->setNumero($row['numero']);
         $objProfessor->setEmail($row['email']);
         $objProfessor->setTelefone($row['telefone']);
         $objProfessor->setObjUsuario($objUsuario);
         
         
        }
      }
     return $objProfessor;
	}

	public function insertProfessor($objProfessor){
      
        
       $query = "insert into professor(cpf_professor,nome,rg,dtNascimento,sexo,cidade,bairro,uf,logradouro,numero,email,telefone,codigo_usuario)values('".$objProfessor->getCpf()."','".$objProfessor->getNome()."','".$objProfessor->getRg()."','".$objProfessor->getDataNascimento()."','".$objProfessor->getSexo()."','".$objProfessor->getCidade()."','".$objProfessor->getBairro()."','".$objProfessor->getUf()."','".$objProfessor->getLogradouro()."','".$objProfessor->getNumero()."','".$objProfessor->getEmail()."','".$objProfessor->getTelefone()."',".$objProfessor->getObjUsuario()->getCodigo().")";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}

	public function updateProfessor($objProfessor){
     $query = "update professor set  cpf_professor='".$objProfessor->getCpf()."',nome='".$objProfessor->getNome()."', rg='".$objProfessor->getRg()."', dtNascimento='".$objProfessor->getDataNascimento()."', sexo='".$objProfessor->getSexo()."', cidade='".$objProfessor->getCidade()."' , bairro='".$objProfessor->getBairro()."' , uf='".$objProfessor->getUf()."' , logradouro='".$objProfessor->getLogradouro()."' , numero='".$objProfessor->getNumero()."' , email='".$objProfessor->getEmail()."' , telefone='".$objProfessor->getTelefone()."' where codigo_professor=".$objProfessor->getCodigo();
      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deleteProfessor($codigoProfessor){
      $query = "delete from professor where codigo_professor='".$codigoProfessor."'";
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>