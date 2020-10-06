<?php
require('session.php');
require('Model/Model.php');
$user=$_SESSION['bureauPoste'];
$password=getPassWord($user);
$UID=getUID($user, $password);
$codePostal=getCodePostal($UID);
$DemandeNonConfirm=DemandeNonConfirm($codePostal);
$DemandeConfirm=DemandeConfirm($codePostal);
$DemandeRefus=DemandeRefus($codePostal);
$StatPersonne=StatPersonne($codePostal);
$StatEntreprise=StatEntreprise($codePostal);
require('View/chartsView.php');
