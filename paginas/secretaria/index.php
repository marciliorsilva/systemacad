<?php
  include_once "../../control/LoginSecretariaControl.class.php";
  include_once "../../control/CursoControl.class.php";
  include_once "../../control/AvisoCursoControl.class.php";
  
  
  $objLogin = new LoginSecretariaControl();
  

  $objLogin->verificarLogado();
  
  $nome = unserialize($objLogin->getUser())->getNome();
  $sexo = unserialize($objLogin->getUser())->getSexo();
  $codigoUsuario = unserialize($objLogin->getUser())->getObjUsuario()->getCodigo();
  $objControlCurso = new CursoControl();
  $objControlAvisoCurso = new AvisoCursoControl();
  
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

         #group-button{
           position: absolute;
           right: 0;
         } 
       
        /*alterando botao da janela modal*/
        #btn-publicar{
          background-color:#FF8C00;
          color: #fff; 
          font-weight: bold;
          margin-top:2%;
          margin-bottom: 10px;
        }

        #btn-publicar:hover,
        #btn-enviar-publicacao:hover,
        #btn-fechar-modal:hover{
          background-color: #FFA500;
        }
         
          /*alterando layout da div=feed */
        .container #feed{
           height: 100%;
           width:100%;
           border: none;
           background-color: #F8F8FF;
           box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0, 0.19);
           margin-bottom: 20px;
          
        }

         /*alterando layout da janela modal:publicarAviso ; */

        .modal-header {

          background-color:#FF8C00; 
          color: white;

        }

        .modal-title {
          font-weight: bold;
        }

        .modal-footer button{
          color: #fff;
          background-color: #FF8C00;
          font-weight: bold;
        }

        .panel-group{
            width: 96.5%;
            margin: 0 auto;
        }
          

        #msgSecretaria > .panel-heading{
            background-color: #FF8C00;
            color: #fff;
            font-weight: bold;
        }

         
          .btn-default{
            
            color: #dcdcdc;
            font-weight: bold;

          }

          #nome-user{
            font-weight: bold;
            padding-bottom: 10px;
            
          }

          .panel-group{
            margin-bottom: 30px;
          }

           .panel-footer{
           height: 50px;
           


          }

          #botao-footer{
            float:right;
          }


       
        </style>

      
      

    </head>
    <body  >
    

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
	              <h3><span class="glyphicon glyphicon-bullhorn"></span> &nbsp;Feed de Avisos</h3>
            </div>	

            <button type="button" id="btn-publicar" class="btn btn-default btn-block" data-toggle="modal" data-target="#modalPublicar">Publicar</button>
				    <br>
            <div id="panel-feed" class="panel-group">

              
            </div>


                        
                  
                 
                   
		        
	       </div>
   </div>


   <!-- Modal publicar -->
   <div id="modalPublicar" class="modal fade" role="dialog">
     <div class="modal-dialog">

      <!-- conteudo-->
      <div class="modal-content">
          <div class="modal-header">
            <button id='fecharModal' type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Publicar Aviso</h4>
          </div>
          <form id="formPublicacao"  method="post" enctype="multipart/form-data" action="">

                <div class="modal-body">
       
                  <div id="divAssunto" class="form-group">
                    <label>Assunto:</label>
                    <input type="text" class="form-control" name="assunto" id="assunto" onblur="removerValidacao('divAssunto',this)">
                    <span class=""></span>
                  </div>
                  <div id="divCursos" class="form-group" >
                      <label>Para</label>
                           
                      <select id="cbCursos" class="form-control" name="rementente" onblur="removerValidacao('divCursos',this)">
                      </select>
                      <span class=""></span>
                          
                          
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                   <input id='img-aviso' name="img-aviso" type='file' class='form-control-file' accept='image/png, image/jpeg, image/jpg'>
               
              
                   </div>

                  
                   <div id="divMensagem" class="form-group">
                     <label for="comment">Mensagem:</label>
                     <textarea class="form-control" rows="5" name="mensagem" id="mensagem" onblur="removerValidacao('divMensagem',this)"></textarea>
                   </div> 
                   <input type="hidden" name="metodo" value="publicar">
                   <input type="hidden" name="entidade" value="aviso">
        
               </div>

               <div id="mensaje"></div>
               <div class="modal-footer">
                 <button type="submit" class="btn btn-default">Enviar</button>
                 <button id="btnFechar" type="button" class="btn btn-default" data-dismiss="modal" >Fechar</button>
               </div>
         </form>

      </div>
    
    </div>
  </div>
   

   
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    
    <script>

    var camposNotNull = 3;

    $(function(){
        $("#formPublicacao").on("submit", function(e){
            e.preventDefault();
            if(camposNotNull > 0){

                   if($("#assunto").val()== null || $("#assunto").val() ==""){
                      $("#divAssunto").addClass("has-warning has-feedback");
                      $("#divAssunto > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
                      $("#assunto").attr("placeholder","Digite o assunto.");
                                  
                    }

                    if($("#cbCursos").val()== null || $("#cbCursos").val() ==""){
                      $("#divCursos").addClass("has-warning has-feedback");
                      $("#divCursos > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
                      $("#cbCursos").attr("placeholder","Selecione uma opção.");
                                  
                    }

                    if($("#mensagem").val()== null || $("#mensagem").val() ==""){
                      $("#divMensagem").addClass("has-warning has-feedback");
                      $("#divMensagem > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
                      $("#mensagem").attr("placeholder","Digite a mensagem.");
                                  
                    }

                   return false;


           }else{

            var f = $(this);
            var formData = new FormData(document.getElementById("formPublicacao"));
            formData.append("dato", "valor");
            //formData.append(f.attr("name"), $(this)[0].files[0]);
            $.ajax({
                url: "../../paginas/secretaria/processar.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res){
                

                if(res == 'erro1'){

                  alert('Erro ao enviar o aviso para todos os cursos.');

                }else if(res == 'erro2'){

                  alert('Erro ao enviar o aviso.');


                }else if(res == 'erro3'){
                  alert('Você poderá enviar apenas arquivos *.jpg;*.jpeg;*.gif;*.png <br />')

                }else{

                  
                  $('#fecharModal').click();
                  $("#panel-feed").html(' ').fadeOut(200);
                
                  $("#panel-feed").html(res).fadeIn(1200);
                  document.getElementById('formPublicacao').reset();
                  

                }

                
            });


           }

        });
    });
    

     var camposNotNull = 3;

     $(window).load(function(){

        $("#cbCursos").html("<?php $objControlCurso->comboBoxListaCursoAviso();?>");
        $("#panel-feed").html('  ').fadeOut(200);
        $("#panel-feed").html(" <?php $objControlAvisoCurso->listaAvisoCursoUsuario($codigoUsuario,$nome,$sexo);?>").fadeIn(1200);
        

        

          
     });

     function excluirAviso(codigoAviso,botao){

       $(botao).click(function(){

          $.post('../../paginas/secretaria/processar.php', {
                  
                  cod:codigoAviso,
                  metodo:'excluir',
                  entidade:'aviso'
                 }, function(resposta){
                    
                  if(resposta != null){
                    $("#panel-feed").html('  ').fadeOut(200);
                    
                    $("#panel-feed").html(resposta).fadeIn(1200);
                    document.getElementById('formPublicacao').reset();
                  }else{
                   alert(resposta);
                  }
                  

          });

                 
              
           
         return false;


       });
         
     }

     

     $("#btnFechar").click(function(){
         
       $("#divAssunto").removeClass("has-warning has-feedback");
       $("#divAssunto > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");  
       $("#assunto").removeAttr("placeholder","Digite o assunto.");
       //-------
       $("#divCursos").removeClass("has-warning has-feedback");
       $("#divCursos > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");  
       $("#cbCursos").removeAttr("placeholder","Selecione uma opção.");
       //------
       $("#divMensagem").removeClass("has-warning has-feedback");
       $("#divMensagem > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");  
       $("#mensagem").removeAttr("placeholder","Digite a mensagem.");
       camposNotNull = 3;

     
     });
     
     

     // remover a validacao se o campo obrigatorio estiver preenchido
      function removerValidacao(divPai, campo) {
       
        var seletor = "#"+divPai
        if(campo.value != ''){
             
           $(seletor).removeClass("has-warning has-feedback");
           $(seletor+" > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");  
           $(seletor+" > input").removeAttr("placeholder",""); 
            camposNotNull--;//descrementando variavel
         

         }
        
       }

       
     

      /*$(function() {
       // setTime();
        //function setTime() {
          
          //var string = "Timestamp: "+date;
         // var x = 0;
          //setTimeout(setTime, 3000);
          //$('#feed').html("a");
        }
      });*/

     </script>
    </body>
</html>
