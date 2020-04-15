<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta charset="UTF-8"/>
		<title>Information sur cette station</title>
		<meta name="author" content="Abdoul Matine Diallo"/>
		<meta name="keywords" content="Station"/>
		<link rel="stylesheet" href="style/station.css">
		<script src="js/fetchUtils.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
	   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
	   crossorigin=""/>
	 <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
	   integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
	   crossorigin="">
	 </script>


	 <script src="js/station.js"></script>
	 <script src="js/stations_recherche.js"></script>
	 <script src="js/action_service_prix.js"></script>
	 <script src="js/action_post_like.js"></script>
	 <script src="js/donneAvisPost.js"></script>
	</head>

	<body>
		<div id="stationPrincipal">
			<header>
				<div id="accueil"><a href="carbadvisor.php">Accueil</a></div>
				<div id="mesposts"><a href="post.php">Mes Posts</a></div>
				<div id="monprofil"><a href="profil.php">Mon Profil</a></div>
				<div id="deconnexion"><a href="login.php">Deconnexion</a></div>
			</header>


<div id="formStation">
	<div id="form">
		<form  id="formRecherche" action="station.php" method="post">
			<label for="commune">Commune</label> <input type="text" name="commune" id="commune" value="Lille" required><br/>
			<label for="rayon">Rayon</label> <input type="number" name="rayon"  id="rayon" required value="1" min="1"><br/>
			<label for="carburant">Carburants</label><br />
			<input class="masque" type="text" name="id" <?php echo  "value=\"".$_GET['id']."\"";?>>
			<div id="carburants">
				<label for="Gazole">Gazole</label> <input type="checkbox" id="Gazole" name="Gazole" value="1"><br />
				<label for="sp95">sp95</label> <input type="checkbox" id="sp95" name="sp95" value="2"><br />
				<label for="E85">E85</label> <input type="checkbox" name="E85" id="E85" value="3"><br />
				<label for="GPLc">GPLc</label> <input type="checkbox" id="GPLc" name="GPLc" value="4"><br />
				<label for="E10">E10</label> <input type="checkbox" name="E10" id="E10" value="5"><br />
				<label for="SP98">SP98</label> <input type="checkbox" name="SP98" id="SP98" value="6"><br />
			</div>

			<br/><button type="button" id="ok" name="button">Rechercher</button>
		</form>
		<div id="erreurrecherche">

		</div>

	</div>
	<?php
	$id="<div id=\"station\" data-identifiant=\"".$_GET['id']."\"></div>";
	echo $id;
	?>

</div>

<div id="theBest"></div>

<div id="adresse"></div>
<section id="infoStation">

	<div id="serviceprix">
		<div id="services">
			<h5>Services :</h5>
		</div>
		<div id="prix">
			<h5>Les prix :</h5>

		</div>

	</div>

	<div id="note">
		<div id="avis">
			<h6>Vos avis</h6>
			<span id="donne_avis"> <   je donne mon avis</span>
			<div id="avisdonnee">

			</div>
		</div>

		 <div id="post">
		 <h6>Les posts</h6>
		 <span id="jePost"> < je poste </span>
		 <div id="commentaire">

		 </div>

		 </div>
	</div>


</section>


<form id="formAvis" action="" method="post" hidden="" >
	<label for="noteglobal">Global</label>  : <input type="number" name="global" id="noteglobal" min="1" max="5" value="1">
	<br/><label for="noteaccueil">Accueil</label> : <input type="number" id="noteaccueil" name="accueil" min="1" max="5" value="1">
	<br/><label for="noteprix">Prix</label> :  <input type="number" id="noteprix" name="prix" min="1" max="5" value="1">
	<br/><label for="noteservice">Services</label> :  <input type="number" id="noteservice" name="service" min="1" max="5" value="1">
	<br /> <button type="submit" id="noter">Noter</button>
</form>

<form id="formCommentaire" action="" method="post" hidden>
	<label for="titre">Titre</label> : <input type="text" id="titre" name="titre" required><br />
	<label for="contenu">Le commentaire</label> :
	<br /><textarea name="contenu" id="contenu" rows="8" cols="80"></textarea>
	<br/><button type="submit" id="comente">Commenter</button>
</form>



	</div>


	</body>

</html>
