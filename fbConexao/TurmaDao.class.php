<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Turma.class.php";
include_once "../../model/ProfessorDisciplina.class.php";
include_once "../../model/Professor.class.php";
include_once "../../model/Curso.class.php";
include_once "../../model/Disciplina.class.php";
include_once "../../model/Periodo.class.php";
include_once "../../model/CursoDisciplina.class.php";

/**
* 
*/
class TurmaDao extends Conexao{
	
  
    
	function __construct(){
      
	}


	public function listaTurmas(){
      
      $query = "select codigo_turma, curso.nome as nomeCurso, curso.turno, disciplina.nome as nomeDisciplina, periodo.nome as nomePeriodo, professor.nome as nomeProfessor from turma
        inner join cursoDisciplina
        on turma.codigo_cursoDisc = cursoDisciplina.codigo_cursoDisc inner join professorDisciplina
        on turma.codigo_profDisc = professorDisciplina.codigo_profDisc inner join professor 
        on professorDisciplina.codigo_professor = professor.codigo_professor inner join curso
        on cursoDisciplina.codigo_curso = curso.codigo_curso inner join disciplina
        on cursoDisciplina.codigo_disciplina = disciplina.codigo_disciplina inner join periodo
        on cursoDisciplina.codigo_periodo = periodo.codigo_periodo
        ";
      $result = $this->executarQuery($query);
      $retornoTurmas = array();

      if(mysqli_num_rows($result)>0){

      	while($row = mysqli_fetch_assoc($result)){
         $objTurma = new Turma();


         $objProfessorDisciplina = new ProfessorDisciplina();
        
         $objProfessor = new Professor();
         $objProfessor->setNome($row['nomeProfessor']);
         $objProfessorDisciplina->setObjProfessor($objProfessor);

         $objCurso = new Curso();
         $objCurso->setNome($row['nomeCurso']);
         $objCurso->setTurno($row['turno']);

         $objDisciplina = new Disciplina();
         $objDisciplina->setNome($row['nomeDisciplina']);

         $objPeriodo = new Periodo();
         $objPeriodo->setNome($row['nomePeriodo']);

         $objCursoDisciplina = new CursoDisciplina();
         
         $objCursoDisciplina->setObjCurso($objCurso);
         $objCursoDisciplina->setObjDisciplina($objDisciplina);
         $objCursoDisciplina->setObjPeriodo($objPeriodo);

         $objTurma->setCodigo($row['codigo_turma']);
         $objTurma->setObjCursoDisciplina($objCursoDisciplina);
         $objTurma->setObjProfessorDisciplina($objProfessorDisciplina);
         $retornoTurmas[]=$objTurma;
      	}

      }

      return $retornoTurmas;


	}

  public function selectTurmasCurso($codigoCurso){
     $query = "select turma.codigo_turma, turma.nome from turma inner join cursoDisciplina on cursoDisciplina.codigo_cursoDisc = turma.codigo_cursoDisc where cursoDisciplina.codigo_curso ='".$codigoCurso."'";
     $result = $this->executarQuery($query);
     $retornoTurmas = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         $objTurma = new Turma();

         $objTurma->setCodigo($row['codigo_turma']);
         $objTurma->setNome($row['nome']);
         $retornoTurmas[]=$objTurma;
        }

      }

      return $retornoTurmas;





  }

	public function selectTurma($codigoTurma){
     $query = "select codigo_turma, turma.nome, turma.dataInicio, turma.dataFim, horas_aula_dia, qtde_aula_semana, turma.codigo_cursoDisc, cursoDisciplina.codigo_curso, codigo_profDisc from  turma
        inner join cursoDisciplina
        on turma.codigo_cursoDisc = cursoDisciplina.codigo_cursoDisc inner join curso
        on cursoDisciplina.codigo_curso = curso.codigo_curso where codigo_turma = '".$codigoTurma."'";
     $result = $this->executarQuery($query);
     $objTurma = new Turma();
     $objCurso = new Curso();
     $objProfessorDisciplina = new ProfessorDisciplina();
     $objCursoDisciplina = new CursoDisciplina();
     $objCurso = new Curso();
     
     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         
         $objCurso->setCodigo($row['codigo_curso']);
         $objCursoDisciplina->setCodigo($row['codigo_cursoDisc']);
         $objCursoDisciplina->setObjCurso($objCurso);

         $objProfessorDisciplina->setCodigo($row['codigo_profDisc']);
         
         $objTurma->setCodigo($row['codigo_turma']);
         $objTurma->setNome($row['nome']);
         $objTurma->setHorasAulaDia($row['horas_aula_dia']);
         $objTurma->setQtdeAulaSemana($row['qtde_aula_semana']);
         $objTurma->setDataInicio($row['dataInicio']);
         $objTurma->setDataFim($row['dataFim']);
         $objTurma->setObjCursoDisciplina($objCursoDisciplina);
         $objTurma->setObjProfessorDisciplina($objProfessorDisciplina);
         
        }

      }

     return $objTurma;
	}

	public function insertTurma($objTurma){
      
        
       $query = "insert into turma(codigo_turma,nome,horas_aula_dia,qtde_aula_semana, dataInicio, dataFim, codigo_cursoDisc, codigo_profDisc)values('".$objTurma->getCodigo()."','".$objTurma->getNome()."','".$objTurma->getHorasAulaDia()."',".$objTurma->getQtdeAulaSemana().",'".$objTurma->getDataInicio()."','".$objTurma->getDataFim()."',".$objTurma->getObjCursoDisciplina()->getCodigo().",".$objTurma->getObjProfessorDisciplina()->getCodigo().")";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}

	public function updateTurma($objTurma){
     $query = "update turma set  nome= '".$objTurma->getNome()."', horas_aula_dia= '".$objTurma->getHorasAulaDia()."', qtde_aula_semana = ".$objTurma->getQtdeAulaSemana().",dataInicio = ".$objTurma->getDataInicio().", dataFim = ".$objTurma->getDataFim().", codigo_cursoDisc= ".$objTurma->getObjCursoDisciplina()->getCodigo().", codigo_profDisc = ".$objTurma->getObjProfessorDisciplina()->getCodigo()." where codigo_turma = '".$objTurma->getCodigo()."'";
      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deleteTurma($codigoTurma){
      $query = "delete from turma where codigo_turma='".$codigoTurma."'";
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>