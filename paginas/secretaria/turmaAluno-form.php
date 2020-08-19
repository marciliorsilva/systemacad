<?php 
include_once "../../control/TurmaControl.class.php";
include_once "../../control/AlunoControl.class.php";
include_once "../../control/CursoControl.class.php";
include_once "../../control/LoginSecretariaControl.class.php";
 
  
  $objLogin = new LoginSecretariaControl();
  
  $objLogin->verificarLogado();

$objControlCurso = new CursoControl();

$metodo = $_POST['metodo'];
$codigo = $_POST['cod'];


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
       
       
        .input-group , #txtPesquisa, select{

          width: 100%;
        }
        .table-hover{
          cursor: pointer;
        }
        tr{
          /*impedir selecao de texto*/
          -webkit-touch-callout: none;  /* iPhone OS, Safari */
          -webkit-user-select: none;    /* Chrome, Safari 3 */
          -khtml-user-select: none;     /* Safari 2 */
          -moz-user-select: none;       /* Firefox */
          -ms-user-select: none;        /* IE10+ */
           user-select: none;  
        }


        </style>

      
      

    </head>
    <body >
    
    
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
                  <a href="../../paginas/secretaria/turmaAluno.php"><button class="btn btn-default"><span class="glyphicon glyphicon-share-alt"></span></span>&nbsp;Voltar</button></a>
                </div>
	              <h3><span class="glyphicon glyphicon-link"></span> &nbsp;Turma/Alunos</h3>
                
            </div>
            <div class="row">
               <form id="form-turmaAluno" action="#">
             
                    <div id="divCurso" class="form-group col-md-12 col-lg-12 col-sm-12 col-xl-12">
                      <label>Curso</label>
                       <div class="input-group">
                          <select id="cbCurso" class="form-control"></select>
                        <span class=""></span>
                       </div>
                   </div>

                   <div id="divTurmas" class="form-group col-md-5 col-lg-5 col-sm-5 col-xl-5" >

                      <div class="table-responsive" style="overflow-y:auto;height:250px; width:100%;">
                        <table id="tabela-aluno" class="table table-bordered table-hover table-condensed" >
                          <thead>
                            <tr>
                              <th style="width:120px;">Matricula</th>
                              <th>Aluno</th>
                            </tr>
                     
                          </thead>
                          <tbody id="tbBodyAluno" >
                                        
                 
                          </tbody>
                        </table>
                     </div>
                   
                   </div>

                   <div id="divTurmas" class="form-group col-md-2 col-lg-2 col-sm-2 col-xl-2" >

                      <label>Turmas</label>
                        <div class="input-group">
                           <select id="cbTurmas" class="form-control"></select>
                           <span class=""></span>
                        </div>
                        
                        <button style="margin-top: 20px; width: 100%;" id='btnAdicionar' type='button' class='btn btn-default disabled'> >>> &nbsp;Adicionar</button>
                      
                        <button style="margin-top: 20px; width: 100%;" id='btnRemover' type='button' class='btn btn-default disabled'> <<< &nbsp;Remover</button>
                            
  
                       
                   
                   </div>
                   
                   
                   <div id="divTurmaAluno" class="form-group col-md-5 col-lg-5 col-sm-5 col-xl-5" >

                      <div class="table-responsive" style="overflow-y:auto;height:250px; width:100%;">
                        <table id="tabela-turmaAluno" class="table table-bordered table-hover table-condensed" >
                          <thead>
                            <tr>
                              <th>Aluno</th>
                            </tr>
                     
                          </thead>
                          <tbody id="tbBodyTurmaAluno">
                                        
                 
                          </tbody>
                        </table>
                     </div>
                   
                   </div>
                   
                   

                   <div id="group-button">
                      
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
         var metodo = "<?php echo $metodo ?>"; // variavel responsavel por armazenar a ação que usuario escolheu
        

        $(window).load(function(){

            $("#cbCurso").html("<?php $objControlCurso->listaCursosSelect();?>");   

            if(metodo == 'incluir'){

            }

            if(metodo == 'consultar'){


            }


        });

        var selectOption = document.getElementById("cbCurso");
        selectOption.addEventListener('change', function(){
           var codigo = $(this).val();
           
           //encaminhando os valores do formulario para ser processadas 
             $.post('../../paginas/secretaria/processar.php', {
                codigo:codigo,
                metodo:'retorna-turmas-curso',
                entidade:"turmaAluno"
                }, function(resposta){
                     // Valida a resposta do processo
                     // Se o processo estiver OK

                    if(resposta != false){
                       
                       document.getElementById('cbTurmas').innerHTML = " ";
                       document.getElementById('cbTurmas').innerHTML = resposta;
                      

                    }else{

                      alert(resposta);
                      
                    }
              });

           
            
          return false;// impedindo o encaminhamento
          


           
        });
      /*
     
      var cod ;//variavel responsavel por pegar codigo da disciplina da linha selecionada
      var habilitarTabela = null;//variavel responsavel bloquear selecao da linha da tabela.. a tabela sera habilitada quando clicar no botao editar

      
           
      function selecionarLinha(){
          $("#tabela-professorDisc > #tbBodyDisc > tr").on("click", function (e) {
              if(habilitarTabela==true){ //condicao para verificar se a tabela foi habilitada apos click no botao editar
                $(this).siblings().removeClass("table-active");
                $(this).toggleClass("table-active");
                cod = $(this).attr( 'id' );  
              }
            
            });
      }
      // mostrando auto ajuda na tabela = dois click para selecionalo
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
       });


      
       

              
       
       // metodo para inicializar formulario quando a pagina for carregada
       $(window).load(function(){
          
          

          

          if(metodo == 'incluir'){
            
            // desabilitando o select disciplina
            $("#cbDisciplina").attr("disabled","disabled");
           // carrefando lista nos selects
            document.getElementById("cbProfessor").innerHTML = "";
            document.getElementById("cbDisciplina").innerHTML = "";
            
          }

          if(metodo == 'consultar'){
     
            habilitarTabela = false;//inicalizando variavel para desabilitar tabela
            //mostrando tabela
             $("#tabela-professorDisc").removeClass("invisible");
             
            // codicao para remover o hover da linha da tabela
            if(!habilitarTabela){

               $("#tabela-professorDisc").removeClass("table-hover");

            } 
            //carregando os selects
             document.getElementById("cbProfessor").innerHTML = "";
             document.getElementById("cbDisciplina").innerHTML = "";
            
            
            $("select").attr("disabled","disabled");// desabilitando select
            
           $("#btnEditar").removeClass("disabled");//habilitando o botao editar
            
            //carregando tabela disciplina
             document.getElementById('tbBodyDisc').innerHTML = "";


            //selecionado o professor consultado na lista 

            $("#cbProfessor").val("");
                       

          }
   
       });
       
       
       

       // habilitando campos apos o click do botao EDITAR
       $("#btnEditar").on("click", function (e) {
         habilitarTabela = true;
         $("#tabela-professorDisc").addClass("table-hover");
         $("#cbDisciplina").removeAttr("disabled");
         $("#tabela-professorDisc").removeAttr("disabled");
         $("#btnEditar").addClass("disabled");
         $("#btnAdicionar").removeClass("disabled");
         $("#btnRemover").removeClass("disabled");
         

           
       });

       //bloqueando o select da lista de professores depois de escolher o iteem da lista
        var selectOption = document.getElementById("cbProfessor");
        selectOption.addEventListener('change', function(){
          if(metodo == "incluir"){

           $("#cbProfessor").attr("disabled","disabled");
           $("#btnAdicionar").removeClass("disabled");
           $("#cbDisciplina").removeAttr("disabled");
           $("#tabela-professorDisc").removeAttr("disabled");

          }

           
        });

            //validando formulario de cadastro de Curso antes de enviar o formulario
       $("#form-professorDisciplina").submit(function() {
         
          if($("#cbDisciplina").val()== null || $("#cbDisciplina").val() ==""){
             alert("Selecione uma Disciplina");
          }else{
            //pegando valores dos campos quando não houver nenhum campo obrigatorio faltando
            var codigoProfessor = $("#cbProfessor").val();
            var codigoDisciplina = $("#cbDisciplina").val();
                      
            
            //encaminhando os valores do formulario para ser processadas e encaminhadas para o banco
             $.post('../../paginas/secretaria/processar.php', {
                
                codigoProfessor:codigoProfessor,
                codigoDisciplina:codigoDisciplina,
                metodo:metodo,
                entidade:"professorDisciplina"
                }, function(resposta){
                     // Valida a resposta do processo
                     // Se o processo estiver OK
                     if(metodo == "incluir") {

                       if(resposta == 1){
                        
                        alert('Relação entre Professor e Disciplina cadastrada com sucesso.');
                        alert("Caso queira relacionar mais disciplinas a este professor, basta seleciona-lo na tabela e clicar em consultar.");

                        window.location.href='../../paginas/secretaria/professorDisciplina.php';

                      
                       }else{

                         alert(resposta);
                       }

                        
                                
                       

                    }else if(metodo == "consultar"){

                       if(resposta == false){
                        alert(resposta);

                       }else{
                        alert('Relação entre Professor e Disciplina cadastrada com sucesso.');
                         $("#cbDisciplina option[value='"+codigoDisciplina+"']").remove();
                         document.getElementById('tbBodyDisc').innerHTML = " ";
                         document.getElementById('tbBodyDisc').innerHTML = resposta;
                        
                     
                       }
                    }
              });

           
            
          return false;// impedindo o encaminhamento 
        

          }      
         
       });

      



       $("#btnRemover").on("click", function (e) {
            

            if(cod==null){

              alert("Selecione um disciplina para ser removida.");
                              
            }else{

                 var codigoProfessor = $("#cbProfessor").val();

                 $.post('../../paginas/secretaria/processar.php', {
                  cod:cod,
                  codigoProfessor:codigoProfessor,
                  metodo:'remover',
                  entidade:'professorDisciplina'
                 }, function(resposta){
                    
                   if(resposta == false){
                      
                      alert('Erro ao remover a disciplina.');
                      alert(resposta);
       
                   }else{

                     alert('Disciplina removida com sucesso.');
                     document.getElementById('tbBodyDisc').removeChild(document.getElementById(cod))
                     ;
                     habilitarTabela = true;


                     $('#cbDisciplina').html(resposta);
                   }

                 });

                 
              
           
              return false;

            }

          });
       */
      
    </script>
   
    </body>
</html>
