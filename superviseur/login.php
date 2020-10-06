
<?php
require('Model/Model.php');
$info='';
if (isset($_POST['username']) AND isset($_POST['password']))
{
  if (!empty(htmlspecialchars($_POST['username'])) AND !empty(htmlspecialchars($_POST['password'])))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password=sha1($password);
    $type='superviseur';
    $check=login($username,$password,$type);
      if ($check) {
        session_start ();
        $_SESSION['superviseur']=$_POST['username'];
        header('location:index.php');
      }
      else {
        $info= '<div class="alert alert-danger text-center" role="alert">Identifiant ou mot de passe incorrect</div>';
      }
  }
}

require('View/loginView.php');
