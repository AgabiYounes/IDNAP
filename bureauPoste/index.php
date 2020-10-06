<?php
require('session.php');
require('Model/Model.php');
$user=$_SESSION['bureauPoste'];
$password=getPassWord($user);
$UID=getUID($user, $password);
$codePostal=getCodePostal($UID);
$DemandeNonConfirm=DemandeNonConfirm($codePostal);
$DemandeConfirm=DemandeConfirm($codePostal);
$NbrTotalInscription=DemandeTotal($codePostal);
$Reexpedition=Reexpedition($codePostal);
$PosteRestante=PosteRestante($codePostal);
$GardeCourrier=GardeCourrier($codePostal);
require('View/indexView.php');
