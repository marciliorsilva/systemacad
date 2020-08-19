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
            
           

            table {
            
              box-shadow: 5px 10px 8px #888888;
              text-align: center;

            }  
            #thSemana{

            	background-color: #4682B4;
            	color: white;
            	
            }

            th{
            	text-align: center;
            }

            #thMes{
              background-color: #dcdcdc;
              color: black;	
              
            }
  
            td > a:hover {   
                display: block;

                border: 2px solid rgb(70,130,180);
                background-color: #B0C4DE;
		    }

		    .modal-header{
		      background-color: #4682B4;
              color: white;
              font-weight: bold;
		    }

		    .modal-header h4{
		    	font-weight: bold;
		    }
       
        </style>



    </head>
    <body onload="calendario()">
    

    <div class="row affix-row " id="menu-aluno">
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
                <h3><span class="glyphicon glyphicon-calendar"></span>&nbsp; Calendario Acadêmico</h3>
            </div>
            <div id="calen" class="table-responsive"><div>
           
      
    </div>
  </div>
</div>
   

   
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script type="text/javascript">
     
      

     function calendario() {
   		// pegando o ano atual
   		var data = new Date();
   	    var ano = data.getFullYear();
    	
    	//variavel reponsavel para criar as tabelas
    	var calendario = "";
   
        // criando Arrays para forma  o calendario
  		var anoMeses = new Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio",
            "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro",
            "Dezembro");
    	var semana = new Array("Dom","Seg","Ter","Qua","Qui","Sex","Sab");
    	var mesDias = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
    	

        // criando matriz 6x7 para criar os dias do meses
    	var matriz = new Array(6);

    	for(var i = 0; i < matriz.length;i++){
    		matriz[i] = new Array(7);
    	}

         // estrutura de repetição reponsavel para inicializar as tabelas
    	for(var i =0; i < anoMeses.length;i++){
           
           // criando a data mes/dia/ano
           
           var	 mes = i+1;
           
            
           var mesDiaAno = mes+"/01/"+ano;
           // passando como parametro mesDiaAno para funcao DATE 
           var data2 = new Date(mesDiaAno); 
           // guardando index da semana de cada dia 1 onde mes é inicializado
           var indexSemana = data2.getDay();
           // contador de dias
           var contadorDias = 1;
           //inicializando tabela e criando head da tabela com o nome do mes
           calendario += '<table  class="table table-bordered table-condensed table-striped"><thead id="thMes"><tr ><th colspan=7>'+anoMeses[i] +" - "+ano+'<th></tr></thead>';


            // criando novo head para os nomes da semana
            calendario +='<thead id="thSemana"><tr>';


         	
         	for(var s = 0; s < semana.length;s++){

         		calendario +='<th>'+semana[s]+'</th>';
         	
         	}

         	calendario +='</tr></thead>';


         	//criando o corpo da tabela
         	calendario +='<tbody>';
            
            // estrutura de repeticao para criar as linhas da tabela
         	for(var x = 0; x < matriz.length; x++){
         		// criando a linha da tabela
         		calendario +='<tr>';

                // estrutura de repeticao para criar as colunas da tabela
         		for(var y = 0; y < matriz[x].length;y++){
                    
                    // condição para verificar se o contadorDias for maior do que a quantidade de dias do mes selecionado
                    //  o estrutura vai parar e passar para o proximo mes
         			if(contadorDias > mesDias[i]){
                        
                   	    break;

                    }

         	        // condicao para inicilizar o primeiro dia do mes no index da semana 
                   if(x===0 && y===indexSemana){ 

                     contadorDias = 1;
                     
                     calendario +='<td><a href="#" data-toggle="modal" data-target="#'+contadorDias+mes+ano+'" >'+contadorDias+'</a></td>';
                     calendario+= '<div id="'+contadorDias+mes+ano+'" class="modal fade" role="dialog">'+
                            '<div class="modal-dialog">'+
                              '<div class="modal-content">'+
                                 '<div class="modal-header">'+
                                    '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                      '<h4 class="modal-title">Eventos - '+contadorDias+" / "+anoMeses[i]+" / "+ano+'</h4>'+
                                  '</div>'+
                                  '<div class="modal-body">'+
                                      
                                      '<p><b><i>Evento1</i></b></p>'+
                                      '<p><b>Obs:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lectus orci, viverra nec neque non, tincidunt commodo leo.</p>'+

                                  '</div>'+
                                  '<div class="modal-footer">'+
                                      '<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>';
                   
                   }else if(x===0 && y < indexSemana){  

                     
                     calendario +='<td></td>';

                       
         		   }else{

         		   	 var dt = contadorDias;
         		   	 calendario +='<td><a href="#" data-toggle="modal" data-target="#'+contadorDias+mes+ano+'" >'+contadorDias+'</a></td>';
         		   	 calendario+= '<div id="'+contadorDias+mes+ano+'" class="modal fade" role="dialog">'+
                            '<div class="modal-dialog">'+
                              '<div class="modal-content">'+
                                 '<div class="modal-header">'+
                                    '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
                                      '<h4 class="modal-title">Eventos - '+contadorDias+" / "+anoMeses[i]+" / "+ano+'</h4>'+
                                  '</div>'+
                                  '<div class="modal-body">'+
                                      
                                      '<p><b><i>Evento1</i></b></p>'+
                                      '<p><b>Obs:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris lectus orci, viverra nec neque non, tincidunt commodo leo.</p>'+
                                  '</div>'+
                                  '<div class="modal-footer">'+
                                      '<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>'+
                                  '</div>'+
                                '</div>'+
                              '</div>'+
                            '</div>';
         		   }
         		

         		 contadorDias ++;

         	    }

         	    calendario +='</tr>';


         	}
         		
          
            calendario+= '</tbody></table><br>';
           


      }

     document.getElementById("calen").innerHTML = calendario;
	}	
    </script>
    
    </body>
</html>
