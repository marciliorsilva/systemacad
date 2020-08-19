<?php 
include_once "../../control/MatriculaControl.class.php";

$cod = $_POST['novoCodigo'];// pegando  a variavel com metodo post (ano+codigoCurso)
$gerarInt= mt_rand(1000, 9999); // gerando numero aleatorio entre 1000 e 9999
$codigo = $cod.($gerarInt);// concatenando as variaveis
 

// funcao  para gerar o codigo 
function verificar($codigo){ 
  // criando o objeto para chamar a funcao verificarMAtricula se existe no banco
  $objControl = new MatriculaControl(); 
  $novoCodigo;// variavel para armazenar a nova matricula caso ja tenha cadastrado no banco
  $retorno = $objControl->verificarMatricula($codigo);// passando o codigo passado da funcao para verificar se existe no banco
  if($retorno != 1){
    //se não tiver retorna o codigo passado por parametro da funcao
    return $codigo;

  }else{
  	 //se tiver.. 
    $novoCodigo = $cod.$gerarInt;//gera um novo codigo
    verificar($novoCodigo);// e chama a funcao dentro dela msm para verificar outra vez ate achar uma codigo valido

      
  }

}


// imprimo a o return da funcao
echo verificar($codigo);



?>