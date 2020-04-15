<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');

$args = new RequestParameters();
$args->defineNonEmptyString('station');

if ($args->isValid())
    try{
      $data = new DataLayer();
      $res = $data->findPosts($args->getValue('station'));

      if ($res) {
        $date = date('d/m/Y H:i:s');
        $result = ['date'=>$date, 'stations'=>$res];
        produceResult($result);
      }
      else {
        produceError("L'utilisateur n'existe pas");
      }

    } catch (PDOException $e){
        produceError($e->getMessage());
    }
else
    produceError( implode(' ',$args->getErrorMessages()) );


?>
