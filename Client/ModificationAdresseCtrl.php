<?php
require('modele.php');
require("session.php");

if (isset($_POST['address']) AND isset($_POST['Commune']) AND isset($_POST['streetNumber']) AND isset($_POST['wilaya']) ){
	$address=$_POST['address'];
    $Numero=$_POST['streetNumber'];
    $wilaya=$_POST['wilaya'];
	$CodePostal=$_POST['Commune'];
	
	$email=$_SESSION['client'];
	$idnap=getIdnap($email);

	updateAdr($idnap,$address,$Numero,$wilaya,$CodePostal);

	$success= "<div class='alert alert-success' style:'height=10px;'>
  	Vous avez bien modifier votre adresse.</div>";
	setcookie('success-modification',$success,time()+50,'/','',false,true);
	header('location: accueilClient.php');

}
require('ModificationAdresse.php');