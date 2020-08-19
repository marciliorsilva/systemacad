
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
                                            $retorno = $objControlAvisoCurso->insertAvisoCurso($obj->getCodigo(),$retornoId);
                                            // contando os registro foi cadastrado no banco
                                            if($retorno == 1){
                                              $cadastrado++;
                                            }


                                         }


                                         //verficando se todos foram registrados
                                         if(count($retornoLista) == $cadastrado){
                                              
                                             
                                              echo $objControlAvisoCurso->listaAvisoCursoUsuario();


                                          }else{

                                             echo "<script>alert('erro - todos - vinculacao cadastro');</script>";
                                          }

                                         
                                   }else{

                                    echo "<script>alert('erro - todos - aviso cadastro');</script>";;

                                   }

                    }



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
                                              echo $objControlAvisoCurso->listaAvisoCursoUsuario();


                                          }else{

                                            echo "<script>alert('erro - todos - vinculacao cadastro');</script>";
                                          }

                                         
                                   }else{

                                    echo "<script>alert('erro - todos - aviso cadastro');</script>";

                                   }

                                  
                                                                 
                                  


                            }else{
                                echo "<script>alert('Você poderá enviar apenas arquivos '*.jpg;*.jpeg;*.gif;*.png'<br />');</script>";
                            }   

                    }else{

                              //retornando o id inserido
                              $retornoId = $objControlAviso->insertAviso($assunto,null,$mensagem,$codigo);

                            // verificando se retornou o id do ultimo aviso cadastrado
                                   if($retornoId != 0){
                                        
                                        $retorno = $objControlAvisoCurso->insertAvisoCurso($rementente,$retornoId);
                                           

                                         //verficando se todos foram registrados
                                         if($retorno == 1){
                                              
                                              // tenta mover o arquivo para o destino
                                              if (!@move_uploaded_file($arquivo_tmp, $destino)){
                                                   echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';

                                              }
                                              echo $objControlAvisoCurso->listaAvisoCursoUsuario();


                                          }else{

                                            echo "<script>alert('erro - todos - vinculacao cadastro');</script>";
                                          }

                                         
                                   }else{

                                    echo "<script>alert('erro - todos - aviso cadastro');</script>";

                                   }

                    }


