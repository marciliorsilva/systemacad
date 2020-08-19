<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/TurmaAluno.class.php";
include_once "../../model/Turma.class.php";
include_once "../../model/Aluno.class.php";


/**
* 
*/
class TurmaAlunoDao extends Conexao{
	
  
    
	function __construct(){
      
	}

  public function listaTurmaAlunos(){
      
      $query = "select turmaAluno.codigo_turmaAluno, turma.nome,
                count(codigo_aluno) as alunos from turmaAluno
                inner join turma on turmaAluno.codigo_turma = turma.codigo_turma
                group by turmaAluno.codigo_turma";
      $result = $this->executarQuery($query);
      $retornoAlunosTurma = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         $objTurmaAluno = new TurmaAluno();
         $objTurma = new Turma();
         $objTurma->setNome($row['nome']);
         $objTurmaAluno->setCodigo($row['codigo_turmaAluno']);
         $objTurmaAluno->qtdeAlunosTurma($row['alunos']);
         $objTurmaAluno->setObjTurma($objTurma);


         $retornoAlunosTurma[]=$objTurmaAluno;
        }
      }

      return $retornoAlunosTurma;


  }

  

  

	
	public function insertTurmaAluno($objTurmaAluno){
      
        
       $query = "insert into turmaAluno(codigo_turma, codigo_aluno)values(".$objTurmaAluno->getObjTurma())->getCodigo().",".$objTurmaAluno->getObjAluno()->getCodigo().")";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}



	public function deleteTurmaAluno($codigoTurmaAluno){
      $query = "delete from turmaAluno where codigo_turmaAluno=".$codigoTurmaAluno;
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

  
	
}

?>