<?php
include_once "../../fbConexao/PeriodoDao.class.php";
include_once "../../model/Periodo.class.php";
/**
* 
*/
class PeriodoControl{

	
	
	public function __construct(){

	}



	public function listaPeriodos(){
      $objDao = new PeriodoDao();
      $retornoLista = $objDao->listaPeriodos();
      foreach ($retornoLista as $obj) {
      	echo '<tr id='.$obj->getCodigo().'>';
      	   echo "<td width='200px'>".$obj->getCodigo()."</td>";
      	   echo "<td>".$obj->getNome()."</td>";
      	echo "</tr>";

      }


	}

	
	public function comboBoxListaPeriodo(){
        $objPeriodoDao = new PeriodoDao();
        $retornoLista = $objPeriodoDao->listaPeriodos();
         echo "<option value=''>Selecione um periodo</option>";
		foreach ($retornoLista as $obj) {
      	
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getNome()."</option>";
      	 
 

        } 
	}

	public function selectPeriodo($codigoPeriodo){
	   $objDao = new PeriodoDao();
       return $objDao->selectPeriodo($codigoPeriodo);
	}

	public function insertPeriodo($nome){
	   $objDao = new PeriodoDao();
	   $objModel = new Periodo();
	   $objModel->setNome($nome);
       $retorno = $objDao->insertPeriodo($objModel);
       return $retorno;

	}

	public function updatePeriodo($codigo,$nome){
       $objDao = new PeriodoDao();
	   $objModel = new Periodo();
	   $objModel->setCodigo($codigo);
	   $objModel->setNome($nome);
       $retorno = $objDao->updatePeriodo($objModel);
       return $retorno;
	}

	public function deletePeriodo($codigoPeriodo){
	   $objDao = new PeriodoDao();
       $retorno = $objDao->deletePeriodo($codigoPeriodo);
       return $retorno;
	}
	

}

?>