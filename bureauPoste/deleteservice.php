<?php
require('session.php');
require('Model/Model.php');
    if( isset($_POST['uid']))
    {
      $uid=$_POST['uid'];
      $x=SupprimerService($uid);
    }
    header('location:services.php');

?>
