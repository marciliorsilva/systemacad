<?php 
include_once "../../control/DisciplinaControl.class.php";
include_once "../../control/LoginSecretariaControl.class.php";
 
  
  $objLogin = new LoginSecretariaControl();
  
  $objLogin->verificarLogado();
 $objControl = new DisciplinaControl();
 $metodo = $_POST['metodo'];
 $codigo = $_POST['cod'];

 $curso = $objControl->selectDisciplina($codigo);
 $txtNome = $curso->getNome();
 

 

 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/style.css" type="text/css">

        <style type="text/css">


        /*menu*/
        #menu-secretaria .sidebar-nav .navbar li a:hover {
          background-color: white;
          color: black;
         }
       
       
        .input-group , #txtPesquisa{

          width: 100%;
        }

        </style>

      
      

    </head>
    <body>
    
    
    <div class="row affix-row" id="menu-secretaria">
       <div class="col-sm-3 col-md-2 affix-sidebar">
		      <div class="sidebar-nav" >
            <div class="navbar navbar-default" role="navigation">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
                  <span class="visible-xs navbar-brand">SystemAcad&nbsp;&nbsp;<span class="glyphicon glyphicon-education"></span></span>
               </div>
               <div class="navbar-collapse collapse sidebar-navbar-collapse">
                  <ul class="nav navbar-nav" id="sidenav01">
                    <li >
                       <?php include '../../paginas/secretaria/user.php';?>
                    </li>
                     <?php include '../../paginas/secretaria/menu.php';?>
                 </ul>
              </div><!--/.nav-collapse -->
            </div>
         </div>
	  </div>
	  <div class="col-sm-9 col-md-10 affix-content">
	    	<div class="container">

			
			  	  <div class="page-header">
                <div id="group-button">
                  <a href="../../paginas/secretaria/disciplina.php"><button class="btn btn-default"><span class="glyphicon glyphicon-share-alt"></span></span>&nbsp;Voltar</button></a>
                </div>
	              <h3><span class="glyphicon glyphicon-blackboard"></span> &nbsp;Disciplina</h3>
                
            </div>
            <div class="row">
               <form id="form-disciplina" action="#">
             
                    <div id="divCodigo" class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4">
                      <label>Codigo</label>
                       <div class="input-group">
                        <input id="txtCodigo"  onblur="removerValidacao('divCodigo',this)" type="text" name="codigo" maxlength="8" class="form-control" >
                        <span class=""></span>
                       </div>
                   </div>
                   <div id="divNome" class="form-group col-md-8 col-lg-8 col-sm-8 col-xl-8" >

                      <label>Nome</label>
                       <div class="input-group">
                        <input id="txtNome" onblur="removerValidacao('divNome',this)" type="text" name="nome" class="form-control"  >
                        <span class=""></span>
                       </div>
                   
                   </div>

                   
                   <div id="group-button">
                      <button  id="btnCadastrar"  type="submit" class="btn btn-default disabled "><span class="glyphicon  glyphicon-save"></span>&nbsp;Cadastrar</button>
                      <button id="btnEditar" type="button" class="btn btn-default disabled "><span class="glyphicon glyphicon-refresh"></span>&nbsp;Editar</button>
                   </div>            
           
                 
               </form>

            </div>			
		    </div>
	  </div>
   </div>


  
   
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

     <script type="text/javascript">
     

      var camposNotNull = null;//variavel responsavel por contar campos obrigatorio não preenchidos
      var cod = "<?php echo $codigo;?>"; // variavel responsavel por armazenar codigo selecionado da tabela passado pelo metodo POSt
      var metodo = "<?php echo $metodo;?>"; // variavel responsavel por armazenar a ação que usuario escolheu
      
  

      
       
       // metodo para inicializar formulario quando a pagina for carregada
       $(window).load(function(){

          
          if(metodo == 'incluir'){
            
            $("#btnCadastrar").removeClass("disabled");//ativando o botao cadastrar
            camposNotNull = 2;//armazenando quantidade de campos obrigatorio do formulario
           
          }else if(metodo == 'consultar'){

            $("input").attr("disabled","disabled");// desabilitando inputs 
            $("#btnEditar").removeClass("disabled");//ativando o botao editar
            
            //preenchendo formulario apos a consulta
            $("#txtCodigo").val(cod);
            $("#txtNome").val("<?php echo $txtNome; ?>");
           
            
            
            

          }
   
       });


       // habilitando campos e o botao cadastrar apos o click do botao EDITAR
       $("#btnEditar").on("click", function (e) {
         
         $("input").removeAttr("disabled");
         $("#txtCodigo").attr("disabled","disabled");// desabilitando inputs 
         $("#btnEditar").addClass("disabled");
         $("#btnCadastrar").removeClass("disabled");

           
       });

       //validando formulario de cadastro de Curso antes de enviar o formulario
       $("#form-disciplina").submit(function() {
        
         //verificando se tem algum campo obrigatorio não preenchido
         if(camposNotNull > 0){

          //verificando campos
             if($("#txtCodigo").val()== null || $("#txtCodigo").val() ==""){
            
              $("#divCodigo").addClass("has-warning has-feedback");
              $("#divCodigo > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");
              $("#divCodigo > .input-group > #txtCodigo").attr("placeholder","Digite o codigo");
              
            

            }else{
               $("#divCodigo").removeClass("has-warning has-feedback");
               $("#divCodigo > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");  
               $("#divCodigo > .input-group > #txtCodigo").removeAttr("placeholder","Digite o codigo"); 
            }

            if($("#txtNome").val()== null || $("#txtNome").val() ==""){
              $("#divNome").addClass("has-warning has-feedback");
              $("#divNome > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");   
              $("#txtNome").attr("placeholder","Digite o nome do Disciplina");  
                          
            }else{
              $("#divNome").removeClass("has-warning has-feedback");
              $("#divNome > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");   
              $("#txtNome").removeAttr("placeholder","Digite o nome do Curso");
            }

                     
         return false;// impedindo o encaminhamento da pagina


         }else{
           
            //pegando valores dos campos quando não houver nenhum campo obrigatorio faltando
            var codigo = $("#txtCodigo").val();
            var nome = $("#txtNome").val();
                      
            
            //encaminhando os valores do formulario para ser processadas e encaminhadas para o banco
             $.post('../../paginas/secretaria/processar.php', {
                codigo:codigo,
                nome:nome,
                metodo:metodo,
                entidade:"disciplina"
                }, function(resposta){
                     // Valida a resposta do processo
                     // Se o processo estiver OK
                    if(resposta == 1){
                       
                       if(metodo == "incluir"){
                        alert('Disciplina cadastrado com sucesso.'); 

                       }else{
                        alert('Disciplina editado com sucesso.'); 
                       }
                       //voltando para pagina anterior                  
                       window.location.href='../../paginas/secretaria/disciplina.php';

                    }else {

                       alert(resposta);
                    }
              });

           
            
          return false;// impedindo o encaminhamento 
          
          
          
         }
        
            

        });
       
       
      // remover a validacao se o campo obrigatorio estiver preenchido
      function removerValidacao(divPai, campo) {
       
        var seletor = "#"+divPai
        if(campo.value != ''){
             
           $(seletor).removeClass("has-warning has-feedback");
           $(seletor+" > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");  
           $(seletor+" > .input-group > input").removeAttr("placeholder",""); 
            camposNotNull--;//descrementando variavel
         

         }
        
       }

      
    </script>
   
    </body>
</html>
