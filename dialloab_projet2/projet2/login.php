<?php
spl_autoload_register(function ($className) {
     include ("lib/{$className}.class.php");
 });
require('lib/db_parms.php');
$data = new DataLayer();

require_once('lib/watchdog.php');
require('views/pageLoginOk.php');

 ?>
