<?php
/*
  Si $_SESSION['echec'] est définie, un message d'erreur est affiché
  dans un paragraphe de classe 'message'
*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <meta charset="UTF-8"/>
    <title>Authentifiez-vous</title>
    <link rel="stylesheet" href="style/profil.css">
</head>
<body>
  <!-- <header>
    <div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
    <div id="mesposts"><a href="post.php">Mes Posts</a></div>
    <div id="monprofil"><a href="profil.php">Mon Profil</a></div>
    <div id="deconnexion"><a href="login.php">Deconnexion</a></div>
  </header> -->
<?php
 if (isset($_SESSION['echec']))
   echo "<p class='message'>Les login et mot de passe précédemment fournis étaient incorrects</p>";
?>
<h2>Authentifiez-vous</h2>

<form method="POST" action="">
 <fieldset>
  <label for="login">Login :</label>
  <input type="text" name="login" id="login" required="required" autofocus/>
  <label for="password">Mot de passe :</label>
  <input type="password" name="password" id="password" required="required" />
  <button type="submit" name="valid">OK</button>
 </fieldset>
</form>
<p>Pas encore inscrit ? <a href="inscription.php">créez un compte.</a></p>
</body>
</html>

<?php
?>
