<?php
include_once "../../fbConexao/AlunoDao.class.php";
include_once "../../model/Aluno.class.php";
include_once "../../model/Usuario.class.php";
/**
* 
*/
class AlunoControl{

	
	
	public function __construct(){

	}

      /*

	public function listaAlunos(){
      $objDao = new AlunoDao();
      $retornoLista = $objDao->listaAlunos();
      foreach ($retornoLista as $obj) {
      	echo '<tr id='.$obj->getCodigo().'>';
      	   echo "<td>".$obj->getCodigo()."</td>";
              
      	   echo "<td>".$obj->getNome()."</td>";
      	   echo "<td>".$obj->getCpf()."</td>";
      	   echo "<td>".$obj->getRg()."</td>";
      	   $data = str_replace("-", "/", $obj->getDataNascimento());
           $dtNascimento = date('d-m-Y',strtotime($data));
      	   echo "<td>".$dtNascimento."</td>";
      	   
      	echo "</tr>";

      }


	}

	public function comboBoxListaAlunos(){
		$objAlunoDao = new AlunoDao();
		$retornoLista = $objAlunoDao->listaAlunoes();
		echo "<option value=''>Selecione um Aluno</option>";
		foreach ($retornoLista as $obj) {
      	 
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getNome()."</option>";
      	 
 

        }


		
	}*/

	public function selectAluno($codigoAluno){
	   $objDao = new AlunoDao();
       return $objDao->selectAluno($codigoAluno);
	}

	public function insertAluno($nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone,$objUsuario){
	 $objDao = new AlunoDao();
	   
	 $objModelAluno = new Aluno();	 
       $objModelAluno->setCpf($cpf);
       $objModelAluno->setNome($nome);
       $objModelAluno->setRg($rg);
       $objModelAluno->setDataNascimento($dtNascimento);
       $objModelAluno->setSexo($sexo);
       $objModelAluno->setCidade($cidade);
       $objModelAluno->setBairro($bairro);
       $objModelAluno->setUf($uf);
       $objModelAluno->setLogradouro($logradouro);
       $objModelAluno->setNumero($numero);
       $objModelAluno->setEmail($email);
       $objModelAluno->setTelefone($telefone);
       $objModelAluno->setObjUsuario($objUsuario);
       $retorno = $objDao->insertAluno($objModelAluno);
       return $retorno;

	}

      

	public function updateAluno($codigoAluno,$nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone){
       $objDao = new AlunoDao();
	   $objModelAluno = new Aluno();
	   

       $objModelAluno->setCodigo($codigoAluno);
       $objModelAluno->setCpf($cpf);
       $objModelAluno->setNome($nome);
       $objModelAluno->setRg($rg);
       $objModelAluno->setDataNascimento($dtNascimento);
       $objModelAluno->setSexo($sexo);
       $objModelAluno->setCidade($cidade);
       $objModelAluno->setBairro($bairro);
       $objModelAluno->setUf($uf);
       $objModelAluno->setLogradouro($logradouro);
       $objModelAluno->setNumero($numero);
       $objModelAluno->setEmail($email);
       $objModelAluno->setTelefone($telefone);
       $retorno = $objDao->updateAluno($objModelAluno);
       return $retorno;
	}

     
	public function deleteAluno($codigoAluno){
	   $objDao = new AlunoDao();
       $retorno = $objDao->deleteAluno($codigoAluno);
       return $retorno;
	}
	

}

?>