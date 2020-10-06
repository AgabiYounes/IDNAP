<?php
require('modele.php');
require("session.php");

if (isset($_POST['address']) AND isset($_POST['Commune']) AND isset($_POST['streetNumber']) AND isset($_POST['wilaya']) ){
	$address=$_POST['address'];
    $Numero=$_POST['streetNumber'];
    $wilaya=$_POST['wilaya'];
	$CodePostal=$_POST['Commune'];
	$Commune=getCommuneFromCp($CodePostal);
	$email=$_SESSION['client'];
	$idnap=getIdnap($email);
	$wilayaN=getWilayaName($wilaya);

	$exist=existingAdr($address,$Numero,$Commune,$wilayaN,$CodePostal);
	if($exist==0){
	inserer_Adresse(utf8_decode($address),$Commune,$Numero,$wilayaN,$CodePostal);}

	$success= "<div class='alert alert-success' style:'height=10px;'>
  	Vous avez bien ajouté une adresse.</div>";
	setcookie('success-modification',$success,time()+50,'/','',false,true);
	header('location: ModifColisInfosCtrl.php');

}
require('ModificationAdresse.php');