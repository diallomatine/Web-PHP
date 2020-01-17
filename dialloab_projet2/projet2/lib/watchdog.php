<?php
  require('lib/session_start.php');

 if(!isset($_SESSION['ident'])){ // visiteur non encore authentifié
   $login = filter_input(INPUT_POST,'login');
   $password = filter_input(INPUT_POST,'password');
   $person = NULL;
   if ($login && $password){
     $person = $data->authentifier($login, $password);
   }

   if ($person !== NULL){ 
     $_SESSION['ident'] = $person;
   } else {
     require('views/pageLogin.php');
     exit();
   }
 }
?>
