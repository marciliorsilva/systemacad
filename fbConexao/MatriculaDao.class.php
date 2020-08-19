<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Matricula.class.php";
include_once "../../model/Aluno.class.php";
include_once "../../model/Curso.class.php";


/**
* 
*/
class MatriculaDao extends Conexao{
	
  
    
	function __construct(){
      
	}

  public function listaAlunos(){
      
      $query = "select aluno.codigo_aluno,codigo_matricula, aluno.nome, aluno.cpf_aluno, aluno.rg,curso.nome as nomeCurso from matricula inner join aluno on matricula.codigo_aluno = aluno.codigo_aluno inner join curso on matricula.codigo_curso = curso.codigo_curso";
      $result = $this->executarQuery($query);
      $retornoMatriculas = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         

         $objAluno = new Aluno();
         $objAluno->setCodigo($row['codigo_aluno']);
         $objAluno->setNome($row['nome']);
         $objAluno->setCpf($row['cpf_aluno']);
         $objAluno->setRg($row['rg']);

         $objCurso = new Curso();
         $objCurso->setNome($row['nomeCurso']);
         
         $objMatricula = new Matricula();
         $objMatricula->setCodigo($row['codigo_matricula']);
         $objMatricula->setObjAluno($objAluno);
         $objMatricula->setObjCurso($objCurso);


         $retornoMatriculas[]=$objMatricula;
        }
      }

      return $retornoMatriculas;


  }
  //lista alunos para matricular na turma no cadastro entre turma/aluno 
  public function listaAlunosCurso($codigoCurso){
      
      $query = "select aluno.codigo_aluno,codigo_matricula, aluno.nome from matricula inner join aluno on matricula.codigo_aluno = aluno.codigo_aluno inner join curso on matricula.codigo_curso = curso.codigo_curso where curso.codigo_curso = '".$codigoCurso."' and aluno.codigo_aluno not in (select codigo_aluno from turmaAluno)";
      
      $result = $this->executarQuery($query);
      $retornoMatriculas = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         

         $objAluno = new Aluno();
         $objAluno->setCodigo($row['codigo_aluno']);
         $objAluno->setNome($row['nome']);
         

         
         $objMatricula = new Matricula();
         $objMatricula->setCodigo($row['codigo_matricula']);
         $objMatricula->setObjAluno($objAluno);
        


         $retornoMatriculas[]=$objMatricula;
        }
      }

      return $retornoMatriculas;


  }

  public function selectAlunoMatricula($codigoAluno){
      
        
       $query = "select * from matricula where codigo_aluno=".$codigoAluno;
       $result = $this->executarQuery($query);
       $objMatricula = new Matricula();
       $objCurso = new Curso();
       if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){


         $objCurso->setCodigo($row['codigo_curso']);
         $objMatricula->setCodigo($row['codigo_matricula']);
         $objMatricula->setData($row['dataMatricula']);
         $objMatricula->setObjCurso($objCurso);
         

                  
         
         
         
        }

      }

      return $objMatricula;
      

  }

  public function verificarMatricula($codigo){
      
        
       $query = "select * from matricula where codigo_matricula='".$codigo."'";
       $result = $this->executarQuery($query);
       
       if(mysqli_num_rows($result)>0){
           return 1;
       }else{
           return 0;
       }

  }


 
 
 

	
	public function insertMatricula($objMatricula){
      
        
       $query = "insert into matricula(codigo_matricula, codigo_curso, codigo_aluno)values('".$objMatricula->getCodigo()."','".$objMatricula->getObjCurso()->getCodigo()."',".$objMatricula->getObjAluno()->getCodigo().")";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}
  
	public function deleteMatriculaAluno($codigoAluno){
      $query = "delete from matricula where codigo_aluno=".$codigoAluno;
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
  }
  
	public function deleteMatricula($codigoMatricula){
      $query = "delete from matricula where codigo_matricula='".$codigoMatricula."'";
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

  
	
}

?>