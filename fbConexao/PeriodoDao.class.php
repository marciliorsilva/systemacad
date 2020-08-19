<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Periodo.class.php";

/**
* 
*/
class PeriodoDao extends Conexao{
	
  
    
	function __construct(){
      
	}


	public function listaPeriodos(){
      
      $query = "select * from periodo";
      $result = $this->executarQuery($query);
      $retornoPeriodos = array();

      if(mysqli_num_rows($result)>0){

      	while($row = mysqli_fetch_assoc($result)){
         $objPeriodo = new Periodo();
         $objPeriodo->setCodigo($row['codigo_periodo']);
         $objPeriodo->setNome($row['nome']);
         $retornoPeriodos[]=$objPeriodo;
      	}
      }

      return $retornoPeriodos;


	}

	public function selectPeriodo($codigoPeriodo){
     $query = "select * from periodo where codigo_periodo='".$codigoPeriodo."'";
     $result = $this->executarQuery($query);
     $objPeriodo = new Periodo();
     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         $objPeriodo->setCodigo($row['codigo_periodo']);
         $objPeriodo->setNome($row['nome']);
         
         
        }
      }
     return $objPeriodo;
	}

	public function insertPeriodo($objPeriodo){
      
        
       $query = "insert into periodo(nome)values('".$objPeriodo->getNome()."')";
       $result = $this->executarQuery($query);
       if($result){
         return 1;
       }else{
         return 0;
       }

	}

	public function updatePeriodo($objPeriodo){
     $query = "update periodo set  nome='".$objPeriodo->getNome()."' where codigo_periodo='".$objPeriodo->getCodigo()."'";
      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deletePeriodo($codigoPeriodo){
      $query = "delete from periodo where codigo_periodo='".$codigoPeriodo."'";
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>