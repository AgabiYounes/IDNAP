<?php 
require('modele.php');
require('session.php');

if(isset($_POST["cleconfirmee"]))
	{	
		if(isset($_COOKIE['idnap'])){
			$idnap=$_COOKIE['idnap'];
			unset($_COOKIE['idnap']);
		}
		$cleconfirmee=$_POST["cleconfirmee"];
		$check1=checkCleConf($idnap,$cleconfirmee);
		if($check1){ 
			setStateCleConf($idnap);
		    $check2=checkEtatConfirmation($idnap);
			if($check2!=1){
        header('location: VerifDemande.php');
		}else{
			    $_SESSION['client']=$email;
        		header('location: accueilClient.php');
		}
			
		}
	}

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<script src="js/jquery.validate.min.js" type="text/javascript"></script>

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
     <script src='https://www.google.com/recaptcha/api.js'></script>
	<title>Verification de la clé | IDN Algérie Poste</title>



</head>
<body>

	<div class="limiter">
		<div class="container-login100">

			<div class="lol">
				<div class="login100-pic js-tilt" data-tilt>

					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="#" method="POST">
					<form action='#' method='POST'>
					<span class="info">
						Vous devez d'abord introduire votre clé de confirmation reçue sur voitre boite e-mail ! 
					</span>
					<input type='text' name='cleconfirmee' size='50' class="form-control" required>
<div class="container-login100-form-btn">
            <input type="submit" value="Envoyer" class="login100-form-btn" id="submit-login">
					</div>
					</from>
					<div class="text-center p-t-136">
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
