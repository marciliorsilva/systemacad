<?php
  include_once "../../control/LoginSecretariaControl.class.php";
  $objLogin = new LoginSecretariaControl();
  
  $objLogin->verificarLogado();

?>
                       <div  id="logo" class="collapsed">
                         <h4>
                            SystemAcad&nbsp;&nbsp;<span class="glyphicon glyphicon-education"></span>
                           <br>
                           
                           <small> 
                           <?php echo unserialize($objLogin->getUser())->getNome(); ?></small>
                         </h4>
                       </div>