<?php
include_once "../../fbConexao/FuncionarioDao.class.php";
include_once "../../model/Funcionario.class.php";
include_once "../../model/Usuario.class.php";
/**
* 
*/
class FuncionarioControl{

	
	
	public function __construct(){

	}



	public function listaFuncionarios(){
      $objDao = new FuncionarioDao();
      $retornoLista = $objDao->listaFuncionarios();
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

	public function comboBoxListaFuncionarios(){
		$objFuncionarioDao = new FuncionarioDao();
		$retornoLista = $objFuncionarioDao->listaFuncionarios();
		echo "<option value=''>Selecione um Funcionario</option>";
		foreach ($retornoLista as $obj) {
      	 
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getNome()."</option>";
      	 
 

        }


		
	}

	public function selectFuncionario($codigoFuncionario){
	   $objDao = new FuncionarioDao();
       return $objDao->selectFuncionario($codigoFuncionario);
	}

	public function insertFuncionario($nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone,$objUsuario){
	   $objDao = new FuncionarioDao();
	   
	   $objModelFuncionario = new Funcionario();	 
       $objModelFuncionario->setCpf($cpf);
       $objModelFuncionario->setNome($nome);
       $objModelFuncionario->setRg($rg);
       $objModelFuncionario->setDataNascimento($dtNascimento);
       $objModelFuncionario->setSexo($sexo);
       $objModelFuncionario->setCidade($cidade);
       $objModelFuncionario->setBairro($bairro);
       $objModelFuncionario->setUf($uf);
       $objModelFuncionario->setLogradouro($logradouro);
       $objModelFuncionario->setNumero($numero);
       $objModelFuncionario->setEmail($email);
       $objModelFuncionario->setTelefone($telefone);
       $objModelFuncionario->setObjUsuario($objUsuario);
       $retorno = $objDao->insertFuncionario($objModelFuncionario);
       return $retorno;

	}

	public function updateFuncionario($codigoFuncionario,$nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone){
       $objDao = new FuncionarioDao();
	   $objModelFuncionario = new Funcionario();
	   

	   $objModelFuncionario->setCodigo($codigoFuncionario);
       $objModelFuncionario->setCpf($cpf);
       $objModelFuncionario->setNome($nome);
       $objModelFuncionario->setRg($rg);
       $objModelFuncionario->setDataNascimento($dtNascimento);
       $objModelFuncionario->setSexo($sexo);
       $objModelFuncionario->setCidade($cidade);
       $objModelFuncionario->setBairro($bairro);
       $objModelFuncionario->setUf($uf);
       $objModelFuncionario->setLogradouro($logradouro);
       $objModelFuncionario->setNumero($numero);
       $objModelFuncionario->setEmail($email);
       $objModelFuncionario->setTelefone($telefone);
       $retorno = $objDao->updateFuncionario($objModelFuncionario);
       return $retorno;
	}

	public function deleteFuncionario($codigoFuncionario){
	   $objDao = new FuncionarioDao();
       $retorno = $objDao->deleteFuncionario($codigoFuncionario);
       return $retorno;
	}
	

}

?>