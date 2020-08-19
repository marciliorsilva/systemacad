<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/AvisoCurso.class.php";
include_once "../../model/Aviso.class.php";
include_once "../../model/Curso.class.php";

/**
* 
*/
class AvisoCursoDao extends Conexao{
	
  
  

	public function listaAvisoCursoUsuario($codigoUsuario){
      
     
      $query = "select codigo_avisoCurso, aviso.codigo_aviso, assunto, DATE_FORMAT(dataAviso,'%d/%m/%Y %H:%i:%s') as dataPublicacao, img, mensagem, curso.codigo_curso, curso.nome,curso.turno, count(assunto)as qtdeAssuntos from avisoCurso inner join aviso on avisoCurso.codigo_aviso = aviso.codigo_aviso inner join curso on avisoCurso.codigo_curso = curso.codigo_curso where aviso.codigo_usuario = ".$codigoUsuario." group by assunto order by aviso.dataAviso desc";

      $result = $this->executarQuery($query);

      $retornoAvisoCurso = array();

      if(mysqli_num_rows($result)>0){
        

      	while($row = mysqli_fetch_assoc($result)){
         
         $objCurso = new Curso();
         $objCurso->setCodigo($row["codigo_curso"]);
         $objCurso->setNome($row["nome"]);
         $objCurso->setTurno($row["turno"]);

         $objAviso = new Aviso();
         $objAviso->setCodigo($row['codigo_aviso']);
         $objAviso->setAssunto($row['assunto']);
         $objAviso->setData($row['dataPublicacao']);
         $objAviso->setImg($row['img']);
         $objAviso->setMensagem($row['mensagem']);

         

         $objAvisoCurso = new AvisoCurso();
         $objAvisoCurso->setCodigo($row["codigo_avisoCurso"]);
         $objAvisoCurso->setAssuntosRepetidos($row["qtdeAssuntos"]);
         $objAvisoCurso->setObjCurso($objCurso);
        $objAvisoCurso->setObjAviso($objAviso);
            
         
         $retornoAvisoCurso[]=$objAvisoCurso;
      	}
      }

      return $retornoAvisoCurso;


	}
  /*
	public function selectAvisoCurso($codigoAvisoCurso){
    
     $query = "select codigo_cursoDisc as codigo, cursoAviso.carga_horaria as ch,curso.nome as cursoNome,curso.codigo_curso,disciplina.nome as disciplinaNome,disciplina.codigo_disciplina,periodo.nome as periodoNome,periodo.codigo_periodo from cursoAviso inner join curso on cursoAviso.codigo_curso = curso.codigo_curso inner join disciplina on cursoAviso.codigo_disciplina = disciplina.codigo_disciplina inner join periodo on cursoAviso.codigo_periodo = periodo.codigo_periodo where codigo_cursoDisc =".$codigoAvisoCurso;
     $result = $this->executarQuery($query);
     $objAvisoCurso = new AvisoCurso();
     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         
         $objCurso = new Curso();
         $objCurso->setCodigo($row["codigo_curso"]);
         $objCurso->setNome($row["cursoNome"]);

         $objAviso = new Aviso();
         $objAviso->setCodigo($row["codigo_disciplina"]);
         $objAviso->setNome($row["disciplinaNome"]);

         $objPeriodo = new Periodo();
         $objPeriodo->setCodigo($row["codigo_periodo"]);
         $objPeriodo->setNome($row["periodoNome"]);

         $objAvisoCurso->setCodigo($row["codigo"]);
         $objAvisoCurso->setObjCurso($objCurso);
         $objAvisoCurso->setObjAviso($objAviso);
         $objAvisoCurso->setObjPeriodo($objPeriodo);
         $objAvisoCurso->setCargaHoraria($row["ch"]); 
         
         
        }
      }
     return $objAvisoCurso;
	}
  */

	public function insertAvisoCurso($objAvisoCurso){
      
        
       $query = "insert into avisoCurso(codigo_curso,codigo_aviso)
         values('".$objAvisoCurso->getObjCurso()->getCodigo()."',".$objAvisoCurso->getObjAviso()->getCodigo().")";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}
  
  /*
	public function updateAvisoCurso($objAvisoCurso){

    
     $query = "";

      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}*/

	public function deleteAvisoCurso($codigoAvisoCurso){
      $query = "delete from avisoCurso where codigo_avisoCurso=".$codigoAvisoCurso;
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>