<?php
include_once "../../fbConexao/ProfessorDisciplinaDao.class.php";
include_once "../../model/Professor.class.php";
include_once "../../model/Disciplina.class.php";
/**
* 
*/
class ProfessorDisciplinaControl{

	
	
	public function __construct(){

	}



	public function listaProfessorDisciplinas(){
      $objDao = new ProfessorDisciplinaDao();
      $retornoLista = $objDao->listaProfessorDisciplinas();
      $class = '';
      foreach ($retornoLista as $obj) {
      	echo "<tr data-toggle = 'collapse' data-target = '#demo".$obj->getObjProfessor()->getCodigo()."' class = 'accordion-toggle' data-parent= '#accordion' id= '".$obj->getObjProfessor()->getCodigo()."' > ";
      	   echo "<td>".$obj->getObjProfessor()->getNome()."</td>";
      	   echo "<td>";
             echo "<select style='text-align:center;'>";  
                echo "<option selected disabled>".$obj->getQtdeDisciplina()." Disciplinas </option>";
                 $retornoListaDisci= $objDao->listaDisciplinasProfessor($obj->getObjProfessor()->getCodigo());
                   foreach ($retornoListaDisci as $obj2) {

                     echo  "<option disabled>".$obj2->getObjDisciplina()->getNome()."</option>";

                    }

             echo "</select>";
           echo "</td>";
          
               /*echo "<tr><td colspan = '6' class = 'hiddenRow' >";
               
                echo "<div id = 'demo".$obj->getObjProfessor()->getCodigo()."' class = 'accordian-body collapse' > ";
                    $retornoListaDisci= $objDao->listaDisciplinasProfessor($obj->getObjProfessor()->getCodigo());
                        foreach ($retornoListaDisci as $obj2) {
                        

                                echo  $obj2->getObjDisciplina()->getNome()."<br>";

                           

                        }
                echo " </div>" ;
                
                echo "</td></tr>"; */ 
                         
           
      	echo "</tr>";

        }


	}

      public function listaDisciplinasProfessor($codigoProfessor){
      $objDao = new ProfessorDisciplinaDao();
      $retornoLista = $objDao->listaDisciplinasProfessor($codigoProfessor);

      foreach ($retornoLista as $obj) {
            echo "<tr id='".$obj->getCodigo()."' data-toggle='tooltip' data-placement='top' title='Dois click para seleciona-lo!' >";
               echo "<td style='width:10%;'>".$obj->getObjDisciplina()->getCodigo()."</td>"; 
               echo "<td style='width:90%;'>".$obj->getObjDisciplina()->getNome()."</td>"; 
            echo "</tr>";

        }


      }

     

    	public function professoresDisciplinaSelect($codigoDisciplina){
    		$objDao = new ProfessorDisciplinaDao();
    		$retornoLista = $objDao->listaProfessoresDisciplina($codigoDisciplina);
    		echo "<option value=''>Selecione um Professor</option>";
    		foreach ($retornoLista as $obj) {
          	 
          echo "<option value='".$obj->getCodigo()."'>".$obj->getObjProfessor()->getNome()."</option>";
          	 
     

        }


    		
    	}
      
      public function listaProfessoresSelect(){
         $objDao = new ProfessorDisciplinaDao();
         $retornoLista = $objDao->listaProfessoresSelect();
         echo "<option value=''>Selecione um Professor</option>";
         foreach ($retornoLista as $obj) {
            echo "<option value='".$obj->getCodigo()."'>".$obj->getNome()."</option>";

          }
       
      }

      public function listaDisciplinasSelect($codigoProfessor){
         $objDao = new ProfessorDisciplinaDao();
         $retornoLista = $objDao->listaDisciplinasSelect($codigoProfessor);
         echo "<option value=''>Selecione um Disciplina</option>";
         foreach ($retornoLista as $obj) {
            echo "<option value='".$obj->getCodigo()."'>".$obj->getNome()."</option>";

          }
       
      }
	public function registroExiste($codigoProfessor,$codigoDisciplina){
	   $objDao = new ProfessorDisciplinaDao();
       return $objDao->registroExiste($codigoProfessor,$codigoDisciplina);
	}
      
     
	public function insertProfessorDisciplina($codigoProfessor,$codigoDisciplina){
	 $objDao = new ProfessorDisciplinaDao();
	   
	   $objProfDisciplina = new ProfessorDisciplina();
         $objProfessor = new Professor();
         $objProfessor->setCodigo($codigoProfessor);
         $ObjDisciplina	= new Disciplina();
         $ObjDisciplina->setCodigo($codigoDisciplina);
         $objProfDisciplina->setObjProfessor($objProfessor);
         $objProfDisciplina->setObjDisciplina($ObjDisciplina);
         $retorno = $objDao->insertProfessorDisciplina($objProfDisciplina);
       return $retorno;

	}
       /*
	public function updateProfessor($codigoProfessor,$nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone){
       $objDao = new ProfessorDao();
	   $objModelProfessor = new Professor();
	   

	   $objModelProfessor->setCodigo($codigoProfessor);
       $objModelProfessor->setCpf($cpf);
       $objModelProfessor->setNome($nome);
       $objModelProfessor->setRg($rg);
       $objModelProfessor->setDataNascimento($dtNascimento);
       $objModelProfessor->setSexo($sexo);
       $objModelProfessor->setCidade($cidade);
       $objModelProfessor->setBairro($bairro);
       $objModelProfessor->setUf($uf);
       $objModelProfessor->setLogradouro($logradouro);
       $objModelProfessor->setNumero($numero);
       $objModelProfessor->setEmail($email);
       $objModelProfessor->setTelefone($telefone);
       $retorno = $objDao->updateProfessor($objModelProfessor);
       return $retorno;
	}
       */

	public function deleteProfessorDisciplinas($codigoProfessor){
	   $objDao = new ProfessorDisciplinaDao();
       $retorno = $objDao->deleteProfessorDisciplinas($codigoProfessor);
       return $retorno;
	}

      public function removerDisciplinaProfessor($codigoProfessorDisc){
         $objDao = new ProfessorDisciplinaDao();
       $retorno = $objDao->removeDisciplinaProfessor($codigoProfessorDisc);
       return $retorno;
      }
	
   
}

?>