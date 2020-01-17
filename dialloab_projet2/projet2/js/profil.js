window.addEventListener('load',initInfoProfil);
// window.addEventListener('load',initLog);

function initInfoProfil(){
  document.getElementById('miseAjour').addEventListener('click', update)
  var login = document.body.dataset.login;
  var psoeudo=login;
  if (psoeudo) {
    afficheInfoProfil(psoeudo);
  }
  var deconnexion = document.getElementById('deconnexion');
  deconnexion.addEventListener('click', deconnecte);
}

function update(){
  document.getElementById('connected').hidden = true;
  document.getElementById('update').hidden=false;
}

function deconnecte(){
  // alert('ok')
  let url ='services/logout.php';
  let options = {credentials:'same-origin'}
  fetchFromJson(url,options).then(processAnswer).then(afficheDeconnexion);
}

function afficheDeconnexion(list){
  // alert('ok')
  document.location.href="http://webtp.fil.univ-lille1.fr/~dialloab/projet2/carbadvisor.php";
}

function afficheInfoProfil(login){
  let url ='services/findUtilisateur.php?psoeudo='+ login;
  let options = {credentials:'same-origin'}
  fetchFromJson(url, options)
  .then(processAnswer)
  .then(placeInfoProfil, displayErrorProfil);
}
function processAnswer(answer){
 if (answer.status == "ok") {
   return answer.result;
 }
 throw new Error(answer.message);
}
function placeInfoProfil(list){
  var content = document.getElementById('connected');
  var res = listToTable(list);
  content.appendChild(res);
}

function displayErrorProfil(error) {
  // alert(error)
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
