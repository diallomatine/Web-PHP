window.addEventListener('load', activeAjour);

function activeAjour(ev){
  ev.preventDefault();
  document.forms.formAjour.addEventListener('submit', mettreAjour)

}
 function mettreAjour(ev){
   ev.preventDefault();
   let url='services/updateProfil.php';
   let options = {method : 'post', body: new FormData(this),credentials:'same-origin'}
   fetchFromJson(url, options)
   .then(processAnswer)
   .then(traiteInfoAjour)
 }
function traiteInfoAjour(list){
  document.getElementById('connected').hidden =true;
  document.getElementById('update').hidden=true;
  // document.querySelector
  let ajour = document.getElementById('miseAjour');
  var res ="<h4>Les informations ont été bien enregistrer </h4>";
  res += '<a href=\"profil.php\">Cliquez ici pour voir les modifications</a>'
  ajour.innerHTML = res;
}
