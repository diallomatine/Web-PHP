<?php

set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');

if ((isset($_SESSION['ident']))) {
  $args = new RequestParameters('post');
  // $args->defineNonEmptyString('auteur');
  $args->defineNonEmptyString('station');
  $args->defineNonEmptyString('titre');
  $args->defineNonEmptyString('contenu');
  if ($args->isValid())
      try{
        $data = new DataLayer();
        $res = $data->createPost($_SESSION['ident']->login,$args->getValue('station'),$args->getValue('titre'),$args->getValue('contenu'));
        if ($res) {
          produceResult($res);
        }
        else {
          produceError("Votre post n'a pas été pris en compte");
        }

      } catch (PDOException $e){
          produceError($e->getMessage());
      }
  else
      produceError( implode(' ',$args->getErrorMessages()) );
}
else{
  produceError("Vous devez vous connecter avant");
}



?>
