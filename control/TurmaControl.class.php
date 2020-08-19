<?php
include_once "../../fbConexao/TurmaDao.class.php";
include_once "../../model/Turma.class.php";
include_once "../../model/CursoDisciplina.class.php";
include_once "../../model/ProfessorDisciplina.class.php";
/**
* 
*/
class TurmaControl{

	
	
	public function __construct(){

	}



	public function listaTurmas(){

      $objDao = new TurmaDao();
      $retornoLista = $objDao->listaTurmas();
      foreach ($retornoLista as $obj) {
      	echo '<tr id='.$obj->getCodigo().'>';
      	   echo "<td>".$obj->getCodigo()."</td>";
      	   echo "<td>".$obj->getObjCursoDisciplina()->getObjDisciplina()->getNome()."</td>";
      	   echo "<td>".$obj->getObjCursoDisciplina()->getObjCurso()->getNome()." - ".$obj->getObjCursoDisciplina()->getObjCurso()->getTurno()."</td>";      	  
      	   echo "<td>".$obj->getObjCursoDisciplina()->getObjPeriodo()->getNome()."</td>";
      	   echo "<td>".$obj->getObjProfessorDisciplina()->getObjProfessor()->getNome()."</td>";
      	echo "</tr>";

      }

	}

	public function listaTurmasSelect(){
      $objDao = new TurmaDao();
      $retornoLista = $objDao->listaTurmas();
       echo "<option value=''>Selecione um Turma</option>";
		foreach ($retornoLista as $obj) {
      	
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getNome()." - ".$obj->getObjCursoDisciplina()->getObjCurso()->getNome()." - ".$obj->getObjCursoDisciplina()->getObjCurso()->getTurno()." - ".$obj->getObjCursoDisciplina()->getObjPeriodo()->getNome()."</option>";
      	 
 

        }

     }

     public function selectTurmasCurso($codigoCurso){
      $objDao = new TurmaDao();
      $retornoLista = $objDao->selectTurmasCurso($codigoCurso);
       echo "<option value=''>Selecione um Turma</option>";
		foreach ($retornoLista as $obj) {
      	
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getNome()."</option>";
      	 
 

        }

     }


	public function selectTurma($codigoTurma){
	   $objDao = new TurmaDao();
       return $objDao->selectTurma($codigoTurma);
	}

	public function insertTurma($codigo,$nome,$horasAula,$qtdeAula,$dataInicio,$dataFim,$codigoCursoDisc,$codigoProfessorDisciplina){
	   $objDao = new TurmaDao();
	   $objModel = new Turma();
       $objCursoDisc = new CursoDisciplina();
       $objProfessorDisciplina = new ProfessorDisciplina();
       $objProfessorDisciplina->setCodigo($codigoProfessorDisciplina);
       $objCursoDisc->setCodigo($codigoCursoDisc);
	   $objModel->setCodigo($codigo);
	   $objModel->setNome($nome);
	   $objModel->setHorasAulaDia($horasAula);
	   $objModel->setQtdeAulaSemana($qtdeAula);
	   $objModel->setDataInicio($dataInicio);
	   $objModel->setDataFim($dataFim);
	   $objModel->setObjCursoDisciplina($objCursoDisc);
	   $objModel->setObjProfessorDisciplina($objProfessorDisciplina);
       $retorno = $objDao->insertTurma($objModel);
       return $retorno;

	}

	public function updateTurma($codigo,$nome,$horasAula,$qtdeAula,$dataInicio, $dataFim, $codigoCursoDisc,$codigoProfessorDisciplina){
       $objDao = new TurmaDao();
	   $objModel = new Turma();
	   $objCursoDisc = new CursoDisciplina();
	   $objProfessorDisciplina = new ProfessorDisciplina();
       $objProfessorDisciplina->setCodigo($codigoProfessorDisciplina);
       $objCursoDisc->setCodigo($codigoCursoDisc);
	   $objModel->setCodigo($codigo);
	   $objModel->setNome($nome);
	   $objModel->setHorasAulaDia($horasAula);
	   $objModel->setQtdeAulaSemana($qtdeAula);
	   $objModel->setDataInicio($dataInicio);
	   $objModel->setDataFim($dataFim);
	   $objModel->setObjCursoDisciplina($objCursoDisc);
	   $objModel->setObjProfessorDisciplina($objProfessorDisciplina);
       $retorno = $objDao->updateTurma($objModel);
       return $retorno;
	}

	public function deleteTurma($codigoTurma){
	   $objDao = new TurmaDao();
       $retorno = $objDao->deleteTurma($codigoTurma);
       return $retorno;
	}
	

}

?>