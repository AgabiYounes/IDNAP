<? 
require("modele.php");
require("session.php");

$mail=$_SESSION['client'];
setcookie('email',$mail,time()+50,'/','',false,true);

$key=makeKey();
setKey($mail,$key);
MailChangePw($mail,$key);

header('location: CodeConfirmationPw.php');