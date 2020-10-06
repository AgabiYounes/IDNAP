<?php
require('Model/Model.php');
    if( isset($_POST['wilaya']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['codepostal']) && isset($_POST['username']) && isset($_POST['type']) && isset($_POST['password']) )
    {
      $lastname=$_POST['lastname'];
      $firstname=$_POST['firstname'];
      $username=$_POST['username'];
      $password=sha1($_POST['password']);
      $type=$_POST['type'];
      $thispw=$_POST['thispw'];
      $wilaya=$_POST['wilaya'];
      $codePostal=$_POST['codepostal'];

      $req=AjouterCompte ($username, $lastname, $firstname, $type, $password, $wilaya, $codePostal);

    }
    header('location:accountmanage.php');
