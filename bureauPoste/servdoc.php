<?php
require('session.php');
require('Model/Model.php');
if (isset($_POST['idservice'])) {

  $idservice=$_POST['idservice'];
  $req=getService($idservice);
  while ($data=$req->fetch()) {
    $idpostal=$data['IDPostal'];
    $type=$data['type'];
    $dateinscription=$data['DateInscription'];
    $dateFin=$data['DateFin'];
    $Nom=$data['Nom'];
    $Prenom=$data['Prenom'];
    $NomEntreprise=$data['NomEntreprise'];
    $NouvelleAdresse=$data['NouvelleAdresse'];
    $CodePostal=$data['CodePostal'];
    $Email=$data['Email'];
      $CCP=$data['CCP'];
    $telephone_formate = preg_replace('#(\d{2})#', '$1 ',$data['NumTel']);
    $NumTel='+213 '.$telephone_formate;
    $bureau=$data['NomBureau'];
  }
$date=date("d-m-Y");
$myContent = file_get_contents("inscription service.xml");
$myContent = str_replace("@DATE@",$date,$myContent);
$myContent = str_replace("@ID@",$idpostal,$myContent);
if ($type=='gardecourrier') {
  $myContent = str_replace("@TYPE@","Garde des courriers",$myContent);
}
elseif ($type=='posterestante') {
  $myContent = str_replace("@TYPE@","La poste restante",$myContent);
}
elseif ($type=='reexpedition') {
  $myContent = str_replace("@TYPE@","Reexpedition des courriers",$myContent);
}

$myContent = str_replace("@DD@",$dateinscription,$myContent);
$myContent = str_replace("@DF@",$dateFin,$myContent);
if ($Nom!=NULL) {
  $myContent = str_replace("@NOMCLIENT@",$Nom,$myContent);
}
else {
  $myContent = str_replace("@NOMCLIENT@",' /',$myContent);
}
if ($Prenom!=NULL) {
  $myContent = str_replace("@PRENOMCLIENT@",$Prenom,$myContent);
}
else {
  $myContent = str_replace("@PRENOMCLIENT@",' /',$myContent);
}
if ($NomEntreprise!=NULL) {
  $myContent = str_replace("@NOMENTREPRISE@",$NomEntreprise,$myContent);
}
else {
$myContent = str_replace("@NOMENTREPRISE@",' /',$myContent);
}
if ($NouvelleAdresse!=NULL) {
  $myContent = str_replace("@AE@",$NouvelleAdresse,$myContent);
}
else {
$myContent = str_replace("@AE@",' /',$myContent);
}
if ($CCP!=NULL) {
$myContent = str_replace("@CCP@",$CCP,$myContent);
}
else {
$myContent = str_replace("@CCP@",' /',$myContent);
}
$myContent = str_replace("@CP@",$CodePostal,$myContent);
$myContent = str_replace("@EMAIL@",$Email,$myContent);

$myContent = str_replace("@TEL@",$NumTel,$myContent);
$myContent = str_replace("@BP@",$bureau,$myContent);
$fileN=$type.$idpostal.'.doc';
if (file_exists($fileN)) {
  $fileName=$type.$idpostal.' '.date('d-m-Y-i-s').'.doc';
}
else {
  $fileName=$fileN;
}
$fileName=str_replace(' ','',$fileName);
$newFileHandler = fopen($fileName,"a");
fwrite($newFileHandler,$myContent);
fclose($newFileHandler);
telecharger($fileName);
}

 ?>
