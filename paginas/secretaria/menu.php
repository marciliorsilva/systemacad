<?php
  include_once "../../control/LoginSecretariaControl.class.php";
  $objLogin = new LoginSecretariaControl();
  
  $objLogin->verificarLogado();

?>
 <style type="text/css">
  .submenu{
 		background-color: #F8F8FF;

 	}
 	.submenu > .nav > li > a{
 		color:#c0c0c0;
    background-color: #c1c1c1;
 	}

  
 </style>
 <li class=""><a href="../../paginas/secretaria/index.php" ><span class="glyphicon glyphicon-bullhorn"></span> Feed de Avisos </a></li>
 
 <li class=""><a href="#" data-toggle="collapse" data-target="#submenu-curso" data-parent="#sidenav01" class="collapsed"><span class="glyphicon glyphicon-blackboard"></span> Curso</a>
    
    <div class="collapse submenu" id="submenu-curso" style="height: 0px;  ">
      <ul class="nav nav-list">
        <li><a href="../../paginas/secretaria/curso.php">&nbsp;<span class="glyphicon glyphicon-plus"></span>&nbsp;Novo</a></li>
        <li><a href="../../paginas/secretaria/periodo.php">&nbsp;<span class="glyphicon glyphicon-th"></span>&nbsp;Periodos</a></li>
        <li><a href="../../paginas/secretaria/cursoDisciplina.php">&nbsp;<span class="glyphicon glyphicon-link"></span>&nbsp;Curso/Disciplina</a></li>
      </ul>
     </div>

 </li>

 <li><a href="../../paginas/secretaria/disciplina.php">&nbsp;<span class="glyphicon glyphicon-book"></span>Disciplina</a></li>

 <li class=""><a href="../../paginas/secretaria/calendario-academico.php"><span class="glyphicon glyphicon-calendar"></span> Calendario Acadêmico</a></li>
 
 <li class=""><a href="#" data-toggle="collapse" data-target="#submenu-turma" data-parent="#sidenav01" class="collapsed"><span class="glyphicon glyphicon-education"></span> Turma </a>
    <div class="collapse submenu" id="submenu-turma" style="height: 0px;  ">
      <ul class="nav nav-list">
        <li><a href="../../paginas/secretaria/turma.php">&nbsp;<span class="glyphicon glyphicon-plus"></span>&nbsp;Novo</a></li>
        
        <li><a href="../../paginas/secretaria/turmaAluno.php" >&nbsp;<span class="glyphicon glyphicon-link"></span>&nbsp;Turma/Alunos</a></li>
      </ul>
    </div>
 </li>

 <li class=""><a href="#" data-toggle="collapse" data-target="#submenu-professor" data-parent="#sidenav01" class="collapsed" ><span class="glyphicon glyphicon-user"></span> Professor</a>
 
     <div class="collapse submenu" id="submenu-professor" style="height: 0px;  ">
      <ul class="nav nav-list">
        <li><a href="../../paginas/secretaria/professor.php">&nbsp;<span class="glyphicon glyphicon-plus"></span>&nbsp;Novo</a></li>
        
        <li><a href="../../paginas/secretaria/professorDisciplina.php">&nbsp;<span class="glyphicon glyphicon-link"></span>&nbsp;Professor/Disciplina</a></li>
      </ul>
     </div>


 </li>
 <li class=""><a href="../../paginas/secretaria/aluno.php"><span class="glyphicon glyphicon-user"></span> Aluno</a></li>
 <?php 
 $nivel = unserialize($objLogin->getUser())->getObjUsuario()->getNivelAcesso(); 

 if($nivel != 0){
  echo "<li class=''><a href='../../paginas/secretaria/secretaria.php'><span class='glyphicon glyphicon-user'></span> Secretaria</a></li>";
 }

 ?>
 
 <li class=""><a href="../../paginas/secretaria/mensagem.php"><span class="glyphicon glyphicon-envelope"></span> Mensagem&nbsp;&nbsp;<span class="badge">3</span></a></li>
                   
 <li class=""><a href="../../paginas/secretaria/mudar-senha.php"><span class="glyphicon glyphicon-lock"></span> Mudar Senha</a></li>
 <li class=""><a href="../../paginas/secretaria/logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>

 