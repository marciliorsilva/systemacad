<?php
include_once "../../fbConexao/AvisoCursoDao.class.php";
include_once "../../model/AvisoCurso.class.php";
include_once "../../model/Aviso.class.php";
include_once "../../model/Curso.class.php";
/**
* 
*/
class AvisoCursoControl{
	



  public function __construct(){

  }


	public function listaAvisoCursoUsuario($codigoUsuario,$nomeUsuario,$sexo){

      $objDao = new AvisoCursoDao();
      $retornoLista = $objDao->listaAvisoCursoUsuario($codigoUsuario);
      if(count($retornoLista) > 0){

            foreach ($retornoLista as $obj) {
        

                echo "<div class='panel panel-default' id='msgSecretaria'>";
                 echo "<div class='panel-heading'>".$obj->getObjAviso()->getAssunto()."</div>";
                   echo "<div class='panel-body'>";
                      echo "<div class='media'>";

                        echo   "<div class='media-left'>";

                          if($sexo == 'M'){
                            echo  " <img src='../../paginas/secretaria/img-avisos/img_avatar2.png'  class='media-object' style='width:80px;margin-top:1px'>";
                          }else{
                            echo  " <img src='../../paginas/secretaria/img-avisos/img_avatar6.png'  class='media-object' style='width:80px;margin-top:1px'>";
                          }
                         
                          echo "</div>";
                           echo" <div class='media-body'>";

                            if($obj->getAssuntosRepetidos() > 1){
                              echo "<h4 class='media-heading'>".$nomeUsuario." (Secretaria) <small><i> Postado em ".$obj->getObjAviso()->getData()."   <br>Para: Todos os cursos. </i></small></h4>";

                            }else{

                               echo "<h4 class='media-heading'>".$nomeUsuario." (Secretaria) <small><i> Postado em ".$obj->getObjAviso()->getData()."   <br>Para:  ".$obj->getObjCurso()->getNome()." - ".$obj->getObjCurso()->getTurno()."</i></small></h4>";

                            }
                             

                              if($obj->getObjAviso()->getImg() == null || $obj->getObjAviso()->getImg() == " "){

                                

                              }else{
                                echo  "<img class='img-responsive' style='margin: 0 auto;' src='../../paginas/secretaria/img-avisos/ ".$obj->getObjAviso()->getImg()." '  alt='img-aviso' width='460' height='345'>";
                              }

                              
                             
                           echo" <p>".$obj->getObjAviso()->getMensagem()."</p>";
              
                        echo "</div>";
                      echo "</div>";
                    echo "</div>";
                    
                    echo "<div class='panel-footer' ><div id='botao-footer'><button id='btnExcluir' class='btn btn-default' onclick='excluirAviso(".$obj->getCodigo().",this)'>Excluir</button></div></div>";
                 echo "</div>";
                    
             

          }


      }else{
        echo "<center>Sem Avisos...</center>";
      }

	}


	public function insertAvisoCurso($codigoCurso,$codigoAviso){
	 $objDao = new AvisoCursoDao();
       
       $objCurso = new Curso();
       $objCurso->setCodigo($codigoCurso);
       $objAviso = new Aviso();
       $objAviso->setCodigo($codigoAviso);
       
       
	   $objAvisoCurso = new AvisoCurso();
	   
	   $objAvisoCurso->setObjCurso($objCurso);
	   $objAvisoCurso->setObjAviso($objAviso);
       $retorno = $objDao->insertAvisoCurso($objAvisoCurso);
       return $retorno;

	}


      /*
	public function updateAvisoCurso($codigoCursoDisc,$ch,$codigoCurso,$codigoAviso,$codigoPeriodo){
       $objDao = new AvisoCursoDao();
       $objCurso = new Curso();
       $objCurso->setCodigo($codigoCurso);
       $objAviso = new Aviso();
       $objAviso->setCodigo($codigoAviso);
       $objPeriodo = new Periodo();
       $objPeriodo->setCodigo($codigoPeriodo);
       
	   $objAvisoCurso = new AvisoCurso();
	   $objAvisoCurso->setCodigo($codigoCursoDisc);
	   $objAvisoCurso->setCargaHoraria($ch);
	   $objAvisoCurso->setObjCurso($objCurso);
	   $objAvisoCurso->setObjAviso($objAviso);
	   $objAvisoCurso->setObjPeriodo($objPeriodo);
       $retorno = $objDao->updateAvisoCurso($objAvisoCurso);
       return $retorno;
	}*/

	public function deleteAvisoCurso($codigoAvisoCurso){
	   $objDao = new AvisoCursoDao();
       $retorno = $objDao->deleteAvisoCurso($codigoAvisoCurso);
       return $retorno;
	}
	

}

?>