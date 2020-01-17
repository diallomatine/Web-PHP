window.addEventListener('load', initProfil)
var identifiant;
function initProfil(){
  identifiant = window.location.search.split('=')[1];
  let url ='services/findUtilisateur.php?psoeudo=' + identifiant
  fetchFromJson(url)
  .then(processAnswer)
  .then(afficheInfoProfil, displayErrorProfil);
}

function processAnswer(answer){
 if (answer.status == "ok") {
   return answer.result;
 }
 throw new Error(answer.message);
}

function afficheInfoProfil(list){
  let res = listToTable(list)
  document.getElementById('profil').appendChild(res);
}
function displayErrorProfil(error){
  alert(error)
  document.getElementById('connecte').hidden = true;
  document.getElementById('deconnecte').hidden = false;
}
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
