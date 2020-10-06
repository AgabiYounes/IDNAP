<?php
require('modele.php');
if (  isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['email'])
  AND isset($_POST['password']) AND isset($_POST['passwordrep']) AND isset($_POST['date_naissance']) AND isset($_POST['lieu_naissance'])
 AND isset($_POST['mobile_number']) AND isset($_POST['sexe']) AND isset($_POST['type']) AND isset($_POST['ncib'])
 AND isset($_POST['address']) AND isset($_POST['Commune']) AND isset($_POST['streetNumber']) AND isset($_POST['wilaya']) ){

/*********** reccuperer les comtenus des champs saisis du formulaire d'inscriptipn ***********/

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=sha1(htmlspecialchars($_POST['password']));
    $date_naissance=$_POST['date_naissance'];
    $lieu_naissance=$_POST['lieu_naissance'];
    $sexe=$_POST['sexe'];
    $type=$_POST['type'];
    $mobile_number=$_POST['mobile_number'];
    $ccp=$_POST['ccp'];
    $ncib=$_POST['ncib'];
    $address=utf8_decode($_POST['address']);
    $Numero=$_POST['streetNumber'];
    $wilaya=$_POST['wilaya'];
    $CodePostal=$_POST['Commune'];
    $etat=0;

$checkmail=checkIfMailAlreadyExisting($email);
if($checkmail>0){
  header('location: loginCtrl.php');
$error= "<div class='alert alert-info' style:'height=10px;'>
  Un client s'est déjà inscrit en utilisant l'email que vous venez d'introduire, vous pouvez vous connectez.<br>Si vous avez oublié votre mot de passe, cliquez en bas sur Mot de passe oublié ! </div>";
setcookie('error',$error,time()+50,'/','',false,true);  
exit();

}

$checkNcib=checkIfIDNAlreadyExisting($ncib);
if($checkNcib>0){
  header('location: loginCtrl.php');
$error= "<div class='alert alert-info' style:'height=10px;'>
  Un client s'est déjà inscrit en utilisant le numero d'identité numérique que vous venez d'introduire.</div>";
setcookie('error',$error,time()+50,'/','',false,true);
  exit();
}


$DateInscription = date('Y-m-d');


$wilayaN=getWilayaNamefromIdw($wilaya);
$lieuNaissName=getWilayaNamefromIdw($lieu_naissance);
$Commune=getNameForCommune($CodePostal);


$existAdr=existingAdr($address,$Numero,$Commune,$wilayaN,$CodePostal);

if( $existAdr<1){
inserer_Adresse($address,$CodePostal,$Numero,$wilayaN,$CodePostal);}

//On reccupere le IDAdre
$idadr=getIDAdr($address,$Commune,$wilayaN,$CodePostal,$Numero);

  /*********** Codifier un ID Postal unique pour le client ***********/

$cle=makeKey();

$IDPostal=getIdfor($date_naissance,$sexe,$lieu_naissance,$type);

insertClientInfos($IDPostal,
$lastname,
$firstname,
$email,
$password,
$DateInscription,
$date_naissance,
$lieuNaissName,
$sexe,
$mobile_number,
$ccp,
$ncib,
$type,
$cle,$CodePostal);


insertInfoHabitat($idadr,$IDPostal,$DateInscription);

$success= "<div class='alert alert-success' style:'height=10px;'>
  Votre demande a était bien  transmise. Une clé de confirmation vous sera envoyée dans les meilleurs delais ! Vous pouvez vous connectez maintenant.</div>";
setcookie('success_registration',$success,time()+50,'/','',false,true);

LastSendMail($email,$cle);

 header('location: index.php');


}

require('Registration.php');
?>


