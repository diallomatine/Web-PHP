

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta charset="UTF-8"/>
		<title>Les posts</title>
		<meta name="author" content="A MODIFIER"/>
		<meta name="keywords" content="A COMPLETER"/>
    <link rel="stylesheet" href="style/post.css">
		<script src="js/fetchUtils.js"></script>
		<script src="js/post.js"></script>
	</head>

	<body>
		<div id="connecte">
			<header>
				<div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
				<div id="mesposts"><a href="post.php">Mes Posts</a></div>
				<div id="monprofil"><a href="profil.php">Mon Profil</a></div>
				<div id="deconnexion"><a href="login.php">Connexion</a></div>
			</header>

	    <h3>Voici les commentaires que vous avez publiés</h3>
			<div id="suuprime">

			</div>
			<div id="lesposts">

	    </div>
		</div>

		<div id="deconnecte" hidden="">
			<header>
				<div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
				<div id="mesposts"><a href="post.php">Mes Posts</a></div>
				<div id="monprofil"><a href="profil.php">Mon Profil</a></div>
				<div id="deconnexion"><a href="login.php">Connexion</a></div>
			</header>

			<h3>Vous n'etes pas connecté !</h3>
			<a href="login.php">Cliquez ici pour vous connecté ou vous inscrire</a>
		</div>

	</body>

</html>
