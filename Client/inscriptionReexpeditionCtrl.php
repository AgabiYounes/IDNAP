<?php
require('modele.php');
require('session.php');

$success="";
$idnap=getIdnap($_SESSION['client']);
$type="reexpedition";
$check=checkIfAlreadyExisting($idnap,$type);

if($check>0){
		$getDateFin=getDateFin($idnap,$type);
	require('DejaInscrit.php');
}

else{
if ( isset($_POST['dateFin']) AND isset($_POST['ccp']) AND isset($_POST['bp']) ){

/*********** reccuperer les comtenus des champs saisis du formulaire d'inscriptipn ***********/

    $dateFin=$_POST['dateFin'];
    $ccp=$_POST['ccp'];
    $bp=$_POST['bp'];
   	$Commune=getNameForCommune($bp);
   	$dateDebut=	date('Y-m-d');


	insererReexpedition($idnap,$dateDebut,$dateFin,$Commune);
	updateCcp($idnap,$ccp);


$success= "<div class='alert alert-success'>
  Votre demande a était bien  transmise. Une confirmation vous sera envoyée sur votre messagerie dans les meilleurs délais.
</div>";

setcookie('success-inscriptionService',$success,time()+50,'/','',false,true);
header('location: accueilClient.php');

}

require('inscriptionReexpedition.php');

}

