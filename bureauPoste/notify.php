<?php
require('session.php');
require('Model/Model.php');
$VarAffiche="false";
if(isset($_POST["idclient"]) && isset($_POST["type"]) && isset($_POST["message"]))
{ $idpostal=htmlspecialchars($_POST["idclient"]);
  $typenotification= htmlspecialchars($_POST["type"]);
  $message=utf8_decode(htmlspecialchars($_POST["message"]));
  $date=date("Y-m-d");
  $user=$_SESSION['bureauPoste'];
  $password=getPassWord($user);
  $UID=getUID($user, $password);
  $var=CheckIDPostal($idpostal);
  $codePostal=getCodePostal($UID);
  $Droit=CheckDroit($idpostal,$codePostal);
  if ($var && $Droit)
  {
    $req=AjouterNotificationBureau ($message, $date, $typenotification, $idpostal, $UID);
    $VarAffiche="true";
  }
  else {
    if ($Droit) {
      if (!$var) {
        $VarAffiche="errorIDPostal";
      }
    }
    elseif (!$Droit) {
      $VarAffiche="errorDroit";
    }

  }

}
require('View/notifyView.php');
