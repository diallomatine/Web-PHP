
window.addEventListener('load', setupListener);

function setupListener(ev){
  ev.preventDefault();
  let donne_avis = document.getElementById('donne_avis');
  donne_avis.addEventListener('click', donneAvis);

  let jePost = document.getElementById('jePost');
  jePost.addEventListener('click', donneCommentaire);

}
function donneAvis(ev){
  this.hidden = true;
  let avisdonnee = document.getElementById('avisdonnee');
  avisdonnee.textContent = "";
  let formAvis = document.getElementById('formAvis');
  formAvis.hidden = false;
  avisdonnee.appendChild(formAvis);
  // document.getElementById('noter').addEventListener('click', validerNote)
  var station = "<input type=\"text\" name=\"id\" value=\""+idStation+"\" hidden=\"\">";
  let temp = formAvis.innerHTML;
  formAvis.innerHTML = station + temp;
  avisdonnee.appendChild(formAvis);

  document.forms.formAvis.addEventListener('submit', donneNote)
}

 function donneNote(ev){
   ev.preventDefault();

   let formAvis = document.getElementById('formAvis');
   formAvis.hidden = true;
   document.getElementById('stationPrincipal').appendChild(formAvis)

   let url='services/noteStation.php';
   let options = {method : 'post', body: new FormData(this),credentials:'same-origin'};
   fetchFromJson(url, options)
   .then(processAnswer)
   .then(noteSuccess, noteNotSuccess)
 }
function noteSuccess(list){
  // alert('oui')
  let avisdonnee = document.getElementById('avisdonnee');
  avisdonnee.textContent= 'bien !! merci pour votre note';
  document.getElementById('donne_avis').hidden=false;
  window.setTimeout(makePost, 2000);
}
function noteNotSuccess(error){
  let avisdonnee = document.getElementById('avisdonnee');
  let res = '<span class=\"echec\">Vous devez vous connecter avant de commenter</span>'
  res += '<br/><a href=\"login.php\">Cliquez ici pour vous connecter</a>'
  avisdonnee.innerHTML= res;;
  document.getElementById('donne_avis').hidden=false;
  window.setTimeout(makePost, 10000);
}

function donneCommentaire(ev){
  this.hidden = true;
  let avisdonnee = document.getElementById('commentaire');
  avisdonnee.textContent = "";
  let formAvis = document.getElementById('formCommentaire');
  formAvis.hidden = false;

  var station = "<input type=\"text\" name=\"station\" value=\""+idStation+"\" hidden=\"\">";
  let temp = formAvis.innerHTML;
  formAvis.innerHTML = station + formAvis.innerHTML;
  avisdonnee.appendChild(formAvis);

  document.forms.formCommentaire.addEventListener('submit', validerPost);
}


function validerPost(ev){
  ev.preventDefault();

  let formAvis = document.getElementById('formCommentaire');
  formAvis.hidden = true;
  document.getElementById('stationPrincipal').appendChild(formAvis)

  let url='services/createPost.php';
  let options = {method : 'post', body: new FormData(this),credentials:'same-origin'}
  fetchFromJson(url, options)
  .then(processAnswer)
  .then(postCommentaireSuccess, postNotSuccess)
}
function postCommentaireSuccess(list){

  let avisdonnee = document.getElementById('commentaire');
  avisdonnee.textContent= 'bien !! votre commentaire sera pris en compte dans 2 secondes';
  document.getElementById('jePost').hidden=false;
  window.setTimeout(makePost, 2000);
}


function postNotSuccess(error){
  let avisdonnee = document.getElementById('commentaire');
  let res = '<span class=\"echec\">Vous devez vous connecter avant de commenter'
  res += '<br/><a href=\"login.php\">Cliquez ici pour vous connecter</a></span>'
  avisdonnee.innerHTML= res;;
  document.getElementById('jePost').hidden=false;
  window.setTimeout(makePost, 10000);
}
