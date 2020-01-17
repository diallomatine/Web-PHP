<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');

if (isset($_SESSION['ident'])) {
  $args = new RequestParameters('post');
  $args->defineNonEmptyString('id');
  $args->defineFloat('global');
  $args->defineInt('accueil');
  $args->defineInt('prix');
  $args->defineInt('service');

  if ($args->isValid())
      try{
        $data = new DataLayer();
        $res = $data->noteStation($args->getValue('id'),$args->getValue('global'),$args->getValue('accueil'),$args->getValue('prix'),$args->getValue('service'));
        if ($res) {
          produceResult($res);
        }
        else {
          produceError("Votre note n'a pas été pris en compte");
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
