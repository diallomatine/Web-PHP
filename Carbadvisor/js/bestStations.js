
window.addEventListener('load',afficheMeilleureStations);


function afficheMeilleureStations(ev){ // form event listener
  ev.preventDefault();
  let url = 'services/findBestStations.php';//+formDataToQueryString(new FormData(this));
  fetchFromJson(url)
  .then(processAnswer)
  .then(buildBestStations, displayError);
}

function processAnswer(answer){
 if (answer.status == "ok") {
   return answer.result;
 }
 throw new Error(answer.message);

}

function buildBestStations(list){
  var bestStations = document.getElementById('bestStations');
  for (var i = 0; i < list.length ; i++){//
    bestStations.appendChild(buildStation(i, list));
  }
}

function buildStation(i, station) {
  var div = document.createElement('div');
  var res = "";
  if (station[i].nom !== null) {
    res += "<strong>"+station[i].nom+"</strong> ";
  }
  res+= "<a href=\"station.php?id="+station[i].id+"\">"+station[i].marque+" </a>"
  res+= " "+station[i].adresse;
  res+= " "+station[i].nbnotes +" avis publiés </br> ";
  res += "<strong>"+station[i].noteglobal+" Global </strong> ";
  res += " Accueil "+station[i].noteaccueil + " Prix " +station[i].noteprix + " Services "+station[i].noteservice;
  res += "</br>";
  div.innerHTML = res;
  return div;

}


function displayError(error){
  let p = document.createElement('p');
  p.innerHTML = error.message;
  let cible  = document.querySelector('#bestStations');
  cible.textContent=''; // effacement
  cible.appendChild(p);
}


// -------- utilitaire (question 2 et 3)
/*
 * list : un tableau usuel non vide, donc chaque élément est un objet simple
 * résultat : une table (objet DOM) représentant les données de la table.
 *            les en-têtes de colonnes sont les noms d'attributs des objets
 */
function listToTable(list){
  let table = document.createElement('table');
  let row = table.createTHead().insertRow();
  for (let x of Object.keys(list[0]))
    row.insertCell().textContent = x;
  let body = table.createTBody();
  for (let line of list){
    let row = body.insertRow();
    for (let x of Object.values(line))
      row.insertCell().textContent = x;
  }
  return table;
}
