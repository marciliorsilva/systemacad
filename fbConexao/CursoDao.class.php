<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Curso.class.php";

/**
* 
*/
class CursoDao extends Conexao{
	
  
    
	function __construct(){
      
	}


	public function listaCursos(){
      
      $query = "select * from curso";
      $result = $this->executarQuery($query);
      $retornoCursos = array();

      if(mysqli_num_rows($result)>0){

      	while($row = mysqli_fetch_assoc($result)){
         $objCurso = new Curso();
         $objCurso->setCodigo($row['codigo_curso']);
         $objCurso->setNome($row['nome']);
         $objCurso->setCargaHoraria($row['carga_horaria']);
         $objCurso->setTurno($row['turno']);
         $objCurso->setQuantidadePeriodo($row['qtde_periodo']);
         $retornoCursos[]=$objCurso;
      	}
      }

      return $retornoCursos;


	}

	public function selectCurso($codigoCurso){
     $query = "select * from curso where codigo_curso='".$codigoCurso."'";
     $result = $this->executarQuery($query);
     $objCurso = new Curso();
     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         $objCurso->setCodigo($row['codigo_curso']);
         $objCurso->setNome($row['nome']);
         $objCurso->setCargaHoraria($row['carga_horaria']);
         $objCurso->setTurno($row['turno']);
         $objCurso->setQuantidadePeriodo($row['qtde_periodo']);
         
        }
      }
     return $objCurso;
	}

	public function insertCurso($objCurso){
      
        
       $query = "insert into curso(codigo_curso,nome,carga_horaria,turno,qtde_periodo)values('".$objCurso->getCodigo()."','".$objCurso->getNome()."',".$objCurso->getCargaHoraria().",'".$objCurso->getTurno()."',".$objCurso->getQuantidadePeriodo().")";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}

	public function updateCurso($objCurso){
     $query = "update curso set codigo_curso='".$objCurso->getCodigo()."', nome='".$objCurso->getNome()."', carga_horaria=".$objCurso->getCargaHoraria().", turno = '".$objCurso->getTurno()."', qtde_periodo=".$objCurso->getQuantidadePeriodo()." where codigo_curso='".$objCurso->getCodigo()."'";
      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deleteCurso($codigoCurso){
      $query = "delete from curso where codigo_curso='".$codigoCurso."'";
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>