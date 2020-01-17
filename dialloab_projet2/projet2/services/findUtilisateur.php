<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');

if (isset($_SESSION['ident'])){
  $args = new RequestParameters();
  $args->defineNonEmptyString('psoeudo');

  if ($args->isValid())
      try{
        $data = new DataLayer();
        $res = $data->findUtilisateur($args->getValue('psoeudo'));

        if ($res) {
          produceResult($res);
        }
        else {
          produceError("L'utilisateur n'existe pas");
        }

      } catch (PDOException $e){
          produceError($e->getMessage());
      }
  else
      produceError( implode(' ',$args->getErrorMessages()) );

}
else {
  produceError('Vous devez connectez avant de voir son profil');
}


?>
