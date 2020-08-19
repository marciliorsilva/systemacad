<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Usuario.class.php";

/**
* 
*/
class UsuarioDao extends Conexao{
	
  
    
	function __construct(){
      
	}

  
	
	public function selectUsuario($codigoUsuario){
     $query = "select * from usuario where codigo_usuario=".$codigoUsuario;
     $result = $this->executarQuery($query);
     $objUsuario = new Usuario();
     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         $objUsuario = new Usuario();
         $objUsuario->setCodigo($row['codigo_usuario']);
         $objUsuario->setSenha($row['senha']);
         $objUsuario->setNivelAcesso($row['nivelAcesso']);
         
         
        }
      }
     return $objUsuario;
	}

 

	public function insertUsuario($objUsuario){
      
        
       $query = "insert into usuario(senha,nivelAcesso)values('".$objUsuario->getSenha()."','".$objUsuario->getNivelAcesso()."')";
       $result = $this->retornarUltimoId($query);
       if($result){
         return $result;
       }else{
         return 0;
       }

	}

	public function updateUsuario($objUsuario){
     $query = "update usuario set  senha='".$objUsuario->getSenha()."', nivelAcesso='".$objUsuario->getNivelAcesso()."' where codigo_usuario='".$objUsuario->getCodigo()."'";
      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deleteUsuario($codigoUsuario){
      $query = "delete from usuario where codigo_usuario='".$codigoUsuario."'";
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>