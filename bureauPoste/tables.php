<?php
require('session.php');
require('Model/Model.php');
$user=$_SESSION['bureauPoste'];
$password=getPassWord($user);
$UID=getUID($user, $password);
$codePostal=getCodePostal($UID);
$demandes=ListeDemande($codePostal);
require('View/tablesView.php');
