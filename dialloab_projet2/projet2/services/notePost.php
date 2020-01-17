<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');

if (isset($_SESSION['ident'])) {

  $args = new RequestParameters();
  $args->defineInt('postIdentifiant');
  $args->defineEnum('avis',['like','nolike']);


  if ($args->isValid())
      try{
        $data = new DataLayer();
        $res = $data->notePost($args->getValue('postIdentifiant'),$args->getValue('avis'));
        // echo $args->getValue('auteur');
        if ($res) {
          produceResult($res);
        }
        else {
          produceError("Vous tentez de supprimer un poste qui n'existe pas");
        }

      } catch (PDOException $e){
        // echo $args->getValue('auteur');
          produceError($e->getMessage());
      }
  else
      produceError( implode(' ',$args->getErrorMessages()) );

}
else{
  produceError("Vous devez vous connecter avant");
}


?>
