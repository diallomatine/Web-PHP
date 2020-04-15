window.addEventListener('load',makeServiceEtPrix)

function makeServiceEtPrix(ev){
  ev.preventDefault();
  // alert(idStation)
  if (idStation == null) {
    idStation = window.location.search.split('=')[1];
  }
  let url ='http://webtp.fil.univ-lille1.fr/~clerbout/carburant/infoStation.php?id='+idStation;
  fetchFromJson(url)
  .then(processStations)
  .then(servicesetprix, displayError);
}

function servicesetprix(list){
  var services = document.getElementById('services');
  var res = "<h5>Services :</h5>";
  for (var i = 0; i < list.services.length; i++) {
    res += list.services[i] +"<br />"
  }
  if (list.services.length == 0) {
    res += "<mark>Seulement la vente de carbutants</mark>";
  }
  services.innerHTML =  res;

  var prix = document.getElementById('prix')
  res = "<br /><h5>Les prix :</h5>"
  for (var i = 0; i < list.prix.length; i++) {
    res += list.prix[i].libellecarburant + " -- "+ list.prix[i].valeur + "€ <br />"
  }
  prix.innerHTML = res;
}
