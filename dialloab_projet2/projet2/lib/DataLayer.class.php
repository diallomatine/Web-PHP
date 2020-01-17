<?php

require_once("lib/db_parms.php");
Class DataLayer{
    private $connexion;

    // établit la connexion à la base en utilisant les infos de connexion des constantes DB_DSN, DB_USER, DB_PASSWORD
    // susceptible de déclencher une PDOException
    public function __construct(){
            $this->connexion = new PDO(
                       DB_DSN, DB_USER, DB_PASSWORD,
                       [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,     // déclencher une exception en cas d'erreur
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // chaque ligne du résultat sera une table associative
                       ]
                     );

    }
// SELECT setval('posts_id_seq', 7)

    function UpdateProfil($psoeudo, $nom, $prenom, $ville, $mail, $description, $password){
      $sql=<<<EOD
      update utilisateur set nom=:nom, prenom=:prenom,ville=:ville, mail=:mail, description=:description,
      password=:password where psoeudo=:psoeudo
EOD;
      $sql2=<<<EOD
      update utilisateur set nom=:nom, prenom=:prenom,ville=:ville, mail=:mail, description=:description
      where psoeudo=:psoeudo
EOD;

      $stmt2=$this->connexion->prepare($sql2);
      $stmt=$this->connexion->prepare($sql);
      $stmt->bindValue(':nom', $nom);
      $stmt->bindValue(':prenom', $prenom);
      $stmt->bindValue(':ville', $ville);
      $stmt->bindValue(':mail', $mail);
      $stmt->bindValue(':description', $description);
      $stmt->bindValue(':password', password_hash($password,CRYPT_BLOWFISH));
      $stmt->bindValue(':psoeudo', $psoeudo);

      $stmt2->bindValue(':nom', $nom);
      $stmt2->bindValue(':prenom', $prenom);
      $stmt2->bindValue(':ville', $ville);
      $stmt2->bindValue(':mail', $mail);
      $stmt2->bindValue(':description', $description);
      // $stmt2->bindValue(':password', password_hash($password,CRYPT_BLOWFISH));
      $stmt2->bindValue(':psoeudo', $psoeudo);

      if ($password == '') {
        $stmt2->execute();
        return $this->findUtilisateur($psoeudo);
      }
      $stmt->execute();
      return $this->findUtilisateur($psoeudo);

    }
    function getInfoUser($psoeudo){
      $sql=<<<EOD
      select nom, prenom,mail,ville, description, password from utilisateur where psoeudo=:psoeudo
EOD;
      $stmt=$this->connexion->prepare($sql);
      $stmt->bindValue(':psoeudo', $psoeudo);
      $stmt->execute();
      return $stmt->fetchAll();

    }

    function createUtilisateur($psoeudo, $password){
      $sql=<<<EOD
      insert into utilisateur(psoeudo, password) values(:psoeudo, :password)
EOD;
      // password_hash($motDePasse,CRYPT_BLOWFISH)
      $stmt=$this->connexion->prepare($sql);
      $stmt->bindValue(':psoeudo',$psoeudo);
      $stmt->bindValue(':password',password_hash($password,CRYPT_BLOWFISH));
      $stmt->execute();
      return $psoeudo;
    }


    function notePost($postIdentifiant, $avis){
      $sql1=<<<EOD
      update posts set liked=liked+1 where id=:id
EOD;
      $sql2=<<<EOD
      update posts set nolike=nolike+1 where id=:id
EOD;
    $stmt1=$this->connexion->prepare($sql1);
    $stmt2=$this->connexion->prepare($sql2);
    $stmt1->bindValue(':id', $postIdentifiant);
    $stmt2->bindValue(':id', $postIdentifiant);
    if ($avis ==='like') {
      $stmt1->execute();
      return $this->objetPost($postIdentifiant);
    }
    elseif ($avis ==='nolike') {
      $stmt2->execute();
      return $this->objetPost($postIdentifiant);
    }
    else {
      return NULL;
    }
    }

    function objetPost($postIdentifiant){
      $sql=<<<EOD
      select id,auteur,station,titre,contenu,liked, nolike, datecreation from posts where id=:id
EOD;
      $stmt=$this->connexion->prepare($sql);
      $stmt->bindValue(':id', $postIdentifiant);
      $stmt->execute();
      $res = $stmt->fetchAll();
      if (count($res)>0) {
        return $res;
      }
      return NULL;
    }


    function deletePost($postIdentifiant){
      $sql1=<<<EOD
      select id from posts where id=:id
EOD;
      $sql2=<<<EOD
      delete from posts where id=:id
EOD;
      $sql3=<<<EOD
      SELECT setval('posts_id_seq', )
EOD;
      $stmt1=$this->connexion->prepare($sql1);
      $stmt2=$this->connexion->prepare($sql2);
      // print_r($stmt1);
      $stmt1->bindValue(':id', $postIdentifiant);
      $stmt2->bindValue(':id', $postIdentifiant);

      $stmt1->execute();
      $res1 = $stmt1->fetchAll();
      if (count($res1) == 0) {
        return NULL;
      }
      $stmt2->execute();
      return $res1;

    }

    function createPost($auteur,$station, $titre, $contenu){
      $sql1=<<<EOD
      insert into posts(auteur, station, titre, contenu) values(:auteur, :station, :titre, :contenu)
EOD;
      $sql2=<<<EOD
      select id from posts where auteur=:auteur and station=:station and titre=:titre and contenu=:contenu
EOD;
      // $sql3=<<<EOD
      // update utilisateur

      $stmt=$this->connexion->prepare($sql1);
      $stmt2=$this->connexion->prepare($sql2);

      $stmt->bindValue(':auteur',$auteur);
      $stmt->bindValue(':station', $station);
      $stmt->bindValue(':titre', $titre);
      $stmt->bindValue(':contenu', $contenu);

      $stmt2->bindValue(':auteur',$auteur);
      $stmt2->bindValue(':station', $station);
      $stmt2->bindValue(':titre', $titre);
      $stmt2->bindValue(':contenu', $contenu);

      $stmt->execute();
      $stmt2->execute();
      $res = $stmt2->fetchAll();
      if (count($res)>0) {
        return $res;
      }
      return NULL;

    }

    function noteStation($idStation,$noteglobal, $noteaccueil, $noteprix,$noteservice){
      $sql=<<<EOD
      update stationsp2 set nbnotes=nbnotes +1, noteglobal=:noteglobal, noteaccueil=:noteaccueil, noteprix=:noteprix, noteservice=:noteservice  where id=:idStation
EOD;
      $stmt=$this->connexion->prepare($sql);
      $stmt->bindValue(':noteglobal', $noteglobal);
      $stmt->bindValue(':noteaccueil', $noteaccueil);
      $stmt->bindValue(':noteprix', $noteprix);
      $stmt->bindValue(':noteservice', $noteservice);
      $stmt->bindValue('idStation', $idStation);
      $stmt->execute();
      return $this->findStation($idStation);
    }

    function findMesPosts($psoeudo){
      $sql=<<<EOD
      select id, station, auteur, titre, contenu, datecreation from posts  where auteur=:auteur order by datecreation desc
EOD;
      $stmt= $this->connexion->prepare($sql);
      $stmt->bindValue('auteur', $psoeudo);
      $stmt->execute();
      $res = $stmt->fetchAll();
      return $res;
    }


    function findPosts($station){
      $sql=<<<EOD
      select id, station, auteur, titre, contenu, dateCreation, liked, nolike from posts where station=:station order by dateCreation desc
EOD;
      $stmt=$this->connexion->prepare($sql);
      $stmt->bindValue('station', $station);
      $stmt->execute();
      $res = $stmt->fetchAll();
      if (count($res)>0) {
        return $res;
      }
      return NULL;
    }

    function findStation($id){
      $sql=<<<EOD
      select id, nom, marque,latitude, longitude, adresse, ville, cp, nbnotes,noteglobal, noteaccueil, noteprix, noteservice from stationsp2 where id=:id
EOD;
      $stmt = $this->connexion->prepare($sql);
      $stmt->bindValue('id', $id);
      $stmt->execute();
      $res = $stmt->fetchAll();
      if (count($res)>0) {
        return $res;
      }
      return NULL;
    }

    function findBestStations(){
      $sql=<<<EOD
      select id, nom, marque,latitude, longitude, adresse, ville, cp, nbnotes,noteglobal, noteaccueil, noteprix, noteservice from stationsp2 order by noteglobal desc limit 10
EOD;
    $stmt = $this->connexion->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
    if (count($res)>0) {
      return $res;
    }
    return NULL;
   }


    function findUtilisateur($psoeudo){
      $sql=<<<EOD
      select psoeudo,nom, prenom, mail,ville, description,nbavis,total,nbposts,nblike, nbnolike from utilisateur where psoeudo=:psoeudo
EOD;
      $stmt = $this->connexion->prepare($sql);
      $stmt->bindValue(':psoeudo', $psoeudo);
      $stmt->execute();
      $res = $stmt->fetchAll();
      if (count($res)>0) {
        return $res;
      }
      return NULL;
    }


    function authentifier($login, $password){
      $sql =<<<EOD
      select nom, prenom, psoeudo, password from utilisateur where psoeudo=:psoeudo
EOD;
      $stmt = $this->connexion->prepare($sql);
      $stmt->bindValue(':psoeudo', $login);
      $stmt->execute();
      $res = $stmt->fetchAll();
      if (count($res)==0) {
        return NULL;
      }
      $motDePass = $res[0]['password'];
      $nom = $res[0]['nom'];
      $prenom = $res[0]['prenom'];
      if (crypt($password,$motDePass) == $motDePass) {
        return new Identite($login,$nom, $prenom);
      }
      return NULL;
    }

    function createUser($login,$password,$nom,$prenom){
      $sql=<<<EOD
      insert into s8_users(login, password, nom, prenom) values(:login, :password, :nom, :prenom)
EOD;
      $motDePass = password_hash($password,CRYPT_BLOWFISH);
      $stmt=$this->connexion->prepare($sql);
      $stmt->bindValue(':login', $login);
      $stmt->bindValue(':password', $motDePass);
      $stmt->bindValue(':nom', $nom);
      $stmt->bindValue(':prenom', $prenom);

    try {
      $stmt->execute();
      return TRUE;
    } catch (Exception $e) {
      return FALSE;
    }

    }

    /** Enregistre un avatar pour l'utilisateur $login
    * paramètre $imageSpec : un tableau associatif contenant deux clés :
    *   'data' : flux ouvert en lecture sur les données à stocker
    *   'mimetype' : type MIME (chaîne)
    * résultat : booléen indiquant si l'opération s'est bien passée
    */
    function storeAvatar($imageSpec, $login){
      $contenu = $imageSpec['data'];
      $mimetype = $imageSpec['mimetype'];
      // print_r($contenu);
      // print_r(" ".$mimetype);

      $sql=<<<EOD
      update s8_users set mimetype=:mimetype, avatar=:contenu where login=:login
EOD;
      $stmt = $this->connexion->prepare($sql);
      $stmt->bindValue('contenu', $contenu, PDO::PARAM_LOB);
      $stmt->bindValue(':mimetype', $mimetype);
      $stmt->bindValue(':login', 'dialloab');
      try {
        $stmt->execute();
        return TRUE;
      } catch (Exception $e) {
        return FALSE;
      }
    }
  }
