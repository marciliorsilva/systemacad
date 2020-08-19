<html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 
  <style>
     
     body{
      background-image: url("img/OAYT5G0.jpg") ;
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
     .nav-tabs > #tabAluno > a{
        color:#4682B4;
        font-size: 20px;
        font-weight: bold;
     }

    .nav-tabs > #tabAluno.active > a,
    .nav-tabs > #tabAluno.active > a:hover,
    .nav-tabs > #tabAluno.active > a:focus {
     	color: #fff;  
        background-color: #4682B4;
        border: 1px solid #4682B4;
        
     }

     #formLoginAluno{
       background-color: #4682B4;
       padding-bottom: 3%;

     }

     /*--------------------------------------*/

     /*Professor*/

     .nav-tabs > #tabProfessor > a{
        color:#3CB371;
        font-size: 18px;
        font-weight: bold;
     }

    .nav-tabs > #tabProfessor.active > a,
    .nav-tabs > #tabProfessor.active > a:hover,
    .nav-tabs > #tabProfessor.active > a:focus {
     	color: #fff;
        background-color: #3CB371;
        border: 1px solid #3CB371;
        
     }

     #formLoginProfessor{
       background-color: #3CB371;
        padding-bottom: 3%;

     }

     /*-----------------------------------------*/
     /*Secretaria*/
     .nav-tabs > #tabSecretaria > a{
        color:#FF8C00;
        font-size: 18px;
        font-weight: bold;
     }

    .nav-tabs > #tabSecretaria.active > a,
    .nav-tabs > #tabSecretaria.active > a:hover,
    .nav-tabs > #tabSecretaria.active > a:focus {
     	color: #fff;
        background-color: #FF8C00;
        border: 1px solid #FF8C00;
        
     }

     #formLoginSecretaria{
       background-color: #FF8C00;
        padding-bottom: 3%;

     }
     /*--------------------------------------------*/


      /*margem nos forms */
     #formLoginAluno > form,
     #formLoginProfessor > form,
     #formLoginSecretaria > form{
       margin-left: 20px;
       margin-right: 20px;
      
     }

     /*Alterando font do btn*/

    .btn-default{
       font-weight: bold;
     }

     /*Aluno -- botao*/

    #formLoginAluno > form > .form-group >.btn-default:hover{
       color: #fff;
       background-color: #87CEFA;
       border-color: #87CEEB;
     }
     /*Professor -- botao*/
     #formLoginProfessor > form > .form-group >.btn-default:hover{
       color: #fff;
       background-color: #2E8B57;
       border-color: #3CB371;
     }

     /*Secretaria -- botao*/
     #formLoginSecretaria > form > .form-group >.btn-default:hover{
       color: #fff;
       background-color: #FFA500;
       border-color: #FF8C00;
     }
     
     label , .esqueceu-senha{
     	color:white;
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
  	          <li id="tabAluno" class="active"><a data-toggle="tab" href="#formLoginAluno">Aluno</a></li>
  	          <li id="tabProfessor"><a data-toggle="tab" href="#formLoginProfessor">Professor</a></li>
  	          <li id="tabSecretaria"><a data-toggle="tab" href="#formLoginSecretaria">Secretaria</a></li>
           </ul>
     
    	     <div class="tab-content">
    	        
              <div id="formLoginAluno"  data-toggle="validator" role="form" class="tab-pane fade in active ">
                 <br>
    	           <form action="paginas/aluno/index.php" >
    	             <div class="form-group">
    	         	     <label> Usuário</label>
    	         	     <div class="input-group">
    	         	 	     <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
    	   	     	 	     <input type="user" name="usuario" class="form-control" placeholder="Digite seu usuário" required>
			
    	         	     </div>
              	    </div>

                 	 <div class="form-group">
                	   <label> Senha</label>
                	   <div class="input-group">
              		      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
       	      		      <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" data-minlength="6" required>
                	   </div>
                      
                	 </div> 

                   <div class="form-group">
                       <button type="submit"  class="btn btn-default btn-block">Entrar</button>
                   </div>
                   
                   <div class="form-group">
		                 <div class="row">								
		                   <div class="text-center">
			                   <a href="#" tabindex="5" class="esqueceu-senha">Esqueceu a senha?</a>
                          </div>
		                 </div>
                  </div>
			
       	       	
             	  </form>
              </div>
              <!-- ++++++++++++Professor+++++++++++++++ -->
              <div id="formLoginProfessor"  data-toggle="validator" role="form" class="tab-pane fade in">
                 <br>
                 <form action="paginas/professor/index.php">
                   <div class="form-group">
                     <label> Usuário</label>
                     <div class="input-group">
                       <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
                       <input type="user" name="usuario" class="form-control" placeholder="Digite seu usuário">
      
                     </div>
                   </div>

                   <div class="form-group">
                     <label> Senha</label>
                     <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="senha" class="form-control" placeholder="Digite sua senha">
    
                     </div>
            
                   </div> 

                   <div class="form-group">
                       <button type="button" class="btn btn-default btn-block">Entrar</button>
                   </div>
                   
                   <div class="form-group">
                     <div class="row">                
                       <div class="text-center">
                         <a href="#" tabindex="5" class="esqueceu-senha">Esqueceu a senha?</a>
                       </div>
                     </div>
                  </div>
      
                
                </form>
              </div>
              <!-- +++++++++++++Secretaria++++++++++++++ -->
              <div id="formLoginSecretaria"  data-toggle="validator" role="form" class="tab-pane fade in">
                 <br>
                 <form action="#" id="form-login-secretaria">
                   
                   <div id="divUsuarioSec" class="form-group">
                     <label> Usuário</label>
                     <div class="input-group">
                       <span class="input-group-addon "><i class="glyphicon glyphicon-user"></i></span>
                       <input id="txtUsuarioSec" type="user" name="usuario" onblur="removerValidacao('divUsuarioSec',this)" class="form-control" placeholder="Digite seu cpf" >
                         <span id="alertUserSec" class=""></span>
                     </div>
                   </div>

                   <div id="divSenhaSec" class="form-group">
                     <label> Senha</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="txtSenhaSec" type="password" name="senha" onblur="removerValidacao('divSenhaSec',this)" class="form-control" placeholder="Digite sua senha">
                        <span id="alertSenhaSec" ></span>
                     </div>
            
                   </div> 

                   <div class="form-group">
                       <button type="submit" class="btn btn-default btn-block">Entrar</button>
                   </div>
                   
                   <div class="form-group">
                     <div class="row">                
                       <div class="text-center" >
                         <a href="#" tabindex="5" class="esqueceu-senha">Esqueceu a senha?</a>
                       </div>
                     </div>
                  </div>
      
                
                </form>
              </div>


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
    var camposNotNull = 2;
    $(document).ready(function(){
     $("#form-login-secretaria").submit(function() {
       if(camposNotNull>0){
         if($("#txtUsuarioSec").val()== null || $("#txtUsuarioSec").val() ==""){
              $("#divUsuarioSec").addClass("has-warning has-feedback");
              $("#divUsuarioSec > div > #alertUserSec").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtUsuarioSec").attr("placeholder","Digite o cpf");
                          
        }

        if($("#txtSenhaSec").val()== null || $("#txtSenhaSec").val() ==""){
             
              $("#divSenhaSec").addClass("has-warning has-feedback");
              $("#divSenhaSec > div > #alertSenhaSec").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtSenhaSec").attr("placeholder","Digite a senha");
                          
        }

        return false;

       }else{

          var user = $("#txtUsuarioSec").val();
          var password = $("#txtSenhaSec").val();

          $.post("paginas/secretaria/processar.php",{
            user:user,
            password:password,
            metodo:'logar',
            entidade:'login'
          }, function(data){
             
              if(data == 1){
                window.location.href='paginas/secretaria/index.php';
              } else if(data == 0){
                 window.location.href='paginas/acesso/primeiroAcesso.php';
              }else{
                 alert(data);
              }
             
             
             
          });

       }
        
         
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
