<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');

$args = new RequestParameters();
if ($args->isValid())
    try{
      $data = new DataLayer();
      $res = $data->findBestStations();
      // print_r($res);
      if ($res) {
        produceResult($res);
      }
      else {
        produceError("Aucune Stations");
      }

    } catch (PDOException $e){
        produceError($e->getMessage());
    }
else
    produceError( implode(' ',$args->getErrorMessages()) );


?>
