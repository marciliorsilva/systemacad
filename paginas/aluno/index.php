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

        
        /*alterando botao da janela modal*/
        #btn-publicar{
          background-color:#4682B4;
          color: #fff; 
          font-weight: bold;
          margin-top:2%;
          margin-bottom: 10px;
        }

        #btn-publicar:hover,
        #btn-enviar-publicacao:hover,
        #btn-fechar-modal:hover{
          background-color: #428bca;
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

          background-color:#4682B4; 
          color: white;

        }

        .modal-title {
          font-weight: bold;
        }

        .modal-footer button{
        	color: #fff;
        	background-color: #4682B4;
        	font-weight: bold;
        }

        

       
        </style>

      
      

    </head>
    <body onload="carregarFeed()" >
    

    <div class="row affix-row" id="menu-aluno">
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
                       <div  id="logo" class="collapsed">
                         <h4>
                            SystemAcad&nbsp;&nbsp;<span class="glyphicon glyphicon-education"></span>
                           <br>
                           
                           <small>Nome do usuario</small>
                         </h4>
                       </div>
                    </li>
                    <?php include '../../paginas/aluno/menu.php';?>
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
				  
            <div id="feed" ></div>

          
				    
			
		    </div>
	  </div>
   </div>


   <!-- Modal publicar -->
   <div id="modalPublicar" class="modal fade" role="dialog">
     <div class="modal-dialog">

      <!-- conteudo-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Publicar Aviso</h4>
          </div>
          <form id="formPublicar"  id="formPublicacao" method="get" onsubmit="teste()" action="#">
                <div class="modal-body">
       
                  <div class="form-group">
                    <label>Assunto:</label>
                    <input type="text" class="form-control" id="assunto" required>
                  </div>
                  <div class="form-group">
                    <label>Imagem:</label>
                    <div class="input-group input-file" >
					    <span class="input-group-btn">
        				  <button class="btn btn-default btn-choose" type="button">Carregar</button>
    				    </span>
    				    <input type="text" class="form-control" placeholder='Selecione uma imagem...' id="img" />
    				    <span class="input-group-btn">
       					   <button class="btn btn-warning btn-reset" type="button">Limpar</button>
    				    </span>
			         </div>
               
              
                   </div>
                   <div class="form-group">
                     <label for="comment">Mensagem:</label>
                     <textarea class="form-control" rows="5" id="mensagem" required></textarea>
                   </div> 
        
               </div>
               <div class="modal-footer">
                 <button type="submit" class="btn btn-default">Enviar</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal" >Fechar</button>
               </div>
         </form>

      </div>
    
    </div>
  </div>
   

   
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      
    <!--alterando input e button da opção carregamento da imagem na janela modal--> 
     <script type="text/javascript">
      
      function bs_input_file() {
	    $(".input-file").before(
		    function() {
			     if ( ! $(this).prev().hasClass('input-ghost') ) {
				    var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				    element.attr("name",$(this).attr("name"));
				    element.change(function(){
					    element.next(element).find('input').val((element.val()).split('\\').pop());
				    });
				    $(this).find("button.btn-choose").click(function(){
					  element.click();
				    });
				    $(this).find("button.btn-reset").click(function(){
				 	  element.val(null);
					  $(this).parents(".input-file").find('input').val('');
				    });
				    $(this).find('input').css("cursor","pointer");
				    $(this).find('input').mousedown(function() {
					    $(this).parents('.input-file').prev().click();
					    return false;
				    });
				    return element;
			     }
		    }
	   );
     }
     $(function() {
	    bs_input_file();
     });
       
     

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

    

     <!-- incrementando pagina feed.html na div(#feed) -->
     <script>
       function carregarFeed(){
          $("#feed").load("../../paginas/aluno/feed.php");
       }
    </script>

    

    </body>
</html>
