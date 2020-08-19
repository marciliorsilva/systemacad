<?php 

include_once "../../control/CursoControl.class.php";
include_once "../../control/TurmaControl.class.php";
include_once "../../control/CursoDisciplinaControl.class.php";
include_once "../../control/ProfessorDisciplinaControl.class.php";


include_once "../../control/LoginSecretariaControl.class.php";
 
  
$objLogin = new LoginSecretariaControl();
$objLogin->verificarLogado();

$objControlCurso = new CursoControl();
$objControlTurma = new TurmaControl();
$objControlProfessorDisciplina = new ProfessorDisciplinaControl();
$objControlCursoDisc = new CursoDisciplinaControl();
$retornoObj=null;
$codigoCurso = null;
$codigoCursoDisc=null;
$objCursoDisc = null;
$codigoDisciplina = null;
$codigoTurma = null;
$nomeTurma = null;
$hrsAulaDia = null;
$qtdeAulaSemana = null; 
$codigoProfDisc = null ;
$dataInicio =null;
$dataFim = null;



$metodo = $_POST['metodo'];
$codigo = $_POST['cod'];

if($metodo == 'consultar'){

  
  $retornoObj = $objControlTurma->selectTurma($codigo);
  $codigoCurso = $retornoObj->getObjCursoDisciplina()->getObjCurso()->getCodigo();
  
  $codigoCursoDisc = $retornoObj->getObjCursoDisciplina()->getCodigo();
  
  $objCursoDisc = $objControlCursoDisc->selectCursoDisciplina($codigoCursoDisc);
  $codigoDisciplina = $objCursoDisc->getObjDisciplina()->getCodigo();
  

  $codigoTurma = $retornoObj->getCodigo();
  $nomeTurma = $retornoObj->getNome();
  $hrsAulaDia = $retornoObj->getHorasAulaDia();
  $qtdeAulaSemana = $retornoObj->getQtdeAulaSemana();
  $codigoProfDisc = $retornoObj->getObjProfessorDisciplina()->getCodigo();
  $data1 = str_replace("-", "/", $retornoObj->getDataInicio());
  $dataInicio = date('d-m-Y',strtotime($data1));
  $data2 = str_replace("-", "/", $retornoObj->getDataFim());
  $dataFim = date('d-m-Y',strtotime($data2));
 

}


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
       
       
        select, .input-group , #txtPesquisa{

          width: 100%;
        }

        .separador{
          width: 100%;
          border-top: 1px solid #dcdcdc;
          list-style-type: none;  
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
                  <a href="../../paginas/secretaria/turma.php"><button class="btn btn-default"><span class="glyphicon glyphicon-share-alt"></span></span>&nbsp;Voltar</button></a>
                </div>
	              <h3><span class="glyphicon glyphicon-education"></span> &nbsp;Turma</h3>
                
            </div>
            <div class="row">
               <form id="form-turma" action="#">

                   <div id="divCurso"  class="form-group col-md-12 col-lg-12 col-sm-12 col-xl-12" >
                      <label>Curso</label>
                       <div class="input-group">
                        <select id="cbCurso"  onblur="removerValidacao('divCurso',this)" class="form-control" >
                         
                        </select>
                       </div>
                   </div>

                   <div id="divDisciplina"  class="form-group col-md-12 col-lg-12 col-sm-12 col-xl-12" >
                      <label>Disciplina</label>
                       <div class="input-group">
                        <select id="cbDisciplina" onblur="removerValidacao('divDisciplina',this)" class="form-control" >
                         
                        </select>
                       </div>
                   </div>
                   
             
                    
                   <div id="divCodigo" class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4">
                      <label>Codigo</label>
                       <div class="input-group">
                        <input id="txtCodigo"  onblur="removerValidacao('divCodigo',this)" type="text" name="codigo" minlength="4" maxlength="10" class="form-control" >
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
                   <div id="divHrAula" class="form-group col-md-6 col-lg-6 col-sm-6 col-xl-6" >

                      <label>Horas/Aula (DIA)</label>
                       <div class="input-group">
                        <input id="txtHrAula" onblur="removerValidacao('divHrAula',this)" type="text" name="hrsAulaDia" class="form-control" placeholder="00:00:00"  >
                        <span class=""></span>
                       </div>
                   
                   </div>
                   <div id="divQtdeAula" class="form-group col-md-6 col-lg-6 col-sm-6 col-xl-6" >

                      <label>Quantidade/Aulas (SEMANA)</label>
                       <div class="input-group">
                        <input id="txtQtdeAula" onblur="removerValidacao('divQtdeAula',this)" onkeyup="somenteNumeros(this);" type="text" name="qtdeAula" class="form-control"  >
                        <span class=""></span>
                       </div>
                   
                   </div>

                    <div id="divDataInicio" class="form-group col-md-6 col-lg-6 col-sm-6 col-xl-6" >

                      <label>Data Inicio</label>
                       <div class="input-group">
                        <input id="txtDataInicio" onblur="removerValidacao('divDataInicio',this)" type="text" name="nome" class="form-control" placeholder="00/00/0000"  >
                        <span class=""></span>
                       </div>
                   
                   </div>
                   <div id="divDataFim" class="form-group col-md-6 col-lg-6 col-sm-6 col-xl-6" >

                      <label>Data Fim</label>
                       <div class="input-group">
                        <input id="txtDataFim" onblur="removerValidacao('divDataFim',this)"  type="text" name="dataInicio" class="form-control" placeholder="00/00/0000" >
                        <span class=""></span>
                       </div>
                   
                   </div>

                   <div  class="form-group col-md-12 col-lg-12 col-sm-12 col-xl-12" >
                     Professor
                     <div class="separador"></div>
                   </div>
                   <div id="divProfessor"  class="form-group col-md-12 col-lg-12 col-sm-12 col-xl-12" >
                       <div class="input-group">
                        <select id="cbProfessor" onblur="removerValidacao('divProfessor',this)" class="form-control" >
                         
                        </select>
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
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

     <script type="text/javascript">


     

      var camposNotNull = null;//variavel responsavel por contar campos obrigatorio não preenchidos
      var cod = "<?php echo $codigo;?>"; // variavel responsavel por armazenar codigo selecionado da tabela passado pelo metodo POSt
      var metodo = "<?php echo $metodo;?>"; // variavel responsavel por armazenar a ação que usuario escolheu

      $(document).ready(function () { 
          var $campoHr = $("#txtHrAula");
          $campoHr.mask('00:00:00', {reverse: true});

          var $campoDataInicio = $("#txtDataInicio");
          $campoDataInicio.mask('00/00/0000', {reverse: true});

          var $campoDataFim = $("#txtDataFim");
          $campoDataFim.mask('00/00/0000', {reverse: true});

   
      });
      
  

      
       
       // metodo para inicializar formulario quando a pagina for carregada
       $(window).load(function(){
           

          $("#cbCurso").html("<?php $objControlCurso->listaCursosSelect();?>");   
        

          if(metodo == 'incluir'){
            
            $("#btnCadastrar").removeClass("disabled");//ativando o botao cadastrar
            camposNotNull = 9;//armazenando quantidade de campos obrigatorio do formulario
           
          }else if(metodo == 'consultar'){

            
            $("input").attr("disabled","disabled");// desabilitando inputs 
            $("select").attr("disabled","disabled");// desabilitando SELECT 
            $("#btnEditar").removeClass("disabled");//ativando o botao editar
           
            //preenchendo formulario apos a consulta
            $("#cbDisciplina").html("<? $objControlCursoDisc->listaDisciplinasCurso($codigoCurso);?>");

            $("#cbProfessor").html("<?php $objControlProfessorDisciplina->professoresDisciplinaSelect($codigoDisciplina);?>");


            $("#cbCurso").val("<?php echo $codigoCurso;?>");
            $("#cbDisciplina").val("<?php echo $codigoCursoDisc;?>");
            $("#txtCodigo").val("<?php echo $codigoTurma;?>");
            $("#txtNome").val("<?php echo $nomeTurma;?>");
            $("#txtHrAula").val("<?php echo $hrsAulaDia;?>");
            $("#txtQtdeAula").val("<?php echo $qtdeAulaSemana;?>");
            $("#cbProfessor").val("<?php echo $codigoProfDisc;?>");
            $("#txtDataInicio").val("<?php echo $dataInicio;?>");
            $("#txtDataFim").val("<?php echo $dataFim;?>");

            
            
            
           

          }
   
       });


       // habilitando campos e o botao cadastrar apos o click do botao EDITAR
       $("#btnEditar").on("click", function (e) {
         $("input").removeAttr("disabled");
         $("#txtCodigo").attr("disabled","disabled");// desabilitando inputs
         $("select").removeAttr("disabled");
         $("#btnEditar").addClass("disabled");
         $("#btnCadastrar").removeClass("disabled");

           
       });

       var selectOption = document.getElementById("cbCurso");
        selectOption.addEventListener('change', function(){
           var codigo = $(this).val();
           
           //encaminhando os valores do formulario para ser processadas 
             $.post('../../paginas/secretaria/processar.php', {
                codigo:codigo,
                metodo:'retorna-disciplinas-curso',
                entidade:"turma"
                }, function(resposta){
                     // Valida a resposta do processo
                     // Se o processo estiver OK

                    if(resposta != false){
                       
                       document.getElementById('cbDisciplina').innerHTML = " ";
                       document.getElementById('cbDisciplina').innerHTML = resposta;
                      

                    }else{

                      alert(resposta);
                      
                    }
              });

           
            
          return false;// impedindo o encaminhamento
          


           
        });

         var selectOption = document.getElementById("cbDisciplina");
        selectOption.addEventListener('change', function(){
           var codigo = $(this).val();
           
           //encaminhando os valores do formulario para ser processadas 
             $.post('../../paginas/secretaria/processar.php', {
                codigo:codigo,
                metodo:'retorna-professores-disciplina',
                entidade:"turma"
                }, function(resposta){
                     // Valida a resposta do processo
                     // Se o processo estiver OK

                    if(resposta != false){
                       
                       document.getElementById('cbProfessor').innerHTML = " ";
                       document.getElementById('cbProfessor').innerHTML = resposta;
                      

                    }else{

                      alert(resposta);
                      
                    }
              });

           
            
          return false;// impedindo o encaminhamento
          


           
        });

       //validando formulario de cadastro de Turma antes de enviar o formulario
       $("#form-turma").submit(function() {
        
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
              $("#txtNome").attr("placeholder","Digite o nome do Turma");  
                          
            }else{
              $("#divNome").removeClass("has-warning has-feedback");
              $("#divNome > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");   
              $("#txtNome").removeAttr("placeholder","Digite o nome da Turma");
            }

            if($("#cbDisciplina").val()== null || $("#cbDisciplina").val() ==""){
              $("#divDisciplina").addClass("has-warning has-feedback");
              $("#divDisciplina > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#cbDisciplina").attr("placeholder","Selecione uma Disciplina"); 
              
              
            }else{
              $("#divDisciplina").removeClass("has-warning has-feedback");
              $("#divDisciplina > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");
              $("#cbDisciplina").removeAttr("placeholder",""); 
            }

            if($("#cbCurso").val()== null || $("#cbCurso").val() ==""){
              $("#divCurso").addClass("has-warning has-feedback");
              $("#divCurso > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#cbCurso").attr("placeholder","Selecione um curso");
                          
            }else{
              $("#divCurso").removeClass("has-warning has-feedback");
              $("#divCurso > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#cbCurso").removeAttr("placeholder","");
            }

            if($("#txtHrAula").val()== null || $("#txtHrAula").val() ==""){
              $("#divHrAula").addClass("has-warning has-feedback");
              $("#divHrAula > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtHrAula").attr("placeholder","Digite as Horas/Aula");
                          
            }else{
              $("#divHrAula").removeClass("has-warning has-feedback");
              $("#divHrAula > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtHrAula").removeAttr("placeholder","");
            }

            if($("#txtQtdeAula").val()== null || $("#txtQtdeAula").val() ==""){
              $("#divQtdeAula").addClass("has-warning has-feedback");
              $("#divQtdeAula > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtQtdeAula").attr("placeholder","Digite as Quantidade Aulas semanais");
                          
            }else{
              $("#divQtdeAula").removeClass("has-warning has-feedback");
              $("#divQtdeAula > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtQtdeAula").removeAttr("placeholder","");
            }

            if($("#txtDataInicio").val()== null || $("#txtDataInicio").val() ==""){
              $("#divDataInicio").addClass("has-warning has-feedback");
              $("#divDataInicio > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtDataInicio").attr("placeholder","Digite a data de inicio");
                          
            }else{
              $("#divDataInicio").removeClass("has-warning has-feedback");
              $("#divDataInicio > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtDataInicio").removeAttr("placeholder","");
            }

            if($("#txtDataFim").val()== null || $("#txtDataFim").val() ==""){
              $("#divDataFim").addClass("has-warning has-feedback");
              $("#divDataFim > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtDataFim").attr("placeholder","Digite a data do fim");
                          
            }else{
              $("#divDataFim").removeClass("has-warning has-feedback");
              $("#divDataFim > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtDataFim").removeAttr("placeholder","");
            }

            if($("#cbProfessor").val()== null || $("#cbProfessor").val() ==""){
              $("#divProfessor").addClass("has-warning has-feedback");
              $("#divProfessor > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#cbProfessor").attr("placeholder","Selecione um professor");
                          
            }else{
              $("#divProfessor").removeClass("has-warning has-feedback");
              $("#divProfessor > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#cbProfessor").removeAttr("placeholder","");
            }

         
         return false;// impedindo o encaminhamento da pagina


         }else{
           
            //pegando valores dos campos quando não houver nenhum campo obrigatorio faltando
           
            var disciplinaCurso = $("#cbDisciplina").val();
            var codigoTurma = $("#txtCodigo").val();
            var nome = $("#txtNome").val();
            var hrAula = $("#txtHrAula").val();
            var qtdeAula = $("#txtQtdeAula").val();
            var dataInicio =  $("#txtDataInicio").val();
            var dataFim =  $("#txtDataFim").val();
            var profDisc = $("#cbProfessor").val();

          
            
            //encaminhando os valores do formulario para ser processadas e encaminhadas para o banco
             $.post('../../paginas/secretaria/processar.php', {
               
                disciplinaCurso:disciplinaCurso,
                profDisc:profDisc,
                codigoTurma:codigoTurma,
                nome:nome,
                hrAula:hrAula,
                qtdeAula:qtdeAula,
                dataInicio:dataInicio,
                dataFim:dataFim,
                metodo:metodo,
                entidade:"turma"
                }, function(resposta){
                     // Valida a resposta do processo
                     // Se o processo estiver OK
                     
                    if(resposta == 1){
                       
                       if(metodo == "incluir"){
                        alert('Turma cadastrada com sucesso.'); 

                       }else{
                        alert('Turma editada com sucesso.'); 
                       }
                       //voltando para pagina anterior                  
                      window.location.href='../../paginas/secretaria/turma.php';

                    }else {

                       alert(resposta);
                    }
              });

           
            
          return false;// impedindo o encaminhamento 
          
          
          
         }
        
            

        });
       
        // funcao de validacao do input para aceitar so numeros
       function somenteNumeros(num) {
           var er = /[^0-9.]/;
           er.lastIndex = 0;
           var campo = num;
           if (er.test(campo.value)) {
            campo.value = "";
           }
        }

      // remover a validacao se o campo obrigatorio estiver preenchido
      function removerValidacao(divPai, campo) {
       
        var seletor = "#"+divPai
        if(campo.value != ''){
             
           $(seletor).removeClass("has-warning has-feedback");
           $(seletor+" > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");  
           $(seletor+" > .input-group > #txtCodigo").removeAttr("placeholder",""); 
            camposNotNull--;//descrementando variavel
         

         }
        
       }

      
    </script>
   
    </body>
</html>
