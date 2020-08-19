<?php 
include_once "../../control/ProfessorControl.class.php";
include_once "../../control/LoginSecretariaControl.class.php";
 
  
  $objLogin = new LoginSecretariaControl();
  
  $objLogin->verificarLogado();

$metodo = $_POST['metodo'];
$codigoProfessor = $_POST['cod'];


$objControlProfessor = new ProfessorControl();
$nome  = null;
$cpf = null; 
$rg= null;
$dtNascimento = null;
$sexo = null;
$cidade = null;
$bairro = null;
$uf = null;
$logradouro = null;
$numero = null;
$telefone = null; 
$email = null;
$codigoUsuario=null;
$senha = null; 
$nivel = null;
 

if($metodo=='consultar'){

 
  $objModel = $objControlProfessor->selectProfessor($codigoProfessor);
   
  
  $nome =  $objModel->getNome();
  $cpf = $objModel->getCpf();
  $rg =  $objModel->getRg();
  //--
  $data = str_replace("-", "/", $objModel->getDataNascimento());
  $dtNascimento = date('d-m-Y',strtotime($data));
  //--
  $sexo =  $objModel->getSexo();
  $cidade =  $objModel->getCidade();
  $bairro =  $objModel->getBairro();
  $uf =  $objModel->getUf();
  $logradouro =  $objModel->getLogradouro();
  $numero =  $objModel->getNumero();
  $telefone =  $objModel->getTelefone();
  $email =  $objModel->getEmail();
  $codigoUsuario = $objModel->getObjUsuario()->getCodigo();
  $senha =  $objModel->getObjUsuario()->getSenha();
  $nivel =  $objModel->getObjUsuario()->getNivelAcesso();
  echo $nivel;
  
  
}
 

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
       
       
        select, .input-group , #txtPesquisa{

          width: 100%;
        }

        .separador{
          width: 100%;
          border-top: 1px solid #dcdcdc;
          list-style-type: none;  
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
                <div id="group-button">
                  <a href="../../paginas/secretaria/professor.php"><button class="btn btn-default"><span class="glyphicon glyphicon-share-alt"></span></span>&nbsp;Voltar</button></a>
                </div>
	              <h3><span class="glyphicon glyphicon-user"></span> &nbsp;Professor</h3>
                
            </div>
            <div class="row">
               <form id="form-professor" action="#">
             
                   <div id="divNome" class="form-group col-md-12 col-lg-12 col-sm-12 col-xl-12" >

                       <label>Nome</label>
                       <div class="input-group">
                        <input id="txtNome" onblur="removerValidacao('divNome',this)" type="text" name="nome" class="form-control"  >
                        <span class=""></span>
                       </div>
                   
                   </div>

                   <div id="divCPF" class="form-group col-md-3 col-lg-3 col-sm-3 col-xl-3" >
                      <label>CPF</label>
                       <div class="input-group">
                        <input id="txtCpf" onblur="removerValidacao('divCPF',this)" type="text" name="cpf" class="form-control" >
                        <span class=""></span>
                       </div>
                   </div>

                   <div id="divRG" class="form-group col-md-3 col-lg-3 col-sm-3 col-xl-3" >
                      <label>RG</label>
                       <div class="input-group">
                        <input id="txtRg" onblur="removerValidacao('divRG',this)" type="text" name="rg" class="form-control" >
                        <span class=""></span>
                       </div>
                   </div>

                   <div id="divDtNasc" class="form-group col-md-3 col-lg-3 col-sm-3 col-xl-3" >
                      <label>Data Nascimento</label>
                       <div class="input-group">
                        <input id="txtDtNasc" onblur="removerValidacao('divDtNasc',this)" type="text" name="dataNascimento" class="form-control" >
                        <span class=""></span>
                       </div>
                   </div>
                   <div id="divSexo" class="form-group col-md-3 col-lg-3 col-sm-3 col-xl-3" >
                      <label>Sexo</label>
                       <div class="input-group">
                          <select id="cbSexo" class="form-control" onblur="removerValidacao('divSexo',this)">
                            <option value="" selected="selected">Selecione o Sexo</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                          </select>
                        <span class=""></span>
                       </div>
                   </div>

                    <div  class="form-group col-md-12 col-lg-12 col-sm-12 col-xl-12" >
                     Endereço
                     <div class="separador"></div>
                   </div>

                   <div id="divCidade" class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4" >
                      <label>Cidade</label>
                       <div class="input-group">
                        <input id="txtCidade" onblur="removerValidacao('divCidade',this)" type="text" name="cidade" class="form-control">
                        <span class=""></span>
                       </div>
                   </div>
                   <div id="divBairro" class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4" >
                      <label>Bairro</label>
                       <div class="input-group">
                        <input id="txtBairro" onblur="removerValidacao('divBairro',this)" type="text" name="bairro" class="form-control">
                        <span class=""></span>
                       </div>
                   </div>

                   <div id="divUF" class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4" >
                      <label>UF</label>
                       

                      <select id="cbUf" name="cbUf" class="form-control" onblur="removerValidacao('divUF',this)">
                        <option value="">Selecione o UF</option>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Rorâima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                      </select>
                   </div>

                   <div id="divLogradouro" class="form-group col-md-8 col-lg-8 col-sm-8 col-xl-8" >
                      <label>Logradouro</label>
                       <div class="input-group">
                        <input id="txtLogradouro" onblur="removerValidacao('divLogradouro',this)" type="text" name="logradouro" class="form-control">
                        <span class=""></span>
                       </div>
                   </div>
                   <div id="divNumero" class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4" >
                      <label>Numero</label>
                       <div class="input-group">
                        <input id="txtNumero" onblur="removerValidacao('divNumero',this)" type="text" name="numero" class="form-control">
                        <span class=""></span>
                       </div>
                   </div>

                   <div  class="form-group col-md-12 col-lg-12 col-sm-12 col-xl-12" >
                     Contato
                     <div class="separador"></div>
                   </div>
                   <div id="divEmail" class="form-group col-md-8 col-lg-8 col-sm-12 col-xl-8" >
                      <label>Email</label>
                       <div class="input-group">
                        <input id="txtEmail" onblur="removerValidacao('divEmail',this)" type="email" name="email" class="form-control">
                        <span class=""></span>
                       </div>
                   </div>
                   <div id="divTelefone" class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4" >
                      <label>Telefone</label>
                       <div class="input-group">
                        <input id="txtTelefone" onblur="removerValidacao('divTelefone',this)" type="txt" name="telefone" class="form-control">
                        <span class=""></span>
                       </div>
                   </div>


                   <div  class="form-group col-md-12 col-lg-12 col-sm-12 col-xl-12" >
                     Acesso ao sistema
                     <div class="separador"></div>
                   </div>
                    
                   <div id="divSenha" class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4" >
                      <label>Senha</label>
                        <div class="input-group">
                            <input id="txtSenha" type="password" onblur="removerValidacao('divSenha',this)" class="form-control">
                            <span class="input-group-addon">
                              <button id="olho" type="button" class="glyphicon glyphicon-eye-open" style="background:transparent;border:none;font-size: 17px;"></button>
                            </span>
                        </div>
                   </div>

                   <div id="divNivel" class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4" >
                      <label>Nivel de acesso</label>
                       <div class="input-group">
                        <select id="cbNivelAcesso" class="form-control" onblur="removerValidacao('divNivel',this)">
                          <option value="">Selecione o nivel</option>
                          <option value="0">Comum</option>
                          <option value="1">Master</option>
                        </select>
                         <span class=""></span>
                       </div>
                   </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xl-4" >
                      <label></label>
                       <div class="input-group">
                         <br>
                         <br>
                         <span class=""></span>
                       </div>
                   </div>

                  
                   <div id="group-button">
                      <button  id="btnCadastrar"  type="submit" class="btn btn-default disabled "><span class="glyphicon  glyphicon-save"></span>&nbsp;Cadastrar</button>
                      <button id="btnEditar" type="button" class="btn btn-default disabled "><span class="glyphicon glyphicon-refresh"></span>&nbsp;Editar</button>
                   </div>            
           
                 
               </form>

            </div>			
		    </div>
	  </div>
   </div>


  
   
     <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

      <script>
        
        
     </script>

     <script type="text/javascript">
     

      var camposNotNull = null;//variavel responsavel por contar campos obrigatorio não preenchidos
      var codigoProfessor = "<?php echo $codigoProfessor;?>"; // variavel responsavel por armazenar codigoProfessor selecionado da tabela passado pelo metodo POSt
      var codigoUsuario = "<?php echo $codigoUsuario;?>"
      var metodo = "<?php echo $metodo;?>"; // variavel responsavel por armazenar a ação que usuario escolheu
    
      //-----criando mascaras------

      $(document).ready(function () { 
          var $campoCpf = $("#txtCpf");
          $campoCpf.mask('000.000.000-00', {reverse: true});

          var $campoRg = $("#txtRg");
          $campoRg.mask('0.000.000', {reverse: true});

          var $campoData = $("#txtDtNasc");
          $campoData.mask('00/00/0000', {reverse: true});

           var $campoTelefone = $("#txtTelefone");
          $campoTelefone.mask('(00) 0000-0000', {reverse: true});


          

        });

        
        //-----------------------------
        // mostrando a senha ao clicar no icone

        var senha = $('#txtSenha');
        var olho = $('#olho');
        

        olho.mousedown(function() {
          senha.attr("type", "text");
        });

        olho.mouseup(function() {
          senha.attr("type", "password");
        });
        // para evitar o problema de arrastar a imagem e a senha continuar exposta, 
        //citada pelo nosso amigo nos comentários
        $( "#olho" ).mouseout(function() { 
            $("#txtSenha").attr("type", "password");
        });

  

      
       
       // metodo para inicializar formulario quando a pagina for carregada
       $(window).load(function(){

          
          if(metodo == 'incluir'){
            
            $("#btnCadastrar").removeClass("disabled");//ativando o botao cadastrar
            camposNotNull = 13;//armazenando quantidade de campos obrigatorio do formulario
           
          }else if(metodo == 'consultar'){

            $("input").attr("disabled","disabled");// desabilitando inputs 
            $("select").attr("disabled","disabled");// desabilitando selects 
            $("#btnEditar").removeClass("disabled");//ativando o botao editar
            
            //preenchendo formulario apos a consulta
            $("#txtNome").val("<?php echo $nome;?>");
            $("#txtCpf").val("<?php echo $cpf;?>");
            $("#txtRg").val("<?php echo $rg;?>");
            $("#txtDtNasc").val("<?php echo $dtNascimento;?>");
            $("#cbSexo").val("<?php echo $sexo;?>");
            $("#txtCidade").val("<?php echo $cidade;?>");
            $("#txtBairro").val("<?php echo $bairro;?>");
            $("#cbUf").val("<?php echo $uf;?>");
            $("#txtLogradouro").val("<?php echo $logradouro;?>");
            $("#txtNumero").val("<?php echo $numero;?>");
            $("#txtTelefone").val("<?php echo $telefone;?>");
            $("#txtEmail").val("<?php echo $email;?>");
            $("#txtSenha").val("<?php echo $senha;?>");
            $("#cbNivelAcesso").val("<?php echo $nivel;?>");
            
            
            
            
            

          }
   
       });


       // habilitando campos e o botao cadastrar apos o click do botao EDITAR
       $("#btnEditar").on("click", function (e) {
         $("input").removeAttr("disabled");
         $("select").removeAttr("disabled");
         $("#btnEditar").addClass("disabled");
         $("#btnCadastrar").removeClass("disabled");

           
       });

       //validando formulario de cadastro de Curso antes de enviar o formulario
       $("#form-professor").submit(function() {
         
         //verificando se tem algum campo obrigatorio não preenchido
         if(camposNotNull > 0){
         
             alert(camposNotNull);
            //verificando campos
            
            if($("#txtNome").val()== null || $("#txtNome").val() ==""){
              $("#divNome").addClass("has-warning has-feedback");
              $("#divNome > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");   
              $("#txtNome").attr("placeholder","Digite o nome do Professor");  
                          
            }else{
              $("#divNome").removeClass("has-warning has-feedback");
              $("#divNome > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");   
              $("#txtNome").removeAttr("placeholder","Digite o nome do Professor");
            }
            //--------------------------------------

            if($("#txtCpf").val()== null || $("#txtCpf").val() ==""){
              $("#divCPF").addClass("has-warning has-feedback");
              $("#divCPF > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtCpf").attr("placeholder","Digite o Cpf"); 
              
              
            }else{
              $("#divCPF").removeClass("has-warning has-feedback");
              $("#divCPF > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback");
              $("#txtCpf").removeAttr("placeholder","Digite o Cpf"); 
            }
            //-----------------------------------------------------------------
            
            if($("#txtRg").val()== null || $("#txtRg").val() ==""){
              $("#divRG").addClass("has-warning has-feedback");
              $("#divRG > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtRg").attr("placeholder","Digite o rg.");
                          
            }else{
              $("#divRG").removeClass("has-warning has-feedback");
              $("#divRG > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtRg").removeAttr("placeholder","Digite o rg.");
            }

            //--------------------------------------------------
            if($("#txtDtNasc").val()== null || $("#txtDtNasc").val() ==""){
              $("#divDtNasc").addClass("has-warning has-feedback");
              $("#divDtNasc > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtDtNasc").attr("placeholder","Digite data de nascimento.");
                          
            }else{
              $("#divDtNasc").removeClass("has-warning has-feedback");
              $("#divDtNasc > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtDtNasc").removeAttr("placeholder","Digite data de nascimento.");
            }

            //--------------------------------------------------------
            if($("#cbSexo").val()== null || $("#cbSexo").val() ==""){
              $("#divSexo").addClass("has-warning has-feedback");
              $("#divSexo > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#cbSexo").attr("placeholder","Quantidade de periodo");
                          
            }else{
              $("#divSexo").removeClass("has-warning has-feedback");
              $("#divSexo > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#cbSexo").removeAttr("placeholder","Quantidade de periodo");
            }

            //---------------------------------------------------------
            if($("#txtCidade").val()== null || $("#txtCidade").val() ==""){
              $("#divCidade").addClass("has-warning has-feedback");
              $("#divCidade > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtCidade").attr("placeholder","Digite a cidade.");
                          
            }else{
              $("#divCidade").removeClass("has-warning has-feedback");
              $("#divCidade > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtCidade").removeAttr("placeholder","Digite a cidade.");
            }

             //---------------------------------------------------------
            if($("#txtBairro").val()== null || $("#txtBairro").val() ==""){
              $("#divBairro").addClass("has-warning has-feedback");
              $("#divBairro > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtBairro").attr("placeholder","Digite o bairro.");
                          
            }else{
              $("#divBairro").removeClass("has-warning has-feedback");
              $("#divBairro > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtBairro").removeAttr("placeholder","Digite o bairro.");
            }
              //---------------------------------------------------------
            if($("#cbUf").val()== null || $("#cbUf").val() ==""){
              $("#divUF").addClass("has-warning has-feedback");
              $("#divUF > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#cbUf").attr("placeholder","Selecione o UF.");
                          
            }else{
              $("#divUF").removeClass("has-warning has-feedback");
              $("#divUF > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#cbUf").removeAttr("placeholder","Selecione o UF.");
            }

             //---------------------------------------------------------
            if($("#txtLogradouro").val()== null || $("#txtLogradouro").val() ==""){
              $("#divLogradouro").addClass("has-warning has-feedback");
              $("#divLogradouro > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtLogradouro").attr("placeholder","Digite o logradouro.");
                          
            }else{
              $("#divLogradouro").removeClass("has-warning has-feedback");
              $("#divLogradouro > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtLogradouro").removeAttr("placeholder","Digite o logradouro.");
            }

            //---------------------------------------------------------
            if($("#txtNumero").val()== null || $("#txtNumero").val() ==""){
              $("#divNumero").addClass("has-warning has-feedback");
              $("#divNumero > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtNumero").attr("placeholder","Digite o numero.");
                          
            }else{
              $("#divNumero").removeClass("has-warning has-feedback");
              $("#divNumero > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtNumero").removeAttr("placeholder","Digite o numero.");
            }
            //---------------------------------------------------------
            if($("#txtEmail").val()== null || $("#txtEmail").val() ==""){
              $("#divEmail").addClass("has-warning has-feedback");
              $("#divEmail > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtEmail").attr("placeholder","Digite o email.");
                          
            }else{
              $("#divEmail").removeClass("has-warning has-feedback");
              $("#divEmail > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtEmail").removeAttr("placeholder","Digite o email.");
            }
            //---------------------------------------------------------
            if($("#txtTelefone").val()== null || $("#txtTelefone").val() ==""){
              $("#divTelefone").addClass("has-warning has-feedback");
              $("#divTelefone > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#txtTelefone").attr("placeholder","Digite o telefone.");
                          
            }else{
              $("#divTelefone").removeClass("has-warning has-feedback");
              $("#divTelefone > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#txtTelefone").removeAttr("placeholder","Digite o telefone.");
            }
            //---------------------------------------------------------
            if($("#txtSenha").val()== null || $("#txtSenha").val() ==""){
              $("#divSenha").addClass("has-warning has-feedback");
              
              $("#txtSenha").attr("placeholder","Digite a senha.");
                          
            }else{
              $("#divSenha").removeClass("has-warning has-feedback");
              
              $("#txtSenha").removeAttr("placeholder","Digite a senha.");
            }

            //---------------------------------------------------------
            if($("#cbNivelAcesso").val()== null || $("#cbNivelAcesso").val() ==""){
              $("#divNivel").addClass("has-warning has-feedback");
              $("#divNivel > div > span").addClass("glyphicon glyphicon-warning-sign form-control-feedback");  
              $("#cbNivelAcesso").attr("placeholder","Selecione o Nivel.");
                          
            }else{
              $("#divNivel").removeClass("has-warning has-feedback");
              $("#divNivel > div > span").removeClass("glyphicon glyphicon-warning-sign form-control-feedback"); 
              $("#cbNivelAcesso").removeAttr("placeholder","Selecione o Nivel.");
            }


         
         return false;// impedindo o encaminhamento da pagina


         }else{

            
           
            //pegando valores dos campos quando não houver nenhum campo obrigatorio faltando
            var nome = $("#txtNome").val();
            var cpf = $("#txtCpf").val();
            var rg = $("#txtRg").val();
            var data = $("#txtDtNasc").val();
            var sexo = $("#cbSexo").val();
            var cidade = $("#txtCidade").val();
            var bairro = $("#txtBairro").val();
            var uf = $("#cbUf").val();
            var logradouro = $("#txtLogradouro").val();
            var numero = $("#txtNumero").val();
            var telefone = $("#txtTelefone").val();
            var email = $("#txtEmail").val();
            var senha = $("#txtSenha").val();
            var nivel = $("#cbNivelAcesso").val();
            
           
          
            
            //encaminhando os valores do formulario para ser processadas e encaminhadas para o banco
             $.post('../../paginas/secretaria/processar.php', {
                codigoProfessor: codigoProfessor,
                nome:nome,
                cpf:cpf,
                rg:rg,
                data:data,
                sexo:sexo,
                cidade:cidade,
                bairro:bairro,
                uf:uf,
                logradouro:logradouro,
                numero:numero,
                telefone:telefone,
                email:email,
                codigoUsuario:codigoUsuario,
                senha:senha,
                nivel:nivel,
                metodo:metodo,
                entidade:"professor"
                }, function(resposta){
                     // Valida a resposta do processo
                     // Se o processo estiver OK
                    if(resposta == 1){
                       
                       
                       if(metodo == "incluir"){
                        alert('Professor cadastrado com sucesso.'); 

                       }else{
                        alert('Professor editado com sucesso.'); 
                       }
                       //voltando para pagina anterior                  
                       window.location.href='../../paginas/secretaria/professor.php';

                    }else {

                       alert(resposta);
                    }
              });

          
            
          return false;// impedindo o encaminhamento 
          
          
          
         }
        
            

        });
       
        // funcao de validacao do input para aceitar so numeros
       function somenteNumeros(num) {
           var er = /[^0-9.]/;
           er.lastIndex = 0;
           var campo = num;
           if (er.test(campo.value)) {
            campo.value = "";
           }
        }

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
