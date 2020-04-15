window.addEventListener('load', initialisePage)

function initialisePage(){
  initPosts();
}

function supprimePost(ev){
  ev.preventDefault();//
  // alert(parseInt(this.id))
  let url='services/deletePost.php?postIdentifiant='+parseInt(this.id);
  // alert(url);
  let options = {credentials:'same-origin'}
  fetchFromJson(url, options)
  .then(processAnswer)
  .then(deletePpost)
}
function deletePpost(){
  document.getElementById('suuprime').textContent  =  "Vous avez supprimer un poste"
  window.setTimeout(mask, 2000)
}

function mask(){
  document.location.href="http://webtp.fil.univ-lille1.fr/~dialloab/projet2/post.php";
}

function initPosts(){

  let url='services/findMesPosts.php';
  let options = {credentials:'same-origin'}
  fetchFromJson(url, options)
  .then(processAnswer)
  .then(placePosts, displayErrorPost);
}

function processAnswer(answer){
 if (answer.status == "ok") {
   return answer.result;
 }
 throw new Error(answer.message);
}

function placePosts(list){
  if (list == null) {
    var post = document.getElementById('lesposts')
    var res = "<h4> Vous n'avez donné votre avis à aucune statione encore</h4>";
    post.innerHTML =res;
    return;
  }
  var post = document.getElementById('lesposts')
  for (var i = 0; i < list.Stations.length; i++) {
    var divPost = document.createElement('div');
    divPost.id = list.Stations[i].id +"-post"
    divPost.className = "post";
    let res = "<h4> titre : "+list.Stations[i].titre+ "</h4>"
    res += "<p> post : "+list.Stations[i].contenu + " </p>";
    let button = document.createElement('button');
    button.id = list.Stations[i].id;
    button.textContent = "Supprimer ce post";
    button.addEventListener('click', supprimePost);
    divPost.innerHTML = res;
    divPost.appendChild(button)
    post.appendChild(divPost);
  }

}

function displayErrorPost(error){
  document.getElementById('connecte').hidden = true;
  document.getElementById('deconnecte').hidden = false;
}
