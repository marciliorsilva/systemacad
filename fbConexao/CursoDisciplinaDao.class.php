<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/CursoDisciplina.class.php";
include_once "../../model/Periodo.class.php";
include_once "../../model/Disciplina.class.php";
include_once "../../model/Curso.class.php";

/**
* 
*/
class CursoDisciplinaDao extends Conexao{
	
  
  

	public function listaCursoDisciplina(){
      
     
      $query = "select codigo_cursoDisc as codigo, cursoDisciplina.carga_horaria as ch,curso.nome as cursoNome, disciplina.nome as disciplinaNome,periodo.nome as periodoNome from cursoDisciplina inner join curso on cursoDisciplina.codigo_curso = curso.codigo_curso inner join disciplina on cursoDisciplina.codigo_disciplina = disciplina.codigo_disciplina inner join periodo on cursoDisciplina.codigo_periodo = periodo.codigo_periodo";

      $result = $this->executarQuery($query);

      $retornoCursoDisciplina = array();

      if(mysqli_num_rows($result)>0){
        

      	while($row = mysqli_fetch_assoc($result)){
         
         $objCurso = new Curso();
         $objCurso->setNome($row["cursoNome"]);

         $objDisciplina = new Disciplina();
         $objDisciplina->setNome($row["disciplinaNome"]);

         $objPeriodo = new Periodo();
         $objPeriodo->setNome($row["periodoNome"]);

         $objCursoDisciplina = new CursoDisciplina();
         $objCursoDisciplina->setCodigo($row["codigo"]);
         $objCursoDisciplina->setObjCurso($objCurso);
         $objCursoDisciplina->setObjDisciplina($objDisciplina);
         $objCursoDisciplina->setObjPeriodo($objPeriodo);
         $objCursoDisciplina->setCargaHoraria($row["ch"]);        
         
         $retornoCursoDisciplina[]=$objCursoDisciplina;
      	}
      }

      return $retornoCursoDisciplina;


	}

  public function listaDisciplinasCurso($codigoCurso){
      
     
      $query = "select codigo_cursoDisc as codigo, cursoDisciplina.carga_horaria as ch,curso.nome as cursoNome, cursoDisciplina.codigo_disciplina, disciplina.nome as disciplinaNome,periodo.nome as periodoNome from cursoDisciplina inner join curso on cursoDisciplina.codigo_curso = curso.codigo_curso inner join disciplina on cursoDisciplina.codigo_disciplina = disciplina.codigo_disciplina inner join periodo on cursoDisciplina.codigo_periodo = periodo.codigo_periodo where cursoDisciplina.codigo_curso='".$codigoCurso."' order by periodo.nome asc ;";

      $result = $this->executarQuery($query);

      $retornoCursoDisciplina = array();

      if(mysqli_num_rows($result)>0){
        

        while($row = mysqli_fetch_assoc($result)){
         
         $objDisciplina = new Disciplina();
         $objDisciplina->setCodigo($row["codigo_disciplina"]);
         $objDisciplina->setNome($row["disciplinaNome"]);

         $objPeriodo = new Periodo();
         $objPeriodo->setNome($row["periodoNome"]);

         $objCursoDisciplina = new CursoDisciplina();
         $objCursoDisciplina->setCodigo($row["codigo"]);
         $objCursoDisciplina->setObjDisciplina($objDisciplina);
         $objCursoDisciplina->setObjPeriodo($objPeriodo);
                  
         $retornoCursoDisciplina[]=$objCursoDisciplina;
        }
      }

      return $retornoCursoDisciplina;


  }

	public function selectCursoDisciplina($codigoCursoDisciplina){
    
     $query = "select codigo_cursoDisc as codigo, cursoDisciplina.carga_horaria as ch,curso.nome as cursoNome,curso.codigo_curso,disciplina.nome as disciplinaNome,disciplina.codigo_disciplina,periodo.nome as periodoNome,periodo.codigo_periodo from cursoDisciplina inner join curso on cursoDisciplina.codigo_curso = curso.codigo_curso inner join disciplina on cursoDisciplina.codigo_disciplina = disciplina.codigo_disciplina inner join periodo on cursoDisciplina.codigo_periodo = periodo.codigo_periodo where codigo_cursoDisc =".$codigoCursoDisciplina;
     $result = $this->executarQuery($query);
     $objCursoDisciplina = new CursoDisciplina();
     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         
         $objCurso = new Curso();
         $objCurso->setCodigo($row["codigo_curso"]);
         $objCurso->setNome($row["cursoNome"]);

         $objDisciplina = new Disciplina();
         $objDisciplina->setCodigo($row["codigo_disciplina"]);
         $objDisciplina->setNome($row["disciplinaNome"]);

         $objPeriodo = new Periodo();
         $objPeriodo->setCodigo($row["codigo_periodo"]);
         $objPeriodo->setNome($row["periodoNome"]);

         $objCursoDisciplina->setCodigo($row["codigo"]);
         $objCursoDisciplina->setObjCurso($objCurso);
         $objCursoDisciplina->setObjDisciplina($objDisciplina);
         $objCursoDisciplina->setObjPeriodo($objPeriodo);
         $objCursoDisciplina->setCargaHoraria($row["ch"]); 
         
         
        }
      }
     return $objCursoDisciplina;
	}

	public function insertCursoDisciplina($objCursoDisciplina){
      
        
       $query = "insert into cursoDisciplina(carga_horaria,codigo_curso,codigo_disciplina,codigo_periodo)
         values(".$objCursoDisciplina->getCargaHoraria().",'".$objCursoDisciplina->getObjCurso()->getCodigo()."','".$objCursoDisciplina->getObjDisciplina()->getCodigo()."',".$objCursoDisciplina->getObjPeriodo()->getCodigo().")";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}

	public function updateCursoDisciplina($objCursoDisciplina){

    
     $query = "update cursoDisciplina set carga_horaria = ".$objCursoDisciplina->getCargaHoraria().", codigo_curso = '".$objCursoDisciplina->getObjCurso()->getCodigo()."', codigo_disciplina = '".$objCursoDisciplina->getObjDisciplina()->getCodigo()."',codigo_periodo = '".$objCursoDisciplina->getObjPeriodo()->getCodigo()."' where codigo_cursoDisc=".$objCursoDisciplina->getCodigo();

      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deleteCursoDisciplina($codigoCursoDisciplina){
      $query = "delete from cursoDisciplina where codigo_cursoDisc=".$codigoCursoDisciplina;
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>