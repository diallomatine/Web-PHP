<?php
require_once("lib/db_parms.php");
spl_autoload_register(function ($className) {
    include ("lib/{$className}.class.php");
});
date_default_timezone_set ('Europe/Paris');
try {
  if (condition) {
    // code...
  }
  // require('lib/buildStationCarte.php');
  require('views/infoStation.php');
}catch (Exception $e) {

}


?>
