<?php
include_once "../../control/LoginSecretariaControl.class.php";
  $objLogin = new LoginSecretariaControl();
  $objLogin->verificarLogado();
  
?>
<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


  <style>
     
     body{
      background-image: url("../../img/OAYT5G0.jpg") ;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
      font-family:  'Montserrat', sans-serif;
     }

     #logo h1 {

      margin-top: 80px;
      text-align: center;
      color:white;
      font-weight: bold;
      font-size: 65px;
      font-variant: small-caps;
      text-shadow: 2px 2px 4px #000000;
     

     }
   
    .panel{
      width:50%;
      top: 25%;
      left: 25%;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0, 0.19);
     }

     @media screen and (max-width: 600px){


       
     	.panel{
     		width: 100%;
     		top: 20%;
        left: 5%;
        margin-left: 5%;

           

     	}
     	#logo h1{
          font-size: 30px;
          text-align: center;
     	}


     }

     .transparencia{
     	filter:alpha(opacity=20);
     	opacity: 0.9;
     	-moz-opacity: 0.9;
     	-webkit-opacity:0.9;
     	
     }


     /*Aluno*/
     .nav-tabs > #tabPrimeiroAcesso > a{
        color:#4B0082;
        font-size: 20px;
        font-weight: bold;
     }

    .nav-tabs > #tabPrimeiroAcesso.active > a,
    .nav-tabs > #tabPrimeiroAcesso.active > a:hover,
    .nav-tabs > #tabPrimeiroAcesso.active > a:focus {
     	color: #fff;  
        background-color: #4B0082;
        border: 1px solid #4B0082;
        
     }

     #formPrimeiroAcesso{
       background-color: #4B0082;
       padding-bottom: 3%;

     }

         /*--------------------------------------------*/


      /*margem nos forms */
     #formPrimeiroAcesso > form{
       margin-left: 20px;
       margin-right: 20px;
      
     }

     /*Alterando font do btn*/

    .btn-default{
       font-weight: bold;
     }

     /*Aluno -- botao*/

    #formPrimeiroAcesso > form > .form-group >.btn-default:hover{
       color: #fff;
       background-color: #87CEFA;
       border-color: #87CEEB;
     }

     #informacao{
      text-align: center;
      font-size: 18px;
     }
    
     
  </style>


 <head>

 <body>
   <div class="container">
     
     <div class="row">
       <div id="logo"><h1>SystemAcad&nbsp;&nbsp;<span class="glyphicon glyphicon-education"></span></h1></div> 
       <div class="panel panel-default center-block transparencia">
         
         <div class="panel-body">
           <ul class="nav nav-tabs nav-justified" id="menuAcesso">
  	          <li id="tabPrimeiroAcesso" class="active"><a href="#formPrimeiroAcesso">Trocar Senha</a></li>
           </ul>
     
    	     <div class="tab-content">
           <br>
    	         <div id="informacao" ><p>Bem vindo <?php echo unserialize($objLogin->getUser())->getNome(); ?>.. <br>Este é seu primeiro acesso ao sistema. <br>Por questao de segurança é necessario trocar a senha do primeiro acesso.</p></div>
               
                 <form action="#" id="form-primeiro-acesso">
                   
                    <div id="divEmail" class="form-group">
                     <label> Email</label>
                     <div class="input-group">
                       <span class="input-group-addon "><i class="glyphicon glyphicon-envelope"></i></span>
                       <input id="txtEmail" type="email" name="email" onblur="removerValidacao('divEmail',this)" class="form-control" placeholder="Digite seu email" >
                         <span id="alertEmail" class=""></span>
                     </div>
                   </div>

                   <div id="divNovaSenha" class="form-group">
                     <label> Nova senha</label>
                     <div class="input-group">
                       <span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
                       <input id="txtNovaSenha" type="password" name="novaSenha" onblur="removerValidacao('divUsuarioSec',this)" class="form-control" placeholder="Digite a nova senha" disabled="disabled">
                         <span id="alertNovaSenha" class=""></span>
                     </div>
                   </div>

                   <div id="divNovaSenha2" class="form-group">
                     <label> Digite a nova senha novamente</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="txtNovaSenha2" type="password" name="novaSenha2" onblur="removerValidacao('divNovaSenha2',this)" class="form-control" placeholder="Digite senha novamente" disabled="disabled">
                        <span id="alertNovaSenha2" ></span>
                     </div>
            
                   </div> 

                   <div class="form-group">
                       <button id="btnVerificar" type="submit" class="btn btn-default btn-block">Verificar</button>
                   </div>
                   
                       
                
                </form>
              


            </div>
          </div>
        </div>


     </div>
   </div>
   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
   
   <script type="text/javascript">

    var camposNotNull = 1;
    var emailValidado = false;

    $(window).load(function(){

     $("#form-primeiro-acesso").submit(function() {
       
       if(emailValidado != true){
          
          if(camposNotNull>0){
         
             if($("#txtEmail").val()== null || $("#txtEmail").val() ==""){
                $("#divEmail").addClass("has-warning has-feedback");
                $("#divEmail > div > #alertEmail").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
                $("#txtEmail").attr("placeholder","Digite seu email");
              }
                          

              return false;

            }else{

              var email = $("#txtEmail").val();
          
              $.post("../../paginas/secretaria/processar.php",{
            
                  email: email,
                  metodo: 'primeiroAcesso-validarEmail',
                  entidade: 'login'

               }, function(data){
             
             
                  if(data == true){
                    $("#txtEmail").attr('disabled','disabled');
                    $("#txtNovaSenha").removeAttr("disabled");
                    $("#txtNovaSenha2").removeAttr('disabled');
                    $("#btnVerificar").text('Cadastrar senha');
                    camposNotNull = 2;
                    emailValidado = true;
                

                  }else{
                    alert('Email informado não coincidem com o email cadastrado no sistema!');
                  }
             
             
             
              });

              }

          }else{

            if(camposNotNull > 0){

              if($("#txtNovaSenha").val()== null || $("#txtNovaSenha").val() ==""){
                $("#divNovaSenha").addClass("has-warning has-feedback");
                $("#divNovaSenha > div > #alertNovaSenha").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
                $("#txtNovaSenha").attr("placeholder","Digite a senha nova");
              }

              if($("#txtNovaSenha2").val()== null || $("#txtNovaSenha2").val() ==""){
                $("#divNovaSenha2").addClass("has-warning has-feedback");
                $("#divNovaSenha2 > div > #alertNovaSenha2").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
                
              }

            }else{

              var novaSenha = $('#txtNovaSenha').val();
              var novaSenha2 = $('#txtNovaSenha2').val();

              if(novaSenha == novaSenha2){

                $.post("../../paginas/secretaria/processar.php",{
            
                  novaSenha: novaSenha,
                  metodo: 'primeiroAcesso-alterarSenha',
                  entidade: 'login'

               }, function(data){
                 

                  
                  if(data == true){
                   
                  alert("Senha alterada com sucesso!");
                  window.location.href='../../paginas/secretaria/index.php';

                  }else{
                    alert('Erro ao alterar a senha.');
                  }
             
             
             
              });


              }else{
                alert('As duas senhas não coincidem.');
              }



            }


          }
       
       //---
        
         
       return false;

      });

     });
  
      $(document).ready(function () { 
          var $campoCpf = $("#txtUsuarioSec");
          $campoCpf.mask('000.000.000-00', {reverse: true});
          
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
