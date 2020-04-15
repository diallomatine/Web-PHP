

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta charset="UTF-8"/>
		<title>Les posts</title>
		<meta name="author" content="A MODIFIER"/>
		<meta name="keywords" content="A COMPLETER"/>
    <link rel="stylesheet" href="style/profil.css">
		<script src="js/fetchUtils.js"></script>
		<script src="js/info.js"></script>
	</head>

	<body>
		<div id="connecte">
			<header>
				<div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
				<div id="mesposts"><a href="post.php">Mes Posts</a></div>
				<div id="monprofil"><a href="profil.php">Mon Profil</a></div>
				<div id="deconnexion"><a href="login.php">Connexion</a></div>
			</header>

	    <h3>Voici son profil</h3>
			<div id="profil">

	    </div>
		</div>

		<div id="deconnecte" hidden="">
			<header>
				<div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
				<div id="mesposts"><a href="post.php">Mes Posts</a></div>
				<div id="monprofil"><a href="profil.php">Mon Profil</a></div>
				<div id="deconnexion"><a href="login.php">Connexion</a></div>
			</header>

			<h3>Vous n'etes pas connecté <br />Vous devez vous connectez pour visiter le profil de quelqu'un!</h3>
			<a href="login.php">Cliquez ici pour vous connecté ou vous inscrire</a>
		</div>

	</body>

</html>
