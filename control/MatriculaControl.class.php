<?php
include_once "../../fbConexao/MatriculaDao.class.php";
include_once "../../model/Matricula.class.php";
include_once "../../model/Aluno.class.php";
include_once "../../model/Curso.class.php";
/**
* 
*/
class MatriculaControl{

	
	
	public function listaAlunos(){
            $objDao = new MatriculaDao();
            $retornoLista = $objDao->listaAlunos();
            foreach ($retornoLista as $obj) {
      	     echo '<tr id='.$obj->getObjAluno()->getCodigo().'>';
      	           echo "<td>".$obj->getCodigo()."</td>";
      	           echo "<td>".$obj->getObjAluno()->getNome()."</td>";
      	           echo "<td>".$obj->getObjAluno()->getCpf()."</td>";
      	           echo "<td>".$obj->getObjAluno()->getRg()."</td>";
      	           echo "<td>".$obj->getObjCurso()->getNome()."</td>";
      	     echo "</tr>";

            }


	}


     
      public function insertMatricula($codigoMatricula,$objCurso,$objAluno){
      $objDao = new MatriculaDao();
       
         $objMatricula = new Matricula();
         $objMatricula->setCodigo($codigoMatricula);
         $objMatricula->setObjCurso($objCurso);
         $objMatricula->setObjAluno($objAluno);

       $retorno = $objDao->insertMatricula($objMatricula);
       return $retorno;

      }


  public function listaAlunosCurso($codigoCurso){
    $objDao = new MatriculaDao();
    $retornoLista = $objDao->listaAlunosCurso($codigoCurso);
           
            foreach ($retornoLista as $obj) {
             echo '<tr id='.$obj->getObjAluno()->getCodigo().'>';
                   echo "<td style='width:120px;'>".$obj->getCodigo()."</td>";
                   echo "<td>".$obj->getObjAluno()->getNome()."</td>";
             echo "</tr>";

            }

  }
      

      
	public function selectAlunoMatricula($codigoAluno){
	   $objDao = new MatriculaDao();
       return $objDao->selectAlunoMatricula($codigoAluno);
	}

      public function verificarMatricula($codigo){
         $objDao = new MatriculaDao();
       return $objDao->verificarMatricula($codigo);
      }
      
      /*

	public function updateMatricula($codigoCursoDisc,$ch,$codigoCurso,$codigoDisciplina,$codigoPeriodo){
       $objDao = new MatriculaDao();
       $objCurso = new Curso();
       $objCurso->setCodigo($codigoCurso);
       $objDisciplina = new Disciplina();
       $objDisciplina->setCodigo($codigoDisciplina);
       $objPeriodo = new Periodo();
       $objPeriodo->setCodigo($codigoPeriodo);
       
	   $objMatricula = new Matricula();
	   $objMatricula->setCodigo($codigoCursoDisc);
	   $objMatricula->setCargaHoraria($ch);
	   $objMatricula->setObjCurso($objCurso);
	   $objMatricula->setObjDisciplina($objDisciplina);
	   $objMatricula->setObjPeriodo($objPeriodo);
       $retorno = $objDao->updateMatricula($objMatricula);
       return $retorno;
	}
 */
  public function deleteMatriculaAluno($codigoAluno){
     $objDao = new MatriculaDao();
       $retorno = $objDao->deleteMatriculaAluno($codigoAluno);
       return $retorno;
  }
	public function deleteMatricula($codigoMatricula){
	   $objDao = new MatriculaDao();
       $retorno = $objDao->deleteMatricula($codigoMatricula);
       return $retorno;
	}
	

}

?>