<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');




if (isset($_SESSION['ident'])) {
  $args = new RequestParameters();
  $args->defineInt('postIdentifiant');

  if ($args->isValid())
      try{
        $data = new DataLayer();
        $res = $data->deletePost($args->getValue('postIdentifiant'));
        if ($res) {
          produceResult($res);
        }
        else {
          produceError("Vous tentez de supprimer un poste qui n'existe pas");
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
