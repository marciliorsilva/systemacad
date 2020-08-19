<?php
include_once "../../fbConexao/ProfessorDao.class.php";
include_once "../../model/Professor.class.php";
include_once "../../model/Usuario.class.php";
/**
* 
*/
class ProfessorControl{

	
	
	public function __construct(){

	}



	public function listaProfessores(){
      $objDao = new ProfessorDao();
      $retornoLista = $objDao->listaProfessores();
      foreach ($retornoLista as $obj) {
      	echo '<tr id='.$obj->getCodigo().'>';
      	  
      	   echo "<td>".$obj->getNome()."</td>";
      	   echo "<td>".$obj->getCpf()."</td>";
      	   echo "<td>".$obj->getRg()."</td>";
      	   $data = str_replace("-", "/", $obj->getDataNascimento());
           $dtNascimento = date('d-m-Y',strtotime($data));
      	   echo "<td>".$dtNascimento."</td>";
      	   echo "<td>".$obj->getTelefone()."</td>";
      	echo "</tr>";

      }


	}

	public function comboBoxListaProfessores(){
		$objProfessorDao = new ProfessorDao();
		$retornoLista = $objProfessorDao->listaProfessores();
		echo "<option value=''>Selecione um Professor</option>";
		foreach ($retornoLista as $obj) {
      	 
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getNome()."</option>";
      	 
 

        }


		
	}

	public function selectProfessor($codigoProfessor){
	   $objDao = new ProfessorDao();
       return $objDao->selectProfessor($codigoProfessor);
	}

	public function insertProfessor($nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone,$objUsuario){
	   $objDao = new ProfessorDao();
	   
	   $objModelProfessor = new Professor();	 
       $objModelProfessor->setCpf($cpf);
       $objModelProfessor->setNome($nome);
       $objModelProfessor->setRg($rg);
       $objModelProfessor->setDataNascimento($dtNascimento);
       $objModelProfessor->setSexo($sexo);
       $objModelProfessor->setCidade($cidade);
       $objModelProfessor->setBairro($bairro);
       $objModelProfessor->setUf($uf);
       $objModelProfessor->setLogradouro($logradouro);
       $objModelProfessor->setNumero($numero);
       $objModelProfessor->setEmail($email);
       $objModelProfessor->setTelefone($telefone);
       $objModelProfessor->setObjUsuario($objUsuario);
       $retorno = $objDao->insertProfessor($objModelProfessor);
       return $retorno;

	}

	public function updateProfessor($codigoProfessor,$nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone){
       $objDao = new ProfessorDao();
	   $objModelProfessor = new Professor();
	   

	   $objModelProfessor->setCodigo($codigoProfessor);
       $objModelProfessor->setCpf($cpf);
       $objModelProfessor->setNome($nome);
       $objModelProfessor->setRg($rg);
       $objModelProfessor->setDataNascimento($dtNascimento);
       $objModelProfessor->setSexo($sexo);
       $objModelProfessor->setCidade($cidade);
       $objModelProfessor->setBairro($bairro);
       $objModelProfessor->setUf($uf);
       $objModelProfessor->setLogradouro($logradouro);
       $objModelProfessor->setNumero($numero);
       $objModelProfessor->setEmail($email);
       $objModelProfessor->setTelefone($telefone);
       $retorno = $objDao->updateProfessor($objModelProfessor);
       return $retorno;
	}

	public function deleteProfessor($codigoProfessor){
	   $objDao = new ProfessorDao();
       $retorno = $objDao->deleteProfessor($codigoProfessor);
       return $retorno;
	}
	

}

?>