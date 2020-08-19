<?php
include_once "../../fbConexao/CursoDao.class.php";
include_once "../../model/Curso.class.php";
/**
* 
*/
class CursoControl{

	
	
	public function __construct(){

	}



	public function listaCursos(){

      $objDao = new CursoDao();
      $retornoLista = $objDao->listaCursos();
      foreach ($retornoLista as $obj) {
      	echo '<tr id='.$obj->getCodigo().'>';
      	   echo "<td>".$obj->getCodigo()."</td>";
      	   echo "<td>".$obj->getNome()."</td>";
      	   echo "<td>".$obj->getCargaHoraria()."</td>";
      	   echo "<td>".$obj->getQuantidadePeriodo()."</td>";
      	   echo "<td>".$obj->getTurno()."</td>";
      	echo "</tr>";

      }

	}

	public function listaCursosSelect(){
      $objDao = new CursoDao();
      $retornoLista = $objDao->listaCursos();
       echo "<option value=''>Selecione um Curso</option>";
		foreach ($retornoLista as $obj) {
      	
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getCodigo()." - ".$obj->getNome()." - ".$obj->getTurno()."</option>";
      	 
 

        }

     }




	public function listaTodosCursos(){
		  $objDao = new CursoDao();
		  $retornoLista = $objDao->listaCursos();
		  return $retornoLista;
	}

	public function comboBoxListaCurso(){
		$objCursoDao = new CursoDao();
		$retornoLista = $objCursoDao->listaCursos();
		echo "<option value=''>Selecione um curso</option>";
		foreach ($retornoLista as $obj) {
      	 
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getCodigo()." - ".$obj->getNome()." - ".$obj->getTurno()."</option>";
      	 
 

        }


		
	}

	public function comboBoxListaCursoAviso(){
		$objCursoDao = new CursoDao();
		$retornoLista = $objCursoDao->listaCursos();
		echo "<option value=''>Selecione um curso</option>";
		echo "<option value='todos'>Todos</option>";
		foreach ($retornoLista as $obj) {
      	 
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getCodigo()." - ".$obj->getNome()." - ".$obj->getTurno()."</option>";
      	 
 

        }


		
	}

	public function selectCurso($codigoCurso){
	   $objDao = new CursoDao();
       return $objDao->selectCurso($codigoCurso);
	}

	public function insertCurso($codigo,$nome,$ch,$turno,$qtdePeriodo){
	   $objDao = new CursoDao();
	   $objModel = new Curso();
	   $objModel->setCodigo($codigo);
	   $objModel->setNome($nome);
	   $objModel->setCargaHoraria($ch);
	   $objModel->setTurno($turno);
	   $objModel->setQuantidadePeriodo($qtdePeriodo);
       $retorno = $objDao->insertCurso($objModel);
       return $retorno;

	}

	public function updateCurso($codigo,$nome,$ch,$turno,$qtdePeriodo){
       $objDao = new CursoDao();
	   $objModel = new Curso();
	   $objModel->setCodigo($codigo);
	   $objModel->setNome($nome);
	   $objModel->setCargaHoraria($ch);
	   $objModel->setTurno($turno);
	   $objModel->setQuantidadePeriodo($qtdePeriodo);
       $retorno = $objDao->updateCurso($objModel);
       return $retorno;
	}

	public function deleteCurso($codigoCurso){
	   $objDao = new CursoDao();
       $retorno = $objDao->deleteCurso($codigoCurso);
       return $retorno;
	}
	

}

?>