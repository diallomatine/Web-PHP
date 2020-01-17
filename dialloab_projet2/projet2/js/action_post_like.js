window.addEventListener('load', makePost);
// var idStation;

function makePost(){
  // ev.preventDefault();
  if (idStation == null) {
    idStation = window.location.search.split('=')[1];
  }
  makeNote();
  let url ='services/findPosts.php?station=' + idStation;
  fetchFromJson(url)
  .then(processAnswer)
  .then(placePosts, displayErrorPost);
  window.setTimeout(likeDislike,1000);
}
function placePosts(list) {
  var post = document.getElementById('commentaire')
  var res = "";//"<h5>Les posts</h5>"<span id=\"jePost\"> < je poste </span>
  res += "<ul>";//
  for (var i = 0; i < list.stations.length; i++) {
    res += "<li> <span class=\"date\"> Posté le " + list.stations[i].datecreation.split(' ')[0] +"</span><br/>";
    res += "<a href=\"infoprofil.php?psoeudo="+list.stations[i].auteur+"\">";
    res +="<img src=\"images/avatar_def.png\" width=\"40\" height=\"30\" /></a><br/>"
    res += list.stations[i].auteur.substring(0,6)
    res +=  "<span class=\"contenu\">"+list.stations[i].contenu+"</span>";
    res +=  "<br /><span class=\"like\"><img src=\"images/like.jpg\" width=\"40\" height=\"30\"/ data-avis=\"like\" id=\""+list.stations[i].id+"\">";
    res += list.stations[i].liked + "</span>";
    res += " <span class=\"like\"><img src=\"images/dislike.jpg\" width=\"40\" height=\"30\" data-avis=\"nolike\" id=\""+list.stations[i].id+"\"/>";
    res += list.stations[i].nolike+"</span></li>";
  }
  res += "</ul>";
  post.innerHTML = res;
  adresse();
}
// "+list.stations[i].auteur+"
function displayErrorPost(error){
  document.getElementById('jePost').hidden = false;
  var post = document.getElementById('commentaire')
  let res = "<p>Aucun commentaire sur cette station <br />"
  post.innerHTML = res;
}

function makeNote(){
  let url ='services/findStation.php?id='+ idStation;
  fetchFromJson(url)
  .then(processAnswer)
  .then(placeNote, displayErrorPost);
}
function placeNote(list){
  var note = document.getElementById('avisdonnee');
  var res ="";;
  res += "<span class=\"global\">Note global : "+ list[0].noteglobal +"</span><br/><br/>"
  res += "<span class=\"noteaccueil\"> Accueil : "+ list[0].noteaccueil +"</span><br/> "
  res += "<span class=\"noteprix\">Prix : "+ list[0].noteprix +"</span><br />"
  res += "<span class=\"noteservice\"> Services : "+ list[0].noteservice +"</span><br />";
  var fils = document.querySelector('div#avis > h6');
  note.innerHTML = res;
}
function likeDislike(){
  var img = document.querySelectorAll('ul li img');
  for (var i = 0; i < img.length; i++) {
    img[i].addEventListener('click', gestionLike)
  }

}
function gestionLike(){
  let url = 'services/notePost.php?postIdentifiant='+ this.id+'&avis=' + this.dataset.avis
  let options = {credentials:'same-origin'}
  fetchFromJson(url, options)
  .then(processAnswer)
  .then(traiteLikeNormal, traiteLikeAnormal)
}
function traiteLikeNormal(list){
  makePost();
}
function traiteLikeAnormal(error){
  let avisdonnee = document.getElementById('commentaire');
  let res = '<span class=\"echec\">Vous devez vous connecter avant de liker'
  res += '<br/><a href=\"login.php\">Cliquez ici pour vous connecter</a></span>'
  avisdonnee.innerHTML= res;;
  document.getElementById('jePost').hidden=false;
  window.setTimeout(makePost, 3000);
}
function adresse(){
  let url = 'services/findStation.php?id=' + idStation;
  fetchFromJson(url).then(processAnswer).then(putAdress)
}
function putAdress(list){
  var adresse = document.getElementById('adresse')
  adresse.innerHTML = "<strong>adresse : </strong> "+ list[0].adresse + "<br/>";
}
