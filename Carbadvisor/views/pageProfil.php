<?php
  /*
    Utilise le contenu de $_SESSION (en particulier $_SESSION['ident'])
  */
  // if ( ! isset($_SESSION['ident'])){  // si la page était protégée, on ne devrait même pas faire ce test
  //     require('lib/watchdog.php');
  //     exit();
  // }
  $personne = $_SESSION['ident'];
  // print_r($personne);
  $avatarURL = "images/avatar_def.png";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <meta charset="UTF-8"/>
    <title>Page de profil</title>
    <link rel="stylesheet" type="text/css" href="style/profil.css" />
    <script src="js/fetchUtils.js"></script>
    <script src="js/profil.js"></script>
    <script src="js/action_update.js"></script>
  </head>
<body data-login="<?php echo $personne->login ?>">
    <header>
      <div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
      <div id="mesposts"><a href="post.php">Mes Posts</a></div>
      <div id="monprofil"><a href="profil.php">Mon Profil</a></div>
      <div id="deconnecte"><a href="login.php">Deconnexion</a></div>
    </header>

    <div id="profilNormal">
      <div id="connected" >
        <h1>
        <?php
        echo "<img class=\"avatar\" src=\"$avatarURL\" />";
        echo "{$personne->prenom} {$personne->nom}";
        ?>
        </h1>
      </div>

      <br/>
      <div id="miseAjour">
        <h3>Modifier mon profil</h3>
      </div>

      <footer>
        <span  id="deconnexion"> Se déconnecter</span>
      </footer>
    </div>


    <div id="profilAnormal" hidden="">
      <header>
        <div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
        <div id="mesposts"><a href="post.php">Mes Posts</a></div>
        <div id="monprofil"><a href="profil.php">Mon Profil</a></div>
        <div id="deconnexion"><a href="login.php">Connexion</a></div>
      </header>

      <h3>Vous n'etes pas connecté !</h3>
      <a href="login.php">Cliquez ici pour vous connecté ou vous inscrire</a>
    </div>

    <div id="update" hidden="">
      <form method="POST" action="" id="formAjour">
         <fieldset>
           <input type="text" name="psoeudo" id="psoeudo" value="<?php echo $personne->login ?>" autofocus hidden=""/>

           <label for="nom">Nom :</label>
           <input type="text" name="nom" id="nom" autofocus/>

           <br/><label for="prenom">Prénom :</label>
           <input type="text" name="prenom" id="prenom"  autofocus/>

           <br/><label for="mail">Email :</label>
           <input type="email" name="mail" id="mail" autofocus/>

           <br/><label for="ville">Ville :</label>
           <input type="text" name="ville" id="ville" autofocus/>

           <br/><label for="description">Description :</label>
           <textarea name="description" id="description" value="" rows="4" cols="10" maxlength="1024"></textarea>

          <br/><label for="password">Mot de passe :</label>
          <input type="password" name="password" id="password" value="" />

          <br/><button type="submit" name="valid">OK</button>
        </fieldset>
      </form>
    </div>




</body>
</html>
