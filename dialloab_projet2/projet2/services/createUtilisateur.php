<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');

$args = new RequestParameters('post');
$args->defineNonEmptyString('psoeudo');
$args->defineNonEmptyString('password');


if ($args->isValid())
    try{
      $data = new DataLayer();
      $res = $data->createUtilisateur($args->getValue('psoeudo'),$args->getValue('password'));
      if ($res) {
        produceResult($res);
      }
      else {
        produceError("Cet identifiant existe deja");
      }

    } catch (PDOException $e){
        produceError($e->getMessage());
    }
else
    produceError( implode(' ',$args->getErrorMessages()) );


?>
