<?php
require('session.php');
require('Model/Model.php');
$VarAffiche=false;
if(isset($_POST['sexe']) && isset($_POST['age']) && isset($_POST['typepersonne']) && isset($_POST['typenotification']) && isset($_POST['message']) )
{
 $sexe=$_POST['sexe'];
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
 $user=$_SESSION['superviseur'];
 $password=getPassWord($user);
 $uid=getUID($user,$password);
 $region=getIDW($uid);
 $typepersonne=$_POST['typepersonne'];
 $typenotification=$_POST['typenotification'];
 $message=utf8_decode($_POST['message']);
 $date=date("Y-m-d");

 $req=AjouterNotificationSuperviseur($region, $sexe, $ageMin, $ageMax,$uid, $typepersonne,$typenotification, $message, $date);
 $NID=getNID($typenotification,$date,$uid);




 if ($typepersonne=='entreprise') {

     $b=entreprise($region);

 }
 elseif ($typepersonne=='personne') {
     $a=personne($ageMin, $ageMax,$sexe, $region);
 }

 elseif ($typepersonne=='p&e') {
     $a=personne($ageMin, $ageMax,$sexe, $region);
     $b=entreprise($region);
 }

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
