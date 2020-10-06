<?php
require('session.php');
require('Model/Model.php');
if (isset($_POST['idpostal'])) {
  $idpostal=$_POST['idpostal'];
  $req=getClient($idpostal);
  while ($data=$req->fetch()) {
  $idpostal=$data['IDPostal'];
  $Nom=$data['Nom'];
  $Prenom=$data['Prenom'];
  $NomEntreprise=$data['NomEntreprise'];
  $Email=$data['Email'];
  $dateinscription=$data['DateInscription'];
  $DateNaissance=$data['DateNaissance'];
  $LieuNaissance=$data['LieuNaissance'];
  $Sexe=$data['Sexe'];
$telephone_formate = preg_replace('#(\d{2})#', '$1 ',$data['NumTel']);
  $NumTel='+213 '.$telephone_formate;
  $CCP=$data['CCP'];
  $NCIB=$data['NCIB'];
  $type=$data['Type'];
  $CodePostal=$data['CodePostal'];
  $Adresse=$data['numero'].', '.$data['adresse'].' '.$data['apc'].', '.$data['wilaya'];
  };
$myContent = file_get_contents("fiche d'information client.xml");

$date=date("d-m-Y");
$myContent = str_replace("@DATE@",$date,$myContent);
$myContent = str_replace("@ID@",$idpostal,$myContent);
$myContent = str_replace("@TYPE@",$type,$myContent);
$myContent = str_replace("@DATEINSCRIPTION@",$dateinscription,$myContent);
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
if ($DateNaissance!=NULL) {
  $myContent = str_replace("@DATENAISSANCE@",$DateNaissance,$myContent);
}
else {
  $myContent = str_replace("@DATENAISSANCE@",' /',$myContent);
}
if ($LieuNaissance!=NULL) {
  $myContent = str_replace("@LIEUNAISSANCE@",$LieuNaissance,$myContent);
}
else {
  $myContent = str_replace("@LIEUNAISSANCE@",' /',$myContent);
}
if ($Sexe!=NULL) {
  $myContent = str_replace("@SEXE@",$Sexe,$myContent);
}
else {
  $myContent = str_replace("@SEXE@",' /',$myContent);
}
if ($NCIB!=NULL) {
  $myContent = str_replace("@NCIB@",$NCIB,$myContent);
}
else {
  $myContent = str_replace("@NCIB@",' /',$myContent);
}
if ($CCP!=NULL) {
  $myContent = str_replace("@CCP@",$CCP,$myContent);
}
else {
  $myContent = str_replace("@CCP@",' /',$myContent);
}
$myContent = str_replace("@ADRESSE@",$Adresse,$myContent);
$myContent = str_replace("@CP@",$CodePostal,$myContent);
$myContent = str_replace("@EMAIL@",$Email,$myContent);
$myContent = str_replace("@TEL@",$NumTel,$myContent);
//On crée le fichier généré
$fileN=$idpostal.'.doc';
if (file_exists($fileN)) {
  $fileName=$idpostal.' '.date('d-m-Y-i-s').'.doc';
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
    header('location:tables.php'); ?>
