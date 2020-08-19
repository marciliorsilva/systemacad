<?php 
include_once "../../control/LoginSecretariaControl.class.php";
include_once "../../control/CursoControl.class.php";
include_once "../../control/DisciplinaControl.class.php";
include_once "../../control/PeriodoControl.class.php";
include_once "../../control/CursoDisciplinaControl.class.php";
include_once "../../control/UsuarioControl.class.php";
include_once "../../control/ProfessorControl.class.php";
include_once "../../control/TurmaControl.class.php";
include_once "../../control/AlunoControl.class.php";
include_once "../../control/MatriculaControl.class.php";
include_once "../../control/ProfessorDisciplinaControl.class.php";
include_once "../../control/FuncionarioControl.class.php";
include_once "../../control/AvisoControl.class.php";
include_once "../../control/AvisoCursoControl.class.php";
include_once "../../control/LoginSecretariaControl.class.php";


$objControlCurso = new CursoControl();
$objControlDisciplina = new DisciplinaControl();
$objControlPeriodo = new PeriodoControl();
$objControlCursoDisciplina = new CursoDisciplinaControl();
$objControlUsuario = new UsuarioControl();
$objControlProfessor = new ProfessorControl();
$objControlFuncionario = new FuncionarioControl();
$objControlProfessorDisciplina = new ProfessorDisciplinaControl();
$objControlAluno = new AlunoControl();
$objControlAviso = new AvisoControl();
$objControlMatricula = new MatriculaControl();
$objControlLogin = new LoginSecretariaControl();
$objControlAvisoCurso = new AvisoCursoControl();
$objControlTurma = new TurmaControl();



$metodo = $_POST['metodo'];
$entidade = $_POST['entidade'];
$retorno="";


