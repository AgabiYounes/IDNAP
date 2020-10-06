<?php
require('session.php');
require('Model/Model.php');
$info='';
if (isset($_POST['newpassword']) && isset($_POST['oldpasseword']))
{
  $new=sha1(htmlspecialchars($_POST['newpassword']));
  $old=sha1(htmlspecialchars($_POST['oldpasseword']));
  $username=$_SESSION['superviseur'];
  $type='superviseur';
  $check=checkOldPass($username,$old,$type);
  if ($check==true)
  {
    changePassWord($new,$username);
    $info='<div class="alert alert-success text-center" role="alert">Votre mot de passe a était changé</div>';
  }
else
  {
    $info='<div class="alert alert-danger text-center" role="alert">Mot de passe incorrect</div>';
  }
}
require('View/changepwView.php');
