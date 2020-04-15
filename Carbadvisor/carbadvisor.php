<?php
require_once("lib/db_parms.php");
spl_autoload_register(function ($className) {
    include ("lib/{$className}.class.php");
});
date_default_timezone_set ('Europe/Paris');
try {
  require('views/pageAccueil.php');
} catch (Exception $e) {

}
