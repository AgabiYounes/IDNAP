<?
require('modele.php');

if(isset($_POST['password']) and isset($_POST['passwordrep']) ){

	$p1=$_POST['password'];
	$p2=$_POST['passwordrep'];

	if(($p1=$p2)){
	$email=$_COOKIE['email'];
	$idnap=getIdnap($email);
	$newpass=sha1(htmlspecialchars($_POST['password']));


	updatePassword($idnap,$newpass);

	$success= "<div class='alert alert-success' style:'height=10px;'>
  	Vous avez bien modifier votre mot de passe.</div>";
	setcookie('success-modification',$success,time()+50,'/','',false,true);
	header('location: accueilClient.php');
}else{
	echo "no";
	$error= "<div class='alert alert-danger' style:'height=10px;'>
  	vos mots de passes ne sont pas identiques.</div>";
	setcookie('error',$error,time()+50,'/','',false,true);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nouveau mot de passe | IDN Algérie Poste</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
     <script src='https://www.google.com/recaptcha/api.js'></script>



</head>
<body>
<? if(isset($_COOKIE['error'])){
  echo $_COOKIE['error'];
  unset($_COOKIE['error']);}
  ?>
	<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>

					<img src="images/img-01.png" alt="IMG">
				</div>

				<form  action="#" method="POST" class="login100-form validate-form">
					<span class="login100-form-title2 titrecnf">
						Entrez le nouveau Mot De Passe
					</span>

								<div class="form-group">
													
												<label>Mot de passe <small>(obligatoire)</small></label>
												<input name="password" type="password" class="form-control" placeholder="********" id="form_password" minlength="8" required>
												<span class="error_form" id="password_error_message"></span>
											</div>
											<div class="form-group">
												
												<label>Répétez le Mot de passe <small>(obligatoire)</small></label>
												<input name="passwordrep" type="password" class="form-control" placeholder="********" id="form_retype_password" minlength="8" required>
												<span class="error_form" id="retype_password_error_message"></span>
											</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Confirmer
						</button>
					</div>
					<div class="text-center p-t-136">
						<!-- CONDITION IF LOGGED IN OR NOT ***************************** -->
						<a class="txt2" href="accueilClient.php">
							Acceuil
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
