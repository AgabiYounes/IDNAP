
// Initialisation de la temporisation
temp = 0;
jQuery(function(){
// Boucle de décrémentation
// 10 représente le temps en secondes
    for (i=10 ;i > -1;i--){
        setTimeout("jQuery('#affichage').text('"+i+"');",temp);
        temp+=1000;
    }
});

jQuery(document).ready(function(){
    setTimeout(temp - 1000);
});

function resetForm($form) {
    $form.find('input:text, input:file, select, textarea').val('');
    document.getElementById("sam").checked = false;
    document.getElementById("dim").checked = false;
    document.getElementById("email").value="";

}
function verifierMatricule(event) {

	var keyCode = event.which ? event.which : event.keyCode;
	var touche = String.fromCharCode(keyCode);

	var champ = document.getElementById('mon_input');

	var caracteres = '0123456789';

	if(caracteres.indexOf(touche) >= 0) {
		champ.value += touche;
	}

}
function verifierCaracteres(event) {

	var keyCode = event.which ? event.which : event.keyCode;
	var touche = String.fromCharCode(keyCode);

	var champ = document.getElementById('mon_input');

	var caracteres = "abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";

	if(caracteres.indexOf(touche) >= 0) {
		champ.value += touche;
	}

}

/***************************************************************************************************/
$(function()
{
  $("#partie2").hide();
  $("#partie3").hide();
  $("#partieresultats").hide();
  $(".stats").hide();

/**************************************************************Voter**********************************************************************/

  $("#voter").click(function(){
    $("#logo").animate({height:'150px',width:'250px'},900);
    $("#partie1").slideUp(500,function(){
      $("#partie2").show(500);
        });
      });

/********************************************************Retour****************************************************************************/

$("#retour_form").click(function(){
  $("#logo").animate({height:'338px',width:'600px'},900);
  $("#partie2").hide(500,function(){
    $("#partie1").show(500);


    resetForm($('#formulaire'));

  });
});

/********************************************************A Propos****************************************************************************/

  $("#apropos").click(function(){
    $("#logo").animate({height:'95px',width:'200px'},800);
    $("#partie1").fadeOut(400,function(){
      $("#partie3").fadeIn("slow");
    });
  });


/********************************************************Retour A Propos****************************************************************************/
$("#retour_aporpos").click(function(){
  $("#logo").animate({height:'338px',width:'600px'},900);
  $("#partie3").fadeOut(400,function(){
    $("#partie1").fadeIn("slow");
  });
});

/********************************************************Resultats****************************************************************************/
$("#resultats").click(function(){
  $("#logo").animate({height:'80px',width:'150px'},900);
  $("#partie1").fadeOut(400,function()
{
  $("#partieresultats").fadeIn("slow");
});
});

/********************************************************Retour Resultats****************************************************************************/

$("#retour_resultats").click(function(){
  $("#logo").animate({height:'338px',width:'600px'},900);
  $("#partieresultats").fadeOut(400,function(){
    $("#partie1").fadeIn("slow");
    alert("hi");

  });
});
/***************************************************************************************************************************************************/
$("#bouton-stats").click(function(){
  $("#resultat-titre").toggle();
  $("#barresearch").toggle();
  $("#tabmasc").toggle();
  $("#partiestats").toggle();
});






});
