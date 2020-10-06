<?php
require('modele.php');
$info='';
if (isset($_POST['email']) AND isset($_POST['mdp']))
{

  if (!empty(htmlspecialchars($_POST['email'])) AND !empty(htmlspecialchars($_POST['mdp'])))
  {

    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $mdp=sha1($mdp);

    $check=login($email,$mdp);
    $idnap=getIdnap($email);

    if($check){  

      session_start ();
      $_SESSION['client']=$email;

      $check1=checkEtatConfirmationMail($idnap);
      $check2=checkEtatConfirmation($idnap);

      echo $check1.$check2;

      if($check1!=1){

        setcookie('idnap',$idnap,0,'/','',false,true); 
        header('location: VerifierCle.php');

      }else if($check2!=1){
        header('location: VerifDemande.php');
      }
      else{
        $_SESSION['client']=$email;
        header('location: accueilClient.php');
      }

    }

  }

}

require('login.php');
