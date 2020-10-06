<?php
require('modele.php');

if(isset($_POST['email'])){
$mail=$_POST['email'];
$key=makeKey();
setKey($mail,$key);
MailChangePw($mail,$key);
setcookie('email',$mail,time()+50,'/','',false,true);

header('location: CodeConfirmationPw.php');
}

require('mdpOub.php');

