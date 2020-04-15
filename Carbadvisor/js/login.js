window.addEventListener('load', setup);
 function setup(){
   document.getElementById('deconnexion').addEventListener('click', initLoging)
 }
function initLoging(ev){
  ev.preventDefault();
  let url = 'services/logout.php'
  let options = {credentials: 'same-origin'}
  fetchFromJson(url, options)
  .then(processAnswer).then(deconnecte)
}
function processAnswer(answer){
 if (answer.status == "ok") {
   return answer.result;
 }
 throw new Error(answer.message);
}
function deconnecte(list){
  document.getElementById('deconnexion').hidden=true;
  document.getElementById('deconnecte').hidden = false;
  document.getElementById('connecte').hidden = true;
}
