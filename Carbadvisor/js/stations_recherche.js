window.addEventListener('load', chargeInload);

function chargeInload(ev){
  document.getElementById('ok').onclick = function(){
    var carburants = stringCarburants()
    var commune = document.getElementById('commune').value
    var rayon = document.getElementById('rayon').value
    StationsRech(commune, rayon,carburants);
  }
}

function StationsRech(commune,rayon,carburants){
  let url= "http://webtp.fil.univ-lille1.fr/~clerbout/carburant/recherche.php?commune="+commune+"&rayon="+rayon+"&carburants="+carburants;
  fetchFromJson(url)
  .then(processStations)
  .then(placerMarkers, displayErrorRecherche);
}

function processStations(reponse){
  if (reponse.status == "ok") {
    return reponse.data;
  }
  throw new Error(reponse.message);
}


function stringCarburants(){
  var elements = document.querySelectorAll('div#carburants input')
  var res = '';
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].checked) {
      res += elements[i].value + ',';
    }
  }
  return res.substring(0, res.length -1);
}

function placerMarkers(list){
  var erreur = document.getElementById('erreurrecherche');
  erreur.textContent = ''
  var listPoints = [];
  for (var i = 0; i < list.length; i++) {
    var identifiant = list[i].id;
    var longi = list[i].longitude;
    var latitu = list[i].latitude;
    var dist = list[i].distance + " KM du centre la commune"
    var texte = dist +" <button value=\""+identifiant+"\"> choisir </button";
    var point = [latitu, longi];
    L.marker(point).addTo(map).bindPopup(texte);
    listPoints.push(point);
  }
  map.fitBounds(listPoints);
}

function displayErrorRecherche(error){
  var erreur = document.getElementById('erreurrecherche');
  var res = "<p>Veuillez entrer des données valides</p>"
  erreur.innerHTML = res;
}
// function theBest(list){
//   var best = document.getElementById('theBest')
//   best.innerHTML= "<strong> The Best : </strong>" +
// }
