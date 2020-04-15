<?php
class Identite { 
  public $login;
  public $nom;
  public $prenom;
  public function __construct($login,$nom,$prenom)
  {
    $this->login = $login;
    $this->nom = $nom;
    $this->prenom = $prenom;
  }
}
?>