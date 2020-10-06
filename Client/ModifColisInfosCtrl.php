<?php
require('modele.php');
require('session.php');
$success="";
if (  isset($_POST['dateRecep']) AND isset($_POST['idadr']) AND isset($_POST['idColis'])){

/*********** reccuperer les contenus des champs saisis du formulaire d'inscriptipn ***********/
$idnap=getIdnap($_SESSION['client']);
	$dateRecep=$_POST['dateRecep'];
    $idadr=$_POST['idadr'];
    $idColis=$_POST['idColis'];
    echo $dateRecep.$idadr.$idColis;
	updateColis($idColis,$dateRecep,$idadr);


$success= "<div class='alert alert-success'>
  <strong>Success!</strong> L'adresse d'arrivée de votre colis a bien était modifier
</div>";
	
	setcookie('success_modificationColis',$success,time()+10,'/','',false,true);

  header('location: accueilClient.php');
}

require('ModifColisInfos.php');

