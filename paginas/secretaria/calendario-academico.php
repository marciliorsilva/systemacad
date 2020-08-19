<?php 
include_once "../../control/MatriculaControl.class.php";
include_once "../../control/LoginSecretariaControl.class.php";
 
  
  $objLogin = new LoginSecretariaControl();
  
  $objLogin->verificarLogado();

$objControl = new MatriculaControl();


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
	              <h3><span class="glyphicon glyphicon-calendar"></span> &nbsp;Calendario Acadêmico</h3>
            </div>	

            <div class="table-responsive">
            <div class="panel-group" id="accordion">

            <div class="panel-body">
                <table class="table table-condensed" style="border-collapse:collapse;">

                    <thead>
                        <tr><th>&nbsp;</th>
                            <th>Job Name</th>
                            <th>Description</th>
                            <th>Provider Name</th>
                            <th>Region</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                      
                       
                        <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle" data-parent="#accordion">
                                <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                                <td>OBS Name</td>
                            <td>OBS Description</td>
                            <td>hpcloud</td>
                            <td>nova</td>
                          <td> created</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="hiddenRow"><div id="demo2" class="accordian-body collapse">Demo2</div></td>
                        </tr>
                        <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle" data-parent="#accordion">
                            <td><button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                            <td>OBS Name</td>
                            <td>OBS Description</td>
                            <td>hpcloud</td>
                            <td>nova</td>
                          <td> created</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="hiddenRow"><div id="demo3" class="accordian-body collapse">Demo3</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
          </div> 
        
      </div>

                
            </div>
            <div id="group-button">
              <button class="btn btn-default">Incluir</button>
              <button class="btn btn-default">Consultar</button>
              <button class="btn btn-default">Excluir</button>
				    </div>
           

          
				    
			
		    </div>
	  </div>
   </div>


  
   

   
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      
    

    

    </body>
</html>
