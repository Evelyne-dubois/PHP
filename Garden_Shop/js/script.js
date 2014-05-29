// Général

//connexion popup
$('.open-popup-link').magnificPopup({
          type:'inline',
          midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
        });

//Home
// Au chargement de la page
$( document ).ready(function() {
  // Si JS actif on cache la météo
    $("#meteo #next-days").removeClass("show").addClass("hide");
});

// Déroule la météo
$( "#meteo #today" ).on( "click", function() {
  if( $("#meteo #next-days").hasClass("hide")){
    $("#meteo #next-days").removeClass("hide").addClass("show");
  }else{
    $("#meteo #next-days").removeClass("show").addClass("hide");
  }
});

$( "#meteo #reduce" ).on( "click", function() {
$("#meteo #next-days").removeClass("show").addClass("hide");
});


// Page Acheter
//Gmap
$( "#gmap-shop_1" ).on( "click", function() {

  if( $("#gmapselected-shop_1").hasClass("hide")){

    $("#gmapselected-shop_2").addClass("hide");
    $("#gmapselected-shop_2").removeClass("show");
    // $('#gmap-shop_2').css("background", "url('../images/gmap/gmap-shop_2.png') no-repeat");

    $("#gmapselected-shop_1").addClass("show");
    $("#gmapselected-shop_1").removeClass("hide");
    // $('#gmap-shop_1').css("background", "url('../images/gmap/gmap-shop_1_hover.png') no-repeat");

  }else{
    $("#gmapselected-shop_1").addClass("hide");
    $("#gmapselected-shop_1").removeClass("show");
    // $('#gmap-shop_1').css("background", "url('../images/gmap/gmap-shop_1.png') no-repeat");
  }
});

$( "#gmap-shop_2" ).on( "click", function() {

  if( $("#gmapselected-shop_2").hasClass("hide")){

    $("#gmapselected-shop_1").addClass("hide");
    $("#gmapselected-shop_1").removeClass("show");

    $("#gmapselected-shop_2").addClass("show");
    $("#gmapselected-shop_2").removeClass("hide");

  }else{
    $("#gmapselected-shop_2").addClass("hide");
    $("#gmapselected-shop_2").removeClass("show");
  }
});


// Page Vendre    
// Au chargement de la page
$( document ).ready(function() {
	// Si JS actif on cache les horaire de cueillette, on les affiches plus tard 'si js pas activé'
    $("#modalite-cueillette").removeClass("show").addClass("hide");
});

// affiche ou non les horaire de cueillette
$( "#q-cueillette-ouverte input" ).on( "click", function() {

	if( $("#q-cueillette-ouverte input#oui").is(':checked') ){
   		$("#modalite-cueillette").removeClass("hide").addClass("show");
		} else {
    	$("#modalite-cueillette").removeClass("show").addClass("hide");
	}
});

//Auto-complete de l'adresse
function auto_complete(){

  var adresse_saved = document.getElementById('adresse_selected').value;

  if(adresse_saved == 'adresse_1'){

    document.getElementById('auto_numero').value = adresse_numero;
    document.getElementById('auto_rue').value = adresse_rue;
    document.getElementById('auto_cp').value = adresse_cp;
    document.getElementById('auto_ville').value = adresse_ville;

  }else{
    if(adresse_saved == 'adresse_2'){

      document.getElementById('auto_numero').value = adresse_numero_2;
      document.getElementById('auto_rue').value = adresse_rue_2;
      document.getElementById('auto_cp').value = adresse_cp_2;
      document.getElementById('auto_ville').value = adresse_ville_2;

    }else{
      document.getElementById('auto_numero').value = '';
      document.getElementById('auto_rue').value = '';
      document.getElementById('auto_cp').value = '';
      document.getElementById('auto_ville').value = '';
    }
  }
};


//Page inscrire cueillette
recoltes = "";
//ajoute la valeur de l'input/text dans la liste
function add_checklist(e){
    // window.location.hash="checklist-page";
    var add_recolte = document.getElementById("add_recolte").value;
    if(add_recolte != ''){

      var add_recolte =  "<li>"+add_recolte+"</li>";
      recoltes += add_recolte;
      document.getElementById('recoltes-disponnible').innerHTML = recoltes;
      document.getElementById("add_recolte").value = "";

    }
}

//magasin
//favoris
$( "#action .button-more" ).on( "click", function() {

  if( $("#action .button-more").hasClass("checked")){
    $("#action .button-more").removeClass("checked");
    document.getElementById("fav-button").innerHTML="Ajouter au favoris";
    // event.preventDefault();
  }else{
    $("#action .button-more").addClass("checked");
    document.getElementById("fav-button").innerHTML="Retirer des favoris";
    // event.preventDefault();
  }
  return false;
  // event.preventDefault();
});

//Vote
var done=false
var pic = new Array();
pic[0]=new Image();
pic[0].src="images/star_0.png";
pic[1]=new Image();
pic[1].src="images/star_1.png";
// var bareme = new Array("peu ","passablement ","moyennement","presque","") 
 
 function rate(level){
 if (done){return false;}
  for(i=1;i<6;i++){ document.getElementById('_'+i).src=(level<i)?pic[0].src:pic[1].src;
  // document.getElementById('vote').innerHTML="Votre vote : "+level+" étoile(s)   "+bareme[level-1]+" satisfaisant" 
  }
  }
 
 function zero(){
     for(i=1;i<6;i++){ document.getElementById('_'+i).src=pic[0].src;
     done=false;
     // document.getElementById('vote').innerHTML="Votre vote : 0 étoile(s)" ;
 
     }
     }
 function valider(){
 done=true;
 // document.getElementById('vote').innerHTML+='   VALID&Eacute;'
 }




