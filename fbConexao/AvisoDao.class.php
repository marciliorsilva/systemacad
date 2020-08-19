<?php
include_once "../../fbConexao/Conexao.class.php";
include_once "../../model/Aviso.class.php";
include_once "../../model/Usuario.class.php";

/**
* 
*/
class AvisoDao extends Conexao{
	
  
    
	function __construct(){
      
	}

  
	public function selectAvisosusuario($codigoUsuario){
      
      $query = "select aviso.codigo_aviso,aviso.assunto,aviso.dataAviso,aviso.img,aviso.mensagem, count(assunto) as qtadeAssuntos, aviso.codigo_usuario from avisoCurso inner join aviso on avisoCurso.codigo_aviso = aviso.codigo_aviso where codigo_usuario = ".$codigoUsuario." group by assunto";
      $result = $this->executarQuery($query);
      $retornoAvisos = array();
 
      if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
         $objAviso = new Aviso();
         $objUsuario = new Usuario();
         $objUsuario->setCodigo($row['codigo_usuario']);
         $objAviso->setCodigo($row['codigo_aviso']);
         $objAviso->setAssunto($row['assunto']);
         $objAviso->setData($row['dataAviso']);
         $objAviso->setImg($row['img']);
         $objAviso->setMensagem($row['mensagem']);
         
         $objAviso->setObjUsuario($objUsuario);
         $retornoAvisos[]=$objAviso;
        }
      }

      return $retornoAvisos;


  }

	public function selectAviso($codigoAviso){
     $query = "select * where codigo_aviso=".$codigoAviso;
     $result = $this->executarQuery($query);
     $objAviso = new Aviso();
     $objUsuario = new Usuario();

     if(mysqli_num_rows($result)>0){

        while($row = mysqli_fetch_assoc($result)){
        
         $objUsuario->setCodigo($row['codigo_usuario']);
         $objAviso->setCodigo($row['codigo_aviso']);
         $objAviso->setAssunto($row['assunto']);
         $objAviso->setData($row['dataAviso']);
         $objAviso->setImg($row['img']);
         $objAviso->setMensagem($row['mensagem']);
         $objAviso->setObjUsuario($objUsuario);
         
         
        }
      }
     return $objAviso;
	}

	public function insertAviso($objAviso){
      
        
       $query = "insert into aviso(assunto, img, mensagem, codigo_usuario)values('".$objAviso->getAssunto()."','".$objAviso->getImg()."','".$objAviso->getMensagem()."',".$objAviso->getObjUsuario()->getCodigo().")";
       $result = $this->retornarUltimoId($query);
       if($result){
         return $result;
       }else{
         return 0;
       }

	}

	public function updateAviso($objAviso){
     $query = "update aviso set  assunto='".$objAviso->getAssunto()."',img='".$objAviso->getImg()."', mensagem='".$objAviso->getMensagem()."' where codigo_aviso=".$objAviso->getCodigo();
      $result = $this->executarQuery($query);
     
      if($result){
         return 1;
      }else{
         return 0;
      }
	}

	public function deleteAviso($codigoAviso){
      $query = "delete from aviso where codigo_aviso=".$codigoAviso;
      $result = $this->executarQuery($query);
      if($result){
         return 1;
      }else{
         return 0;
      }
	}
	
}

?>