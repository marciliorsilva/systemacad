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
         .card-body{
          height: 100px;
         }
         .card-title{
          font-size: 15px;
          text-align: center;
         }
         .modal-header {

          background-color:#4682B4; 
          color: white;

        }

        .modal-title {
          font-weight: bold;
        }

        #msg{
          position: absolute;
          
        }

        #msg span{
          width: 30px;
          height: 30px;
          border-radius: 25px;
          padding-top: 8px;
          margin-left: 95%;
          box-shadow: 1.5px 1.5px 1.5px 1.5px #dcdcdc;

        }
         #conteudo-mensagens{
        	width:100%;
            height:270px;
            background-color:#F2F2F2;
            overflow:auto;
            margin-bottom: 10px;

            padding: 5px 8px 8px 8px;

        }

        textarea{
        	resize: none;
        }


        </style>


    </head>
    <body>
    

    <div class="row affix-row" id="menu-aluno">
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
                <h3><span class="glyphicon glyphicon-envelope"></span> &nbsp; Mensagem</h3>
           </div>

            <div class="row">
                 
                     <div class="col-md-4 col-sm-6 col ">
                        <div class="card" style="width:250px; height:375px; margin-top:10px;">
                          <img class="card-img-top" src="../../img/img_avatar3.png" style="width:100%">
                          <div id="msg">
                            <span  class="badge">5</span>
                          </div>
                          <div class="card-body">
                              <h4 class="card-title">Professor1</h4>
                              
                          </div>
                          <div class="card-footer">
                             <button type="button" onClick="listaMensagens(this);" data-toggle="modal" data-target="#modalMensagem" value="Professor1" class="btn btn-primary btn-block">Mensagens</button>
                          </div>
                         </div>
                     </div>

                     <div class="col-md-4 col-sm-6">
                        <div class="card" style="width:250px; height:375px; margin-top:10px;">
                          <img class="card-img-top" src="../../img/img_avatar3.png" style="width:100%">
                          <div id="msg">
                            <span  class="badge">5</span>
                          </div>
                          <div class="card-body">
                              <h4 class="card-title">Professor2</h4>
                              
                          </div>
                          <div class="card-footer">
                             <button type="button" onClick="listaMensagens(this);" data-toggle="modal" data-target="#modalMensagem" value="Professor2" class="btn btn-primary btn-block">Mensagens</button>
                          </div>
                         </div>
                     </div>

                     <div class="col-md-4 col-sm-6">
                        <div class="card" style="width:250px; height:375px; margin-top:10px;">
                          <img class="card-img-top" src="../../img/img_avatar4.png" style="width:100%">
                          <div id="msg">
                            <span  class="badge">5</span>
                          </div>
                          <div class="card-body">
                              <h4 class="card-title">Professor3</h4>
                              
                          </div>
                          <div class="card-footer">
                             <button type="button" onClick="listaMensagens(this);" data-toggle="modal" data-target="#modalMensagem" value="Professor3" class="btn btn-primary btn-block">Mensagens</button>
                          </div>
                         </div>
                     </div>

                     
                    

             </div> 
       
    </div>
  </div>
</div>

<!-- Modal mensagem -->
   <div id="modalMensagem" class="modal fade" role="dialog">
     <div class="modal-dialog">

      <!-- conteudo-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 id="titulo-modal" class="modal-title"></h4>
          </div>
          
          <div class="modal-body">
            <div id="conteudo-mensagens" >
               <div class="media">
  				  <div class="media-left">
      				<img  id="icone-usuario" src="../../img/img_avatar3.png" class="media-object" style="width:60px">
    		 	  </div>
    		  	  <div class="media-body">
      				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    		  	  </div>
  			   </div>
  			   <hr>

  			   <div class="media">
  			      <div class="media-left">
      			     <img id="icone-usuario" src="../../img/img_avatar3.png" class="media-object" style="width:60px">
    		      </div>
    		      <div class="media-body">
      			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    		      </div>
  			   </div>
  			   <hr>
  			   
  			   <div class="media">
    		     <div class="media-body">
      			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    		     </div>
    		 	 <div class="media-right">
      				<img src="../../img/img_avatar1.png" class="media-object" style="width:60px">
    		  	 </div>
  			   </div>
               <hr>

               <div class="media">
    		     <div class="media-body">
      			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    		     </div>
    		 	 <div class="media-right">
      				<img src="../../img/img_avatar1.png" class="media-object" style="width:60px">
    		  	 </div>
  			   </div>
  			   <hr>

  			   


             </div>
             <form>
  			   	  <div class="form-group">
                     <label for="comment">Mensagem:</label>
                     <textarea class="form-control" rows="3" id="mensagem" style="width: calc(100% - 80px);"></textarea>
                     <button class="btn btn-default" style="position: absolute; right: 7px;  bottom:30px; width: 80px; height: 85px;">Enviar</button>
                   </div> 
  			  </form>
                
          </div>
          
          <div class="modal-footer">      
            <button type="button" class="btn btn-default" data-dismiss="modal" >Fechar</button>
          </div>
       
      </div>
    
    </div>
  </div>
   

   
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript">
       function listaMensagens(botao){

        document.getElementById('titulo-modal').innerHTML = "Mensagens - "+ botao.value;
        var x = document.getElementById('icone-usuario');
        if(botao.value == "Professor3"){
         x.src = "../../img/img_avatar4.png";	
        }else{
        x.src = "../../img/img_avatar3.png";
        }
         
       }
        
       
     </script>
        }

    </body>
</html>
