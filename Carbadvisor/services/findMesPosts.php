<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');


if (isset($_SESSION['ident'])) {
  $args = new RequestParameters();

  if ($args->isValid())
      try{
        $data = new DataLayer();
        $res = $data->findMesPosts($_SESSION['ident']->login);
        if (count($res) > 0) {
          $date = date('d/m/Y H:i:s');
          $result = ['date'=>$date, 'Stations'=>$res];
          produceResult($result);
        }
        else {
          produceResult(NULL);
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
