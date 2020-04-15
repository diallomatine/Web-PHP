<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta charset="UTF-8"/>
		<title>Connexion Reussi</title>
		<meta name="author" content="A MODIFIER"/>
		<meta name="keywords" content="A COMPLETER"/>
    <link rel="stylesheet" href="style/login.css">
		<script src="js/fetchUtils.js"></script>
		<script src="js/login.js"></script>
	</head>

	<body>
		<div id="connecte">
			<h3>Vous etes bien connecté </h3>
			<header>
				<div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
				<div id="mesposts"><a href="post.php">Mes Posts</a></div>
				<div id="monprofil"><a href="profil.php">Mon Profil</a></div>
				<div id="deconnexion"> Se Deconnecter</div>
			</header>
		</div>


		<div id="deconnecte" hidden="">
			<h3>Vous etes deconnectés  </h3>
			<p><a href="login.php">Cliquez ici pour vous connecter</a></p>
			<header>
				<div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
				<div id="mesposts"><a href="post.php">Mes Posts</a></div>
				<div id="monprofil"><a href="profil.php">Mon Profil</a></div>
				<div id="deconnexion"> Se Deconnecter</div>
			</header>
		</div>


	</body>

</html>
