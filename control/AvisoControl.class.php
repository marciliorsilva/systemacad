<?php
include_once "../../fbConexao/AvisoDao.class.php";
include_once "../../model/Aviso.class.php";
include_once "../../model/Usuario.class.php";
/**
* 
*/
class AvisoControl{

	
	
	public function __construct(){

	}

      /*

	public function listaAvisos(){
      $objDao = new AvisoDao();
      $retornoLista = $objDao->listaAvisos();
      foreach ($retornoLista as $obj) {
      	echo '<tr id='.$obj->getCodigo().'>';
      	   echo "<td>".$obj->getCodigo()."</td>";
              
      	   echo "<td>".$obj->getNome()."</td>";
      	   echo "<td>".$obj->getCpf()."</td>";
      	   echo "<td>".$obj->getRg()."</td>";
      	   $data = str_replace("-", "/", $obj->getDataNascimento());
           $dtNascimento = date('d-m-Y',strtotime($data));
      	   echo "<td>".$dtNascimento."</td>";
      	   
      	echo "</tr>";

      }


	}

	public function comboBoxListaAvisos(){
		$objAvisoDao = new AvisoDao();
		$retornoLista = $objAvisoDao->listaAvisoes();
		echo "<option value=''>Selecione um Aviso</option>";
		foreach ($retornoLista as $obj) {
      	 
      	  echo "<option value='".$obj->getCodigo()."'>".$obj->getNome()."</option>";
      	 
 

        }


		
	}*/

	public function selectAviso($codigoAviso){
	   $objDao = new AvisoDao();
       return $objDao->selectAviso($codigoAviso);
	}

	public function insertAviso($assunto,$img,$mensagem,$codigoUsuario){
	 $objDao = new AvisoDao();
	   
	 $objModelAviso = new Aviso();	 
       $objModelUsuario = new Usuario();
       $objModelUsuario->setCodigo($codigoUsuario);
       $objModelAviso->setAssunto($assunto); 
       $objModelAviso->setImg($img);
       $objModelAviso->setMensagem($mensagem);
       $objModelAviso->setObjUsuario($objModelUsuario);
       $retorno = $objDao->insertAviso($objModelAviso);
       return $retorno;

	}

      

	public function updateAviso($codigoAviso, $assunto,$img,$mensagem){
       $objDao = new AvisoDao();
	   $objModelAviso = new Aviso();
	   

       $objModelAviso->setCodigo($codigoAviso);
       $objModelAviso->setAssunto($assunto); 
       $objModelAviso->setImg($img);
       $objModelAviso->setMensagem($mensagem);
       $retorno = $objDao->updateAviso($objModelAviso);
       return $retorno;
	}

     
	public function deleteAviso($codigoAviso){
	 $objDao = new AvisoDao();
       $retorno = $objDao->deleteAviso($codigoAviso);
       return $retorno;
	}

      public function validarImg($img){
        
         

   
      }
	

}

?>