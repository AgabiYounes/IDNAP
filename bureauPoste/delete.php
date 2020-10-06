<?php
require('Model/Model.php');
    if( isset($_POST['uid']))
    {
      $uid=$_POST['uid'];
      $x=SupprimerCompte($uid);
    }
    header('location:tables.php');

?>