switch ($entidade) {
	
    case 'curso':
        switch ($metodo) {
	
            case 'incluir':
               $codigo = $_POST['codigo'];
               $nome = $_POST['nome'];
               $cargaHoraria = $_POST['cargaHoraria'];
               $turno = $_POST['turno'];
               $qtdePeriodo = $_POST['qtdePeriodo'];
               $retorno = $objControlCurso->insertCurso($codigo,$nome,$cargaHoraria,$turno,$qtdePeriodo);
        
               if($retorno == 1){
      	          echo true;
               }else{
                 echo false;
               }
    
               break;

            case 'consultar':
               $codigo = $_POST['codigo'];
               $nome = $_POST['nome'];
               $cargaHoraria = $_POST['cargaHoraria'];
               $turno = $_POST['turno'];
               $qtdePeriodo = $_POST['qtdePeriodo'];
               $retorno = $objControlCurso->updateCurso($codigo,$nome,$cargaHoraria,$turno,$qtdePeriodo);       
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
        
               break;
            case 'excluir':
               $codigo = $_POST['cod'];
               $retorno = $objControlCurso->deleteCurso($codigo);
               if($retorno == 1){
      	          echo true;
               }else{
                 echo false;
               }
       
               break;
        }

    
        break;

    case 'disciplina':
        switch ($metodo) {
  
            case 'incluir':
               $codigo = $_POST['codigo'];
               $nome = $_POST['nome'];
               $retorno = $objControlDisciplina->insertDisciplina($codigo,$nome);
        
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
    
               break;

            case 'consultar':
               $codigo = $_POST['codigo'];
               $nome = $_POST['nome'];
               $retorno = $objControlDisciplina->updateDisciplina($codigo,$nome);
        
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
        
               break;
            case 'excluir':
               $codigo = $_POST['cod'];
               $retorno = $objControlDisciplina->deleteDisciplina($codigo);
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
       
               break;
        }
        
        break;

    case 'periodo':
        switch ($metodo) {
  
            case 'incluir':
              
               $nome = $_POST['nome'];
               $retorno = $objControlPeriodo->insertPeriodo($nome);
        
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
    
               break;

            case 'consultar':
               $codigo = $_POST['codigo'];
               $nome = $_POST['nome'];
               $retorno = $objControlPeriodo->updatePeriodo($codigo,$nome);
        
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
        
               break;
            case 'excluir':
               $codigo = $_POST['cod'];
               $retorno = $objControlPeriodo->deleteDisciplina($codigo);
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
       
               break;
        }
        break;
        
       case 'professor':
        switch ($metodo) {
  
            case 'incluir':
               
               $nome = $_POST['nome'];
               $cpf = $_POST['cpf'];
               $rg = $_POST['rg'];
               $data = str_replace("/", "-", $_POST['data']);
               $dtNascimento = date('Y-m-d',strtotime($data));
               $sexo = $_POST['sexo'];
               $cidade = $_POST['cidade'];
               $bairro = $_POST['bairro'];
               $uf = $_POST['uf'];
               $logradouro = $_POST['logradouro'];
               $numero = $_POST['numero'];
               $email = $_POST['email'];
               $telefone = $_POST['telefone'];
               $senha = $_POST['senha'];
               $nivel = $_POST['nivel'];
               
               $idInsert = $objControlUsuario->insertUsuario($senha,$nivel);
               
               if($idInsert!=0){
                
                $objUSuario  = $objControlUsuario->selectUsuario($idInsert);

                $insertProfessor = $objControlProfessor->insertProfessor($nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone,$objUSuario);
                  if($insertProfessor==1){
                    echo true;
                  }else{
                    echo false;
                  }
               }
                 
              
                 echo false;
               
    
               break;

            case 'consultar':
               $codigoProfessor = $_POST['codigoProfessor'];
               $nome = $_POST['nome'];
               $cpf = $_POST['cpf'];
               $rg = $_POST['rg'];
               $data = str_replace("/", "-", $_POST['data']);
               $dtNascimento = date('Y-m-d',strtotime($data));
               $sexo = $_POST['sexo'];
               $cidade = $_POST['cidade'];
               $bairro = $_POST['bairro'];
               $uf = $_POST['uf'];
               $logradouro = $_POST['logradouro'];
               $numero = $_POST['numero'];
               $email = $_POST['email'];
               $telefone = $_POST['telefone'];
               $codigoUsuario = $_POST['codigoUsuario'];
               $senha = $_POST['senha'];
               $nivel = $_POST['nivel'];


               $updateUsuarioRetorno = $objControlUsuario->updateUsuario($codigoUsuario,$senha,$nivel);
               if($updateUsuarioRetorno == 1){
                   $updateProfessorRetorno = $objControlProfessor->updateProfessor($codigoProfessor,$nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone);
                   if($updateProfessorRetorno == 1){
                     echo true;
                   }else{
                    echo false;
                   }

               }
               echo false;

        
               
        
               break;
            case 'excluir':

               $codigo = $_POST['cod'];
               
               $objModelProfessor = $objControlProfessor->selectProfessor($codigo);
              
               $retornoProfessorDelete = $objControlProfessor->deleteProfessor($codigo);
               
               if($retornoProfessorDelete == 1){
                  
                  $retornoUsuarioDelete = $objControlUsuario->deleteUsuario($objModelProfessor->getObjUsuario()->getCodigo());
                   if($retornoUsuarioDelete == 1){
                  
                    echo true;

                   }else{

                    echo false;

                   }
                  
               }else{
                 echo false;
               }
       
               break;
          }

        break;

        case 'funcionario':
        switch ($metodo) {
  
            case 'incluir':
               
               $nome = $_POST['nome'];
               $cpf = $_POST['cpf'];
               $rg = $_POST['rg'];
               $data = str_replace("/", "-", $_POST['data']);
               $dtNascimento = date('Y-m-d',strtotime($data));
               $sexo = $_POST['sexo'];
               $cidade = $_POST['cidade'];
               $bairro = $_POST['bairro'];
               $uf = $_POST['uf'];
               $logradouro = $_POST['logradouro'];
               $numero = $_POST['numero'];
               $email = $_POST['email'];
               $telefone = $_POST['telefone'];
               $senha = $_POST['senha'];
               $nivel = $_POST['nivel'];
               
               $idInsert = $objControlUsuario->insertUsuario($senha,$nivel);
               
               if($idInsert!=0){
                
                $objUSuario  = $objControlUsuario->selectUsuario($idInsert);

                $insertFuncionario = $objControlFuncionario->insertFuncionario($nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone,$objUSuario);
                  if($insertFuncionario==1){
                    echo true;
                  }else{
                    echo false;
                  }
               }
                 
              
                 echo false;
               
    
               break;

            case 'consultar':
               $codigoFuncionario = $_POST['codigoFuncionario'];
               $nome = $_POST['nome'];
               $cpf = $_POST['cpf'];
               $rg = $_POST['rg'];
               $data = str_replace("/", "-", $_POST['data']);
               $dtNascimento = date('Y-m-d',strtotime($data));
               $sexo = $_POST['sexo'];
               $cidade = $_POST['cidade'];
               $bairro = $_POST['bairro'];
               $uf = $_POST['uf'];
               $logradouro = $_POST['logradouro'];
               $numero = $_POST['numero'];
               $email = $_POST['email'];
               $telefone = $_POST['telefone'];
               $codigoUsuario = $_POST['codigoUsuario'];
               $senha = $_POST['senha'];
               $nivel = $_POST['nivel'];


               $updateUsuarioRetorno = $objControlUsuario->updateUsuario($codigoUsuario,$senha,$nivel);
               if($updateUsuarioRetorno == 1){
                   $updateFuncionarioRetorno = $objControlFuncionario->updateProfessor($codigoFuncionario,$nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone);
                   if($updateFuncionarioRetorno == 1){
                     echo true;
                   }else{
                    echo false;
                   }

               }
               echo false;

        
               
        
               break;
            case 'excluir':

               $codigo = $_POST['cod'];
               
               $objModelFuncionario = $objControlFuncionario->selectFuncionario($codigo);
              
               $retornoFuncionarioDelete = $objControlFuncionario->deleteFuncionario($codigo);
               
               if($retornoFuncionarioDelete == 1){
                  
                  $retornoUsuarioDelete = $objControlUsuario->deleteUsuario($objModelProfessor->getObjUsuario()->getCodigo());
                   if($retornoUsuarioDelete == 1){
                  
                    echo true;

                   }else{

                    echo false;

                   }
                  
               }else{
                 echo false;
               }
       
               break;
          }

        break;

        case 'aluno':
        switch ($metodo) {
  
            case 'incluir':
               
               $codigoCurso = $_POST['codigoCurso'];
               $codigoMatricula = $_POST['codigoMatricula'];
               $nome = $_POST['nome'];
               $cpf = $_POST['cpf'];
               $rg = $_POST['rg'];
               $data = str_replace("/", "-", $_POST['data']);
               $dtNascimento = date('Y-m-d',strtotime($data));
               $sexo = $_POST['sexo'];
               $cidade = $_POST['cidade'];
               $bairro = $_POST['bairro'];
               $uf = $_POST['uf'];
               $logradouro = $_POST['logradouro'];
               $numero = $_POST['numero'];
               $email = $_POST['email'];
               $telefone = $_POST['telefone'];
               $senha = $_POST['senha'];
               $nivel = $_POST['nivel'];
               
               $idInsert = $objControlUsuario->insertUsuario($senha,$nivel);
               
               if($idInsert!=0){
                
                  $objUSuario  = $objControlUsuario->selectUsuario($idInsert);

                  $idInsertAluno = $objControlAluno->insertAluno($nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone,$objUSuario);
                  
                  if($idInsertAluno!=0){
                     $objAluno = $objControlAluno->selectAluno($idInsertAluno); 
                     $objCurso = $objControlCurso->selectCurso($codigoCurso);
                     $retorno = $objControlMatricula->insertMatricula($codigoMatricula,$objCurso,$objAluno);
                     if($retorno == 1){
                       echo true;
                     }else{
                       echo false;
                     }


                  }else{
                    echo false;
                  }

                }
                 
              
                 echo false;
               
    
               break;

            case 'consultar':
               $codigoAluno = $_POST['codigoAluno'];
               $codigoUsuario = $_POST['codigoUsuario'];
               $nome = $_POST['nome'];
               $cpf = $_POST['cpf'];
               $rg = $_POST['rg'];
               $data = str_replace("/", "-", $_POST['data']);
               $dtNascimento = date('Y-m-d',strtotime($data));
               $sexo = $_POST['sexo'];
               $cidade = $_POST['cidade'];
               $bairro = $_POST['bairro'];
               $uf = $_POST['uf'];
               $logradouro = $_POST['logradouro'];
               $numero = $_POST['numero'];
               $email = $_POST['email'];
               $telefone = $_POST['telefone'];
               $senha = $_POST['senha'];
               $nivel = $_POST['nivel'];


               $updateUsuarioRetorno = $objControlUsuario->updateUsuario($codigoUsuario,$senha,$nivel);
               if($updateUsuarioRetorno == 1){
                   $updateAlunoRetorno = $objControlAluno->updateAluno($codigoAluno,$nome,$cpf,$rg,$dtNascimento,$sexo,$cidade,$bairro,$uf,$logradouro,$numero,$email,$telefone);
                   if($updateAlunoRetorno == 1){
                     echo true;
                   }else{
                    echo false;
                   }

               }
               echo false;

        
               
        
               break;
            case 'excluir':

               $codigo = $_POST['cod'];
               
               $objModelAluno = $objControlAluno->selectAluno($codigo);
              
               $retornoExclusaoMatricula = $objControlMatricula->deleteMatriculaAluno($codigo);

               if($retornoExclusaoMatricula==1){

                  $retornoAlunoDelete = $objControlAluno->deleteAluno($codigo);

                  if($retornoAlunoDelete == 1){
                  
                      $retornoUsuarioDelete = $objControlUsuario->deleteUsuario($objModelAluno->getObjUsuario()->getCodigo());
                   
                      if($retornoUsuarioDelete == 1){
                  
                         echo true;

                      }else{

                          echo false;

                      }
                  
                   }else{
                      echo false;
                   }

               }else{
                 echo false;
               }
              
               

       
               break;
          }

        break;


        case 'cursoDisciplina':
        switch ($metodo) {
  
            case 'incluir':
              
               $codigoCurso = $_POST['codigoCurso'];
               $codigoDisciplina = $_POST['codigoDisciplina'];
               $codigoPeriodo = $_POST['codigoPeriodo'];
               $ch = $_POST['ch'];
               $retorno = $objControlCursoDisciplina->insertCursoDisciplina($ch,$codigoCurso,$codigoDisciplina,$codigoPeriodo);
        
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
    
               break;

            case 'consultar':
               $codigoCursoDisc = $_POST['codigoCursoDisc'];
               $codigoCurso = $_POST['codigoCurso'];
               $codigoDisciplina = $_POST['codigoDisciplina'];
               $codigoPeriodo = $_POST['codigoPeriodo'];
               $ch = $_POST['ch'];
               $retorno = $objControlCursoDisciplina->updateCursoDisciplina($codigoCursoDisc,$ch,$codigoCurso,$codigoDisciplina,$codigoPeriodo);
        
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
        
               break;
            case 'excluir':
               $codigo = $_POST['cod'];
               $retorno = $objControlCursoDisciplina->deleteCursoDisciplina($codigo);
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
       
               break;
        }
        break;

        case 'professorDisciplina':
        switch ($metodo) {
  
            case 'incluir':
              
               $codigoProfessor = $_POST['codigoProfessor'];
               $codigoDisciplina = $_POST['codigoDisciplina'];
               
                
               
               $retorno = $objControlProfessorDisciplina->insertProfessorDisciplina($codigoProfessor,$codigoDisciplina);
        
                   if($retorno == 1){
                      echo true;
                   }else{
                      echo false;
                   }   
                
               
    
               break;

            case 'consultar':
               
               $codigoProfessor = $_POST['codigoProfessor'];
               $codigoDisciplina = $_POST['codigoDisciplina'];
               
                
               
               $retorno = $objControlProfessorDisciplina->insertProfessorDisciplina($codigoProfessor,$codigoDisciplina);
        
                   if($retorno == 1){
                   
                
                    echo $objControlProfessorDisciplina->listaDisciplinasProfessor($codigoProfessor);
                   }else{
                      echo false;
                   }   
        
               break;
            case 'excluir':

              
               $codigo = $_POST['cod'];
               $retorno = $objControlProfessorDisciplina->deleteProfessorDisciplinas($codigo);
               if($retorno == 1){
                  echo true;
               }else{
                 echo false;
               }
       
               break;
            case 'remover':

               $codigoProfessor = $_POST['codigoProfessor'];
               $codigo = $_POST['cod'];
               $retorno = $objControlProfessorDisciplina->removerDisciplinaProfessor($codigo);
               if($retorno == 1){
                  echo $objControlProfessorDisciplina->listaDisciplinasSelect($codigoProfessor);
               }else{
                 echo false;
               }
       
               break;
        }
        break;

        case 'login':
        switch ($metodo) {
  
            case 'logar':
              
                  $usuario = $_POST['user'];
                  $senha = $_POST['password'];
               
                  $retorno = $objControlLogin->logar($usuario,$senha);
                  if($retorno == null ){
                    echo true;
                  }else if($retorno == 1){
                     echo false;
                  }else{
                    echo $retorno; 
                  }
                  
                  
            
               
    
               break;

            case 'primeiroAcesso-validarEmail':
               
               $email = $_POST['email'];
               $emailUser = unserialize($objControlLogin->getUser())->getEmail(); 
               
               if($email == $emailUser){
                
                echo true;

               }else{

                 echo false;
               } 

               break;

             case 'primeiroAcesso-alterarSenha':
               
               $novaSenha = $_POST['novaSenha'];
               $codigo = unserialize($objControlLogin->getUser())->getObjUsuario()->getCodigo(); 
              
               
               $retorno = $objControlLogin->alterarSenha($codigo,$novaSenha);
               if($retorno == 1){
                
                echo true;

               }else{

                 echo false;
               } 

               break;
            
          
        }
        break;

        case 'aviso':
        switch ($metodo) {
  
            case 'publicar':
                
               $assunto = $_POST['assunto'];
               $rementente = $_POST['rementente'];
               $img = $_FILES["img-aviso"]["tmp_name"];
               $mensagem = $_POST['mensagem'];
               $nome = unserialize($objControlLogin->getUser())->getNome();
               $sexo = unserialize($objControlLogin->getUser())->getSexo();
               $codigo = unserialize($objControlLogin->getUser())->getObjUsuario()->getCodigo();
               
                if($rementente == 'todos'){

                                                 
                        if ( isset( $_FILES[ 'img-aviso' ][ 'name' ] ) && $_FILES[ 'img-aviso' ][ 'error' ] == 0 ) {

                          $arquivo_tmp = $_FILES[ 'img-aviso' ][ 'tmp_name' ];
                          $nome = $_FILES[ 'img-aviso' ][ 'name' ];
                       
                          // Pega a extensão
                          $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
                       
                          // Converte a extensão para minúsculo
                          $extensao = strtolower ( $extensao );

                                  if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                                          // Cria um nome único para esta imagem
                                          // Evita que duplique as imagens no servidor.
                                          // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                                          $novoNome = uniqid ( time () ) . '.' . $extensao;
                                   
                                          // Concatena a pasta com o nome
                                          $destino = '../../paginas/secretaria/img-avisos/ ' . $novoNome;

                                          //retornando o id inserido
                                          $retornoId = $objControlAviso->insertAviso($assunto,$novoNome,$mensagem,$codigo);
                                           
                                           // verificando se retornou o id do ultimo aviso cadastrado
                                           if($retornoId != 0){
                                            
                                             //retornando um array de objetos detodos os curso cadastrado
                                             $retornoLista = $objControlCurso->listaTodosCursos();
                                             $cadastrado = 0;//variavel resposavel por contar os regitros cadastrado com sucesso

                                             //pecorrendo o array de objeto do Cursos
                                             foreach ($retornoLista as $obj) {

                                                //variavel responsavel por guarda o retorno so insert
                                                // 1 = cadastrou no banco
                                                // 0 = erro
                                                $idCurso = $obj->getCodigo();
                                                $retorno = $objControlAvisoCurso->insertAvisoCurso($idCurso,$retornoId);
                                                // contando os registro foi cadastrado no banco
                                                if($retorno == 1){
                                                  $cadastrado++;
                                                }


                                              }// fim do foreach
                                              

                                              //verficando se todos foram registrados
                                              if(count($retornoLista) == $cadastrado){
                                                  
                                                  // tenta mover o arquivo para o destino
                                                  if (!@move_uploaded_file($arquivo_tmp, $destino)){
                                                       echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';

                                                  }

                                                  echo $objControlAvisoCurso->listaAvisoCursoUsuario($codigo,$nome,$sexo);

                                              // fim da condicao dos cadastro de curso e aviso
                                              }else{

                                                 
                                                 echo "erro1";
                                              }

                                                                                                

                                           // fim da condicao se o aviso foi cadastrado
                                           }else{

                                           
                                            echo 'erro2';

                                           }  


                                    // fim da codicao se o arquivo do tipo imagem
                                  }else{
                                        
                                        echo "erro3";
                                  } 
                                                      



                        //fimm da codicao se usuario envio alguma imagem
                        }else{

                          //retornando o id inserido
                          $retornoId = $objControlAviso->insertAviso($assunto,null,$mensagem,$codigo);
                                           
                                           // verificando se retornou o id do ultimo aviso cadastrado
                                           if($retornoId != 0){
                                            
                                             //retornando um array de objetos detodos os curso cadastrado
                                             $retornoLista = $objControlCurso->listaTodosCursos();
                                             $cadastrado = 0;//variavel resposavel por contar os regitros cadastrado com sucesso

                                             //pecorrendo o array de objeto do Cursos
                                             foreach ($retornoLista as $obj) {

                                                //variavel responsavel por guarda o retorno so insert
                                                // 1 = cadastrou no banco
                                                // 0 = erro
                                                $idCurso = $obj->getCodigo();
                                                $retorno = $objControlAvisoCurso->insertAvisoCurso($idCurso,$retornoId);
                                                // contando os registro foi cadastrado no banco
                                                if($retorno == 1){
                                                  $cadastrado++;
                                                }


                                              }// fim do foreach
                                              

                                              //verficando se todos foram registrados
                                              if(count($retornoLista) == $cadastrado){
                                                  
                                                  
                                                  echo $objControlAvisoCurso->listaAvisoCursoUsuario($codigo,$nome,$sexo);

                                              // fim da condicao dos cadastro de curso e aviso
                                              }else{

                                                 echo "erro1";
                                              }

                                                                                                

                                           // fim da condicao se o aviso foi cadastrado
                                           }else{

                                            echo "erro2";

                                           }  

                         

                        }
   
                // fim da condicao rementente 
                }else{


                   if ( isset( $_FILES[ 'img-aviso' ][ 'name' ] ) && $_FILES[ 'img-aviso' ][ 'error' ] == 0 ) {

                          $arquivo_tmp = $_FILES[ 'img-aviso' ][ 'tmp_name' ];
                          $nome = $_FILES[ 'img-aviso' ][ 'name' ];
                       
                          // Pega a extensão
                          $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
                       
                          // Converte a extensão para minúsculo
                          $extensao = strtolower ( $extensao );

                                  if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
                                          // Cria um nome único para esta imagem
                                          // Evita que duplique as imagens no servidor.
                                          // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                                          $novoNome = uniqid ( time () ) . '.' . $extensao;
                                   
                                          // Concatena a pasta com o nome
                                          $destino = '../../paginas/secretaria/img-avisos/ ' . $novoNome;

                                          //retornando o id inserido
                                          $retornoId = $objControlAviso->insertAviso($assunto,$novoNome,$mensagem,$codigo);
                                           
                                           // verificando se retornou o id do ultimo aviso cadastrado
                                           if($retornoId != 0){
                                            
                                             
                                                
                                             $retorno = $objControlAvisoCurso->insertAvisoCurso($rementente,$retornoId);
                                                
                                                
                                              //verficando se todos foram registrados
                                              if($retorno == 1){
                                                  
                                                  // tenta mover o arquivo para o destino
                                                  if (!@move_uploaded_file($arquivo_tmp, $destino)){
                                                       echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';

                                                  }

                                                  echo $objControlAvisoCurso->listaAvisoCursoUsuario($codigo,$nome,$sexo);

                                              // fim da condicao dos cadastro de curso e aviso
                                              }else{

                                                 echo "erro1";
                                              }

                                                                                                

                                           // fim da condicao se o aviso foi cadastrado
                                           }else{

                                            echo "erro2";

                                           }  


                                    // fim da codicao se o arquivo do tipo imagem
                                  }else{
                                        echo "erro3";
                                  } 
                                                      



                        //fimm da codicao se usuario envio alguma imagem
                        }else{

                          //retornando o id inserido
                          $retornoId = $objControlAviso->insertAviso($assunto,null,$mensagem,$codigo);
                                           
                                           // verificando se retornou o id do ultimo aviso cadastrado
                                           if($retornoId != 0){
                                            
                                            
                                              $retorno = $objControlAvisoCurso->insertAvisoCurso($rementente,$retornoId);
                                              

                                              
                                              if($retorno==1){

                                                  echo $objControlAvisoCurso->listaAvisoCursoUsuario($codigo,$nome,$sexo);

                                              // fim da condicao dos cadastro de curso e aviso
                                              }else{

                                                 echo "erro1";
                                              }

                                                                                                

                                           // fim da condicao se o aviso foi cadastrado
                                           }else{

                                            echo "erro2";

                                           }  

                         

                                 }
   



                        } 


            break;// break do case publicar
            case 'excluir':
               $cod = $_POST['cod'];
               $retorno = $objControlAvisoCurso->deleteAvisoCurso($cod);
               if($retorno == 1){
                  return $objControlAvisoCurso->listaAvisoCursoUsuario($codigo,$nome,$sexo);
               }else{
                 echo "Erro ao excluri o aviso";
               }
            break;
               
               

            

             
            
          
        }

       break;
       case 'turma':
         switch ($metodo) {
            case 'retorna-disciplinas-curso':
              $codigoCurso = $_POST['codigo'];
              $retorno  = $objControlCursoDisciplina->listaDisciplinasCurso($codigoCurso);
              if($retorno == null){
                echo false;
              }else{

                echo $objControlCursoDisciplina->listaDisciplinasCurso($codigoCurso);
              }

              break;
            case 'retorna-professores-disciplina':
              $codigoCursoDisc = $_POST['codigo'];
              $objCursoDisc = $objControlCursoDisciplina->selectCursoDisciplina($codigoCursoDisc);
              $retorno  = $objControlProfessorDisciplina->professoresDisciplinaSelect($objCursoDisc->getObjDisciplina()->getCodigo());
              if($retorno == null){
                echo false;
              }else{

                echo $objControlProfessorDisciplina->professoresDisciplinaSelect($codigoDisciplina);
              }

              break;

            case 'incluir':

               $codigoTurma = $_POST['codigoTurma'];
               $profDisc = $_POST['profDisc'];
               $codigoCursoDisc = $_POST['disciplinaCurso'];
               $nome = $_POST['nome'];
               $horasAula = $_POST['hrAula'];
               $qtdeAula = $_POST['qtdeAula'];
               $data1 = str_replace("/", "-", $_POST['dataInicio']);
               $dataInicio = date('Y-m-d',strtotime($data1));
               $data2 = str_replace("/", "-", $_POST['dataFim']);
               $dataFim = date('Y-m-d',strtotime($data2));
               
              
                $retorno = $objControlTurma->insertTurma($codigoTurma,$nome,$horasAula,$qtdeAula,$dataInicio,$dataFim, $codigoCursoDisc,$profDisc);
                if($retorno == 1){
                  echo true;
                }else{
                echo false;
                }

              break;
            case 'consultar':

               $codigoTurma = $_POST['codigoTurma'];
               $profDisc = $_POST['profDisc'];
               $codigoCursoDisc = $_POST['disciplinaCurso'];
               $nome = $_POST['nome'];
               $horasAula = $_POST['hrAula'];
               $qtdeAula = $_POST['qtdeAula'];
               $data1 = str_replace("/", "-", $_POST['dataInicio']);
               $dataInicio = date('Y-m-d',strtotime($data1));
               $data2 = str_replace("/", "-", $_POST['dataFim']);
               $dataFim = date('Y-m-d',strtotime($data2));

                $retorno = $objControlTurma->updateTurma($codigoTurma,$nome,$horasAula,$qtdeAula,$dataInicio, $dataFim,$codigoCursoDisc,$profDisc);
                if($retorno == 1){
                  echo true;
                }else{
                echo false;
                }

              break;
            
            
          }// fim switch metodo
       break; 

       case 'turmaAluno':
         switch ($metodo) {
            case 'retorna-turmas-curso':
              $codigoCurso = $_POST['codigo'];
              $retorno  = $objControlTurma->selectTurmasCurso($codigoCurso);
              if($retorno == null){
                echo false;
              }else{

                echo $objControlTurma->selectTurmasCurso($codigoCurso);
              }

              break;
            

            case 'incluir':

              
            break;
            
            
            
          }// fim switch metodo
       break; 




}// fim switch entidade

?>