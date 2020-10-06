<?php
require('session.php');
require('Model/Model.php');
$user=$_SESSION['superviseur'];
$DemandeNonConfirm=DemandeNonConfirm($user);
$DemandeConfirm=DemandeConfirm($user);
$NbrTotalInscription=DemandeTotal($user);
$Reexpedition=Reexpedition($user);
$PosteRestante=PosteRestante($user);
$GardeCourrier=GardeCourrier($user);
$password=getPassWord($user);
$UID=getUID($user, $password);
$idw=getIDW($UID);
$wilaya=getWilaya($idw);
require('View/indexView.php');
