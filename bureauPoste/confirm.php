<?php
require('Model/Model.php');
    if( isset($_POST['uid']))
    {
      $uid=$_POST['uid'];
      $x=ConfirmCompte($uid);
    }
    header('location:tables.php');

?>
