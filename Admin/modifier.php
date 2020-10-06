<?php
require('Model/Model.php');
    if( isset($_POST['UID']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['username']) && isset($_POST['type']) && isset($_POST['password']))
    {
      $uid=$_POST['UID'];
      $lastname=$_POST['lastname'];
      $firstname=$_POST['firstname'];
      $username=$_POST['username'];
      $password=sha1($_POST['password']);
      $type=$_POST['type'];
      $thispw=$_POST['thispw'];

        $req=ModifierCompte( $uid, $username, $type,$lastname, $firstname, $password);


    }
    header('location:accountmanage.php');

?>
