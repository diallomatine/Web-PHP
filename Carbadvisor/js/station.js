//Diallo Abdoul Matine
// stations_recherche.js
window.addEventListener("load",setupListener);
var map;
var idStation;

function setupListener(){
  initialisecarte();
  setDonnees();

}
function placerMarker(list){
  var adresse = document.getElementById('adresse')
  adresse.innerHTML = "<strong>adresse : </strong> "+ list[0].adresse + "<br/>"
  var listPoints = [];
  for (var i = 0; i < list.length; i++) {
    var identifiant = list[i].id;
    var longi = list[i].longitude;
    var latitu = list[i].latitude;
    let nom = "";
    if (list[i].nom !== null) {
      nom = list[i].nom;
    };
    var texte = nom +" <button value=\""+identifiant+"\"> choisir </button";
    var point = [latitu, longi];
    L.marker(point).addTo(map).bindPopup(texte);
    listPoints.push(point);
  }
  map.fitBounds(listPoints);
}
function setDonnees(){
  var element = document.querySelector("#station");
  var id =element.dataset.identifiant;
  let url ='services/findStation.php?id='+id;
  fetchFromJson(url)
  .then(processAnswer)
  .then(placerMarker, displayError);

}

function processAnswer(answer){
 if (answer.status == "ok") {
   return answer.result;
 }
 throw new Error(answer.message);
}

function initialisecarte(){
  map = L.map('station');
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);
  map.on("popupopen",activerBouton);
  map.on("click",afficheCoord);
}

function displayError(error){
  alert("La commune n'est pas valide")
}
/**
*Place les informations de l'element sur lequel on a cliqué à coté de la carte
*@param ev c'est l'evenement declenché lors du click sur un element de la carte
*/
function placeElement(ev) {
    idStation = this.value;
    makeServiceEtPrix(ev);
    makePost();
    makeNote();
}

// gestionnaire d'évènement (déclenché lors de l'ouverture d'un popup)
// cette fonction va rendre actif le bouton inclus dans le popup en lui assocaint un gestionnaire d'évènement
function activerBouton(ev) {
    var noeudPopup = ev.popup._contentNode; // le noeud DOM qui contient le texte du popup
    var bouton = noeudPopup.querySelector("button"); // le noeud DOM du bouton inclu dans le popup
    bouton.addEventListener("click",placeElement); // en cas de click, on déclenche la fonction boutonActive
}

// gestionnaire d'évènement (déclenché lors d'un click sur le bouton dans un popup)
function boutonActive(ev) {
    // this est ici le noeud DOM de <button>. La valeur associée au bouton est donc this.value
    alert("Vous avez choisi : " + this.value);
}

function afficheCoord(ev) {
    alert(ev.latlng);
}
