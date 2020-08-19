<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/ProfessorDisciplina.class.php";
include_once "../../model/Professor.class.php";
include_once "../../model/Disciplina.class.php";


/**
* 
*/
class ProfessorDisciplinaDao extends Conexao{
	
  
    
	function __construct(){
      
	}

  public function listaProfessorDisciplinas(){
      
      $query = "select professorDisciplina.codigo_professor,professor.nome, count(codigo_disciplina) as disciplinas from professorDisciplina inner join professor on professorDisciplina.codigo_professor = professor.codigo_professor group by professorDisciplina.codigo_professor";
      $result = $this->executarQuery($query);
      $retornoProfessoresDisicplina = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         $objProfessorDisciplina = new ProfessorDisciplina();
         $objProfessor = new Professor();
         $objProfessor->setCodigo($row['codigo_professor']);
         $objProfessor->setNome($row['nome']);
         $objProfessorDisciplina->setQtdeDisciplina($row['disciplinas']);
         $objProfessorDisciplina->setObjProfessor($objProfessor);


         $retornoProfessoresDisicplina[]=$objProfessorDisciplina;
        }
      }

      return $retornoProfessoresDisicplina;


  }

  // lista no select todos os professores que leciona a disciplina passada por paramentro
  public function listaProfessoresDisciplina($codigoDisciplina){
      
     $query = "select professorDisciplina.codigo_profDisc, professor.nome from professorDisciplina inner join professor on professorDisciplina.codigo_professor = professor.codigo_professor where professorDisciplina.codigo_disciplina = '".$codigoDisciplina."'";
      $result = $this->executarQuery($query);
      $retornoProfessoresDisciplina = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){

         $objProfessor = new Professor();
         $objProfessor->setNome($row['nome']);

         $objProfDisc = new ProfessorDisciplina();
         $objProfDisc->setCodigo($row['codigo_profDisc']);
         $objProfDisc->setObjProfessor($objProfessor);

  
         $retornoProfessoresDisciplina[]=$objProfDisc;
        }
      }

      return $retornoProfessoresDisciplina;


  }

  public function listaDisciplinasProfessor($codigoProfessor){
      
      $query = "select professorDisciplina.codigo_profDisc,professorDisciplina.codigo_disciplina, disciplina.nome from professorDisciplina inner join disciplina on professorDisciplina.codigo_disciplina = disciplina.codigo_disciplina where professorDisciplina.codigo_professor=".$codigoProfessor;
      $result = $this->executarQuery($query);
      $retornoDisicplinasProfessor = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){

         $objDisciplina = new Disciplina();
         $objDisciplina->setCodigo($row['codigo_disciplina']);
         $objDisciplina->setNome($row['nome']);

         $objDisciplinasProfessor = new ProfessorDisciplina();
         
         $objDisciplinasProfessor->setCodigo($row['codigo_profDisc']);
         $objDisciplinasProfessor->setObjDisciplina($objDisciplina);


         $retornoDisicplinasProfessor[]=$objDisciplinasProfessor;
        }
      }

      return $retornoDisicplinasProfessor;


  }

  public function listaProfessoresSelect(){
      
      $query = "select codigo_professor,nome from professor where codigo_professor not in (select codigo_professor from professorDisciplina)";
      $result = $this->executarQuery($query);
      $retornoProfessores = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         $objProfessor = new Professor();
         $objProfessor->setCodigo($row['codigo_professor']);
         $objProfessor->setNome($row['nome']);
         $retornoProfessores[]=$objProfessor;
        }
      }

      return $retornoProfessores;


  }

    public function listaDisciplinasSelect($codigoProfessor){
      
      $query = "select codigo_disciplina,nome from disciplina where codigo_disciplina not in (select codigo_disciplina from professorDisciplina where codigo_professor = ".$codigoProfessor.")";
      $result = $this->executarQuery($query);
      $retornoDisciplinas = array();

      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         $objDisciplina= new Professor();
         $objDisciplina->setCodigo($row['codigo_disciplina']);
         $objDisciplina->setNome($row['nome']);
         $retornoDisciplinas[]=$objDisciplina;
        }
      }

      return $retornoDisciplinas;


  }

  public function registroExiste($codigoProfessor,$codigoDisciplina){
    $query = "select * from professorDisciplina where codigo_professor = ".$codigoProfessor." and codigo_disciplina = '".$codigoDisciplina."'";
      $result = $this->executarQuery($query);

       if(mysqli_num_rows($result)>0){
         return 1;
       }else{
         return 0;
       }
      

  }


	
	public function insertProfessorDisciplina($objProfessorDisciplina){
      
        
       $query = "insert into professorDisciplina(codigo_disciplina, codigo_professor)values('".$objProfessorDisciplina->getObjDisciplina()->getCodigo()."',".$objProfessorDisciplina->getObjProfessor()->getCodigo().")";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}

	

	public function deleteProfessorDisciplinas($codigoProfessor){
      $query = "delete from professorDisciplina where codigo_professor=".$codigoProfessor;
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

  public function removeDisciplinaProfessor($codigoProfessorDisc){
      $query = "delete from professorDisciplina where codigo_profDisc=".$codigoProfessorDisc;
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
  }
	
}

?>