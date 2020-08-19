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
    <div class="col-sm-9 col-md-10 col-lg-10 affix-content">
        <div class="container">
      
                <div class="page-header">
                  <h3><span class="glyphicon glyphicon-book"></span> &nbsp;Material de Estudo</h3>
                </div> 
               <div class="row">
                 
                     <div class="col-md-4">
                        <div class="card" style="width:250px; height:375px; margin-top:10px;">
                          <img class="card-img-top" src="../../img/img_avatar1.png" alt="Card image" style="width:100%">
                          <div class="card-body">
                              <h4 class="card-title">POO</h4>
                             
                              
                          </div>
                          <div class="card-footer">
                             <button type="button" onClick="disciplinaMaterial(this);" data-toggle="modal" data-target="#modalLista" value="POO" class="btn btn-primary btn-block">Lista de Material</button>
                          </div>
                         </div>
                     </div>

                     <div class="col-md-4">
                        <div class="card" style="width:250px; height: 375px; margin-top:10px;">
                          <img class="card-img-top" src="../../img/img_avatar1.png" alt="Card image" style="width:100%">
                          <div class="card-body">
                              <h4 class="card-title">Projeto e Prática 1</h4>
                          
                              
                          </div>
                          <div class="card-footer">
                             <button type="button" onClick="disciplinaMaterial(this);"  data-toggle="modal" data-target="#modalLista" value="Projeto e Prática 1" class="btn btn-primary btn-block">Lista de Material</button>
                          </div>
                         </div>
                     </div>

                     <div class="col-md-4">
                        <div class="card" style="width:250px; height: 375px; margin-top:10px;">
                          <img class="card-img-top" src="../../img/img_avatar1.png" alt="Card image" style="width:100%">
                          <div class="card-body">
                              <h4 class="card-title">Desenvolvimento para Web1</h4>
                              
                          </div>
                          <div class="card-footer">
                             <button type="button" onClick="disciplinaMaterial(this);" data-toggle="modal" data-target="#modalLista" value="Desenvolvimento para Web1" class="btn btn-primary btn-block">Lista de Material</button>
                          </div>
                   
                         </div>
                     </div>

                     <div class="col-md-4">
                        <div class="card" style="width:250px; height:375px; margin-top:10px;">
                          <img class="card-img-top" src="../../img/img_avatar1.png" alt="Card image" style="width:100%">
                          <div class="card-body">
                              <h4 class="card-title">Banco de Dados</h4>
                             
                          </div>
                          <div class="card-footer">
                             <button type="button" onClick="disciplinaMaterial(this);" data-toggle="modal" data-target="#modalLista"  value="Banco de Dados" class="btn btn-primary btn-block">Lista de Material</button>
                          </div>
                         </div>
                     </div>

               </div>
      
       </div>
    </div>
</div>
   
   <!-- Modal material -->
   <div id="modalLista" class="modal fade" role="dialog">
     <div class="modal-dialog">

      <!-- conteudo-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 id="titulo-modal" class="modal-title"></h4>
          </div>
          
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table table-bordered table-condensed table-hover ">
                <thead>
                   <tr>
                    
                     <th>Material</th>
                     <th>Download</th>
                  
                   </tr>
                 </thead>
                 <tbody>
                    <tr>
                     <td>material.odt</td>
                     <td><a>link<a/></td>
                   </tr>
                   <tr>
                     <td>material.odt</td>
                     <td><a>link<a/></td>
                   </tr>
                   <tr>
                     <td>material.odt</td>
                     <td><a>link<a/></td>
                   </tr>
                   <tr>
                     <td>material.odt</td>
                     <td><a>link<a/></td>
                   </tr>
                 </tbody>
              </table>
            </div>

                  
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
       function disciplinaMaterial(botao){

        var disciplina = document.getElementById('titulo-modal').innerHTML = "Material - "+ botao.value;
       }
        
       
     </script>

    </body>
</html>
