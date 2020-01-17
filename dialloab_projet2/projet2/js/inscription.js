window.addEventListener('load', initInscription);

function initInscription(){
  document.forms.inscription.addEventListener('submit', traiteInscription);
}

function traiteInscription(ev){
  ev.preventDefault();
  let url='services/createUtilisateur.php?';
  let options = {method : 'post', body: new FormData(this),credentials:'same-origin'}
  fetchFromJson(url, options)
  .then(processAnswer)
  .then(inscritOk, inscritError);
}

function processAnswer(answer){
 if (answer.status == "ok") {
   return answer.result;
 }
 throw new Error(answer.message);
}

function inscritOk(list){
  var creation = document.getElementById('creationCompte');
  var res = "<strong>Votre compte a bien été créé </strong>";
  res += "<br /> <a href=\"profil.php\">Cliquer ici pour vous connecté</a>";
  creation.innerHTML = res;
  document.querySelector('form').hidden=true;
}
function inscritError(error){
  var creation = document.getElementById('creationCompte');
  var res = "<mark>Le login choisi existe déjà, veuillez choisir un autre login </mark>";
  creation.innerHTML = res;
}
