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
         #coluna-disciplina{
            width:  130px;
          }

          table tr, th{
            text-align: center;

          }

          table th{
            font-weight: bold;
            
          }

          table thead{
            background-color: #4682B4 ;
            color:#fff ;


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
                <h3><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Boletim
                </div>  
                 <div class="table-responsive">
              <table class="table table-bordered table-condensed table-hover ">
                 <thead>
                   <tr>
                     <th id="coluna-disciplina"></th>
                     <th>Unidade - 1</th>
                     <th>Unidade - 2</th>
                     <th>Media Final</th>
                     
                   </tr>
                 </thead>
                 <tbody>
                   
                   <tr>
                     <td>Disciplina</td>
                     <td>00.0</td>
                     <td>00.0</td>
                     <td>00.0</td>
                     
                   </tr>
                   <tr>
                     <td>Disciplina</td>
                     <td>00.0</td>
                     <td>00.0</td>
                     <td>00.0</td>
                   </tr>
                   <tr>
                     <td>Disciplina</td>
                     <td>00.0</td>
                     <td>00.0</td>
                     <td>00.0</td>
                   </tr>
                   <tr>
                     <td>Disciplina</td>
                     <td>00.0</td>
                     <td>00.0</td>
                     <td>00.0</td>
                   </tr>
                   <tr>
                     <td>Disciplina</td>
                     <td>00.0</td>
                     <td>00.0</td>
                     <td>00.0</td>
                   </tr>
                 </tbody>
              </table>  
         
            </div>
            
        
    </div>
  </div>
</div>
   

   
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
</html>
