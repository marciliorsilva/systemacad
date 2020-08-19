<?php
include_once "../../fbConexao/CursoDisciplinaDao.class.php";
include_once "../../model/CursoDisciplina.class.php";
include_once "../../model/Periodo.class.php";
include_once "../../model/Disciplina.class.php";
include_once "../../model/Curso.class.php";
/**
* 
*/
class CursoDisciplinaControl{

	
	
	public function listaCursoDisciplinas(){
      $objDao = new CursoDisciplinaDao();
      $retornoLista = $objDao->listaCursoDisciplina();
      foreach ($retornoLista as $obj) {
      	echo '<tr id='.$obj->getCodigo().'>';
      	   echo "<td>".$obj->getCodigo()."</td>";
      	   echo "<td>".$obj->getObjCurso()->getNome()."</td>";
      	   echo "<td>".$obj->getObjDisciplina()->getNome()."</td>";
      	   echo "<td>".$obj->getObjPeriodo()->getNome()."</td>";
      	   echo "<td>".$obj->getCargaHoraria()."</td>";
      	echo "</tr>";

      }


	}

      public function listaDisciplinasCurso($codigoCurso){

            $objDao = new CursoDisciplinaDao();
            $retornoLista = $objDao->listaDisciplinasCurso($codigoCurso);
            echo "<option value=''>Selecione uma Disciplina</option>";
            foreach ($retornoLista as $obj) {
                  echo "<option value='".$obj->getCodigo()."'>".$obj->getObjDisciplina()->getCodigo()." - ".$obj->getObjDisciplina()->getNome()." - ".$obj->getObjPeriodo()->getNome()."</option>";
                  

            }


      }



	public function selectCursoDisciplina($codigoCursoDisciplina){
	   $objDao = new CursoDisciplinaDao();
       return $objDao->selectCursoDisciplina($codigoCursoDisciplina);
	}

	public function insertCursoDisciplina($ch,$codigoCurso,$codigoDisciplina,$codigoPeriodo){
	   $objDao = new CursoDisciplinaDao();
       $objCurso = new Curso();
       $objCurso->setCodigo($codigoCurso);
       $objDisciplina = new Disciplina();
       $objDisciplina->setCodigo($codigoDisciplina);
       $objPeriodo = new Periodo();
       $objPeriodo->setCodigo($codigoPeriodo);
       
	   $objCursoDisciplina = new CursoDisciplina();
	   $objCursoDisciplina->setCargaHoraria($ch);
	   $objCursoDisciplina->setObjCurso($objCurso);
	   $objCursoDisciplina->setObjDisciplina($objDisciplina);
	   $objCursoDisciplina->setObjPeriodo($objPeriodo);
       $retorno = $objDao->insertCursoDisciplina($objCursoDisciplina);
       return $retorno;

	}

	public function updateCursoDisciplina($codigoCursoDisc,$ch,$codigoCurso,$codigoDisciplina,$codigoPeriodo){
       $objDao = new CursoDisciplinaDao();
       $objCurso = new Curso();
       $objCurso->setCodigo($codigoCurso);
       $objDisciplina = new Disciplina();
       $objDisciplina->setCodigo($codigoDisciplina);
       $objPeriodo = new Periodo();
       $objPeriodo->setCodigo($codigoPeriodo);
       
	   $objCursoDisciplina = new CursoDisciplina();
	   $objCursoDisciplina->setCodigo($codigoCursoDisc);
	   $objCursoDisciplina->setCargaHoraria($ch);
	   $objCursoDisciplina->setObjCurso($objCurso);
	   $objCursoDisciplina->setObjDisciplina($objDisciplina);
	   $objCursoDisciplina->setObjPeriodo($objPeriodo);
       $retorno = $objDao->updateCursoDisciplina($objCursoDisciplina);
       return $retorno;
	}

	public function deleteCursoDisciplina($codigoCursoDisciplina){
	   $objDao = new CursoDisciplinaDao();
       $retorno = $objDao->deleteCursoDisciplina($codigoCursoDisciplina);
       return $retorno;
	}
	

}

?>