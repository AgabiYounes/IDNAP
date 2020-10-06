<?php
require('modele.php');
require('session.php');

$success="";
$idnap=getIdnap($_SESSION['client']);
$type="gardecourier";
$check=checkIfAlreadyExisting($idnap,$type);

if($check>0){
	
	$getDateFin=getDateFin($idnap,$type);
	require('DejaInscrit.php');
}
else{
 if ( isset($_POST['dateFin']) AND isset($_POST['ccp']) ){

/*********** reccuperer les comtenus des champs saisis du formulaire d'inscriptipn ***********/

	$dateDebut=	date('Y-m-d');

    $dateFin=$_POST['dateFin'];

    $ccp=$_POST['ccp'];

	inserGardeCourier($idnap,$dateDebut,$dateFin);
	updateCcp($idnap,$ccp);

$success= "<div class='alert alert-success'>
  Votre demande a était bien  transmise. Une confirmation vous sera envoyée sur votre messagerie dans les meilleurs délais.
</div>";

setcookie('success-inscriptionService',$success,time()+50,'/','',false,true);
header('location: accueilClient.php');

 }
	require('inscriptionGardeCourier.php');

}

