<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Disciplina.class.php";

/**
* 
*/
class DisciplinaDao extends Conexao{
	
  
    
	function __construct(){
      
	}


	public function listaDisciplinas(){
      
      $query = "select * from disciplina";
      $result = $this->executarQuery($query);
      $retornoDisciplinas = array();

      if(mysqli_num_rows($result)>0){

      	while($row = mysqli_fetch_assoc($result)){
         $objDisciplina = new Disciplina();
         $objDisciplina->setCodigo($row['codigo_disciplina']);
         $objDisciplina->setNome($row['nome']);
         $retornoDisciplinas[]=$objDisciplina;
      	}
      }

      return $retornoDisciplinas;


	}

	public function selectDisciplina($codigoDisciplina){
     $query = "select * from disciplina where codigo_disciplina='".$codigoDisciplina."'";
     $result = $this->executarQuery($query);
     $objDisciplina = new Disciplina();
     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         $objDisciplina->setCodigo($row['codigo_disciplina']);
         $objDisciplina->setNome($row['nome']);
         
         
        }
      }
     return $objDisciplina;
	}

	public function insertDisciplina($objDisciplina){
      
        
       $query = "insert into disciplina(codigo_disciplina,nome)values('".$objDisciplina->getCodigo()."','".$objDisciplina->getNome()."')";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}

	public function updateDisciplina($objDisciplina){
     $query = "update disciplina set codigo_disciplina='".$objDisciplina->getCodigo()."', nome='".$objDisciplina->getNome()."' where codigo_disciplina='".$objDisciplina->getCodigo()."'";
      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deleteDisciplina($codigoDisciplina){
      $query = "delete from disciplina where codigo_disciplina='".$codigoDisciplina."'";
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>