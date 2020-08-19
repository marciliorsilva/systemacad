<?php

/**
* 
*/
class Conexao{
	
   private $servidor="localhost:3307";
   private $usuario="root";
   private $senha="";
   private $banco="systemAcad";

   private $link = null;
   private $query = null;
   private $result = null;



	function Conexao()
	{
	
	}

	public function conectar(){
      $this->link = mysqli_connect($this->servidor,$this->usuario,$this->senha,$this->banco);
     
      if(mysqli_connect_errno()){
        echo "<script>alert('Falha na conexao com o Banco de Dados!');</script>";
        echo "<script>alert('Erro: '".mysqli_connect_errno()."');</script>";
        die();
      }
	}
  
	public function desconectar(){
      return mysqli_close($this->link);
  } 
    
  
	public function executarQuery($query){
      $this->conectar();
      $this->query = $query;
     
      
      if( $this->result= mysqli_query($this->link, $this->query)){
        $this->desconectar();
        return $this->result;
      }else{
        echo "<script>alert('Ocorreu um erro na execução da SQL... SQL: "+$query+"');</script>";
        echo "<script>alert('Erro: ".mysqli_error($this->link).");</script>";
        die();
        $this->desconectar();
      }
  }

  public function retornarUltimoId($query){
      $this->conectar();
      $this->query = $query;
     
      
      if( $this->result= mysqli_query($this->link, $this->query)){
        
        return mysqli_insert_id($this->link);
        $this->desconectar();
      }else{
        echo "<script>alert('Ocorreu um erro na execução da SQL... SQL: "+$query+"');</script>";
        echo "<script>alert('Erro: ".mysqli_error($this->link).");</script>";
        die();
        $this->desconectar();
      }
  }


}


 ?>