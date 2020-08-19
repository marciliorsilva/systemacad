<?php
  include_once "../../control/LoginSecretariaControl.class.php";
 
  
  $objLogin = new LoginSecretariaControl();
  
  $objLogin->verificarLogado();
  
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
       
        	#formularioSenha{
        		position: absolute;
                width: 50%;
                left: 25%;

                
        	}

        	button{
        		width: 100%;
        	}

        	.input-group {
        		width: 100%;
        	}

        </style>
       
       
    </head>
    <body>
    

    <div class="row affix-row" id="menu-secretaria">
       <div class="col-sm-3 col-md-2 affix-sidebar">
     <div class="sidebar-nav">
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
              <h3><span class="glyphicon glyphicon-lock"></span> &nbsp;Mudar Senha</h3>
            </div>

            <div id="formularioSenha">

            <form action="#">
            	<div class="form-group">
            		<label>Digite a senha antiga:</label>
            		<div class="input-group"><input type="text" name="senhaAntiga" class="form-control"></div>
            		
            	</div>
            	<div class="form-group">
            		<label>Nova senha:</label>

            		<div class="input-group"><input type="text" name="senhaNova" class="form-control"></div>
            	</div>
            	<div class="form-group">
            		<label>Nova senha novamente:</label>
            		<div class="input-group"><input type="text" name="senhaNovaConfirmacao" class="form-control"></div>
            	</div>
            	<button class="btn btn-primary">Alterar Senha</button>
            </form>

            </div>
               
            

      
    </div>
  </div>
</div>
   

   
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
</html>
