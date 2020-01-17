<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');


if ( !isset($_SESSION['ident'])) {
  $args = new RequestParameters();
  $args->defineNonEmptyString('login');
  $args->defineNonEmptyString('password');

  if (! $args->isValid()){
   produceError('argument(s) invalide(s) --> '.implode(', ',$args->getErrorMessages()));
   return;
  }
  $data = new DataLayer();
  $_SESSION['ident'] = $data->authentifier($args->getValue('login'), $args->getValue('password'));
  if ($_SESSION['ident']) {
    produceResult($_SESSION['ident']);
  }
  else {
    produceError('Identifiant ou mot de passe incorecte');
  }


} else {
   produceError("déjà authentifié");
   return;
}
?>
