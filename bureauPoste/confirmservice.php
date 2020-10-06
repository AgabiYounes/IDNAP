<?php
require('session.php');
require('Model/Model.php');
    if( isset($_POST['uid']))
    {
      $sid=$_POST['uid'];
      $x=ConfirmService($sid);
      $user=$_SESSION['bureauPoste'];
      $pass=getPassWord($user);
      $uid=getUID($user, $pass);
      NotifierService($sid, $uid);
    }
    header('location:services.php');

?>
