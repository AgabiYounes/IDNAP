<?php
require('session.php');
require('Model/Model.php');
$VarAffiche=false;
if(isset($_POST['region']) && isset($_POST['sexe']) && isset($_POST['age']) && isset($_POST['typepersonne']) && isset($_POST['typenotification']) && isset($_POST['message']) )
{

 $age=$_POST['age'];
 if ($age=="tous") {
   $ageMin=18;
   $ageMax=100;
 }
 elseif ($age=="jeune") {
   $ageMin=18;
   $ageMax=30;
 }
 elseif ($age=="adulte") {
   $ageMin=31;
   $ageMax=50;
 }
 elseif ($age=="vieu") {
   $ageMin=51;
   $ageMax=100;
 }
 $region=$_POST['region'];
 $sexe=$_POST['sexe'];
 $user=$_SESSION['admin'];
 $password=getPassWord($user);
 $uid=getUID($user,$password);
 $typepersonne=$_POST['typepersonne'];
 $typenotification=$_POST['typenotification'];
 $message=utf8_decode($_POST['message']);
 $date=date("Y-m-d");
$a=NULL;
$b=NULL;


 if ($typepersonne=='entreprise') {
   if ($region=='toutes') {
     $indiceIDW=0;
     $b=entreprise($indiceIDW);
   }
   else {
     $b=entreprise($region);
   }
 }
elseif ($typepersonne=='personne') {
  if ($region=='toutes') {
    $indiceIDW=0;
    $a=personne($ageMin, $ageMax,$sexe, $indiceIDW);
  }
  else {
    $a=personne($ageMin, $ageMax,$sexe, $region);
  }
}
elseif ($typepersonne=='p&e') {
  if ($region=='toutes') {
    $indiceIDW=0;
    $a=personne($ageMin, $ageMax,$sexe, $indiceIDW);
    $b=entreprise($indiceIDW);
  }
  else {
    $a=personne($ageMin, $ageMax,$sexe, $region);
    $b=entreprise($region);
  }
}
$var=AjouterNotificationAdmin($region, $sexe, $ageMin, $ageMax,$uid, $typepersonne,$typenotification, $message, $date);
$NID=getNID($typenotification,$date,$uid);
if ($a!=NULL) {
  while ($donnee= $a->fetch())
  { if ($donnee['IDPostal']!=NULL) {
    $x=AjouterLigneNotification($NID,$donnee['IDPostal']);
  }
  }
}
if ($b!=NULL) {
  while ($donnee= $b->fetch())
  {
    if ($donnee['IDPostal']!=NULL) {
      $x=AjouterLigneNotification($NID,$donnee['IDPostal']);
    }
  }
}





 $VarAffiche=true;
}

require('View/notifyView.php');
