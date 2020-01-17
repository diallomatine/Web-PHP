<?php
set_include_path('..'.PATH_SEPARATOR);

require_once('lib/common_service.php');
require_once('lib/session_start.php');



if (isset($_SESSION['ident'])) {
  $args = new RequestParameters('post');
  // $args->defineNonEmptyString('psoeudo');
  $args->defineString('nom');
  $args->defineString('prenom');
  $args->defineString('mail');
  $args->defineString('ville');
  $args->defineString('description');
  $args->defineString('password');

  if (!$args->isValid()){
   produceError('argument(s) invalide(s) --> '.implode(', ',$args->getErrorMessages()));
   return;
  }

  $data = new DataLayer();
  $res = $data->getInfoUser($_SESSION['ident']->login);

  $nom = $args->nom == '' ? $res[0]['nom'] : $args->nom;
  $prenom = $args->prenom == '' ? $res[0]['prenom'] : $args->prenom;
  $ville = $args->ville == '' ? $res[0]['ville'] : $args->ville;
  $mail = $args->mail == '' ? $res[0]['mail'] : $args->mail;
  $description = $args->description == '' ? $res[0]['description'] : $args->description;
  // $password = $args->password == '' ? $res[0]['password'] : $args->password;
  //crypt($args->password,$res[0]['password'])
  $res1 = $data->UpdateProfil($_SESSION['ident']->login, $nom, $prenom, $ville, $mail, $description, $args->password);
  if ($res1) {
    produceResult($res1);
  }
  else{
    produceError('Essauyer de vous connecter et ressayer');
  }
}
else {
  produceError("Vous devez vous connectez avant");
  return;
}
?>
