<?php
/*
  Si la variable globale $erreurCreation est définie, un message d'erreur est affiché
  dans un paragraphe de classe 'message'
*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <meta charset="UTF-8"/>
    <title>Création d'utilisateur</title>
    <link rel="stylesheet" href="style/profil.css">
    <script src="js/fetchUtils.js"></script>
    <script src="js/inscription.js">

    </script>
</head>
<body>
  <header>
    <div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
    <div id="mesposts"><a href="post.php">Mes Posts</a></div>
    <div id="monprofil"><a href="profil.php">Mon Profil</a></div>
    <div id="deconnecte"><a href="logout.php">Deconnexion</a></div>
  </header>
<h2>Demande de création d'un utilisateur</h2>

<div id="creationCompte">

</div>

<form method="POST" action="" id="inscription">
   <p>Choisir un login et un mot de passe</p>
 <fieldset>

   <label for="login">Login :</label>
   <input type="text" name="psoeudo" id="login" required="required" autofocus/>
  <label for="password">Mot de passe :</label>
  <input type="password" name="password" id="password" required="required" />
  <button type="submit" name="valid">OK</button>
 </fieldset>
</form>
</body>
</html>
