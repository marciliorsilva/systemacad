<?php
include_once "../../fbConexao/DisciplinaDao.class.php";
include_once "../../model/Disciplina.class.php";
/**
* 
*/
class DisciplinaControl{

	
	
	public function __construct(){

	}



	public function listaDisciplinas(){
      $objDao = new DisciplinaDao();
      $retornoLista = $objDao->listaDisciplinas();
      foreach ($retornoLista as $obj) {
      	echo '<tr id='.$obj->getCodigo().'>';
      	   echo "<td width='200px'>".$obj->getCodigo()."</td>";
      	   echo "<td>".$obj->getNome()."</td>";
      	echo "</tr>";

      }


	}

	public function comboBoxListaDisciplina(){
		$objDisciplinaDao = new DisciplinaDao();
		$retornoLista = $objDisciplinaDao->listaDisciplinas();
		 echo "<option value=''>Selecione uma disciplina</option>";
		foreach ($retornoLista as $obj) {
      	
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getCodigo()." - ".$obj->getNome()."</option>";
      	 
 

        }
	}

	public function selectDisciplina($codigoDisciplina){
	   $objDao = new DisciplinaDao();
       return $objDao->selectDisciplina($codigoDisciplina);
	}

	public function insertDisciplina($codigo,$nome){
	   $objDao = new DisciplinaDao();
	   $objModel = new Disciplina();
	   $objModel->setCodigo($codigo);
	   $objModel->setNome($nome);
       $retorno = $objDao->insertDisciplina($objModel);
       return $retorno;

	}

	public function updateDisciplina($codigo,$nome){
       $objDao = new DisciplinaDao();
	   $objModel = new Disciplina();
	   $objModel->setCodigo($codigo);
	   $objModel->setNome($nome);
       $retorno = $objDao->updateDisciplina($objModel);
       return $retorno;
	}

	public function deleteDisciplina($codigoDisciplina){
	   $objDao = new DisciplinaDao();
       $retorno = $objDao->deleteDisciplina($codigoDisciplina);
       return $retorno;
	}
	

}

?>