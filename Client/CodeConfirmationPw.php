<?
require('modele.php');


$idnap=getIdnap($_COOKIE['email']);

if ( isset($_POST['Code'])){

	$code=$_POST['Code'];
	$realCode=getCode($idnap);

	if($realCode==$code){
	 header('location: nouvMdp.php');
	 }
}

?>
<html lang="en">
<head>
	<title>Modification du mot de passe | IDN Algérie Poste</title>
	<meta charset="UTF-8">
			<link rel="icon" type="image/png" href="images/icons/favicon.png"/>

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
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
     <script src='https://www.google.com/recaptcha/api.js'></script>



</head>
<body>

	<div class="limiter">
		<div class="container-login100">

			<div class="lol">
				<div class="login100-pic js-tilt" data-tilt>

					<img src="images/img-01.png" alt="IMG">
				</div>

				<form action="#" method="POST" class="login100-form validate-form">
					<span class="info">
						Comme procedure de sécurité, vous deverez entrer le code que vous receverez sur votre boite e-mail pour pouvoir poursuivre votre changement de mot de passe.
					</span>
					<br>
  <div class="form-group">
    <label for="exampleInputEmail1">Code :</label>
    <input type="text" name="Code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le code" required>
    <small id="emailHelp" class="form-text text-muted">Votre code est unique.</small>
  </div>

  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
					<div class="text-center p-t-136">
						<a class="txt2" href="accueilClient.php">
							Acceuil
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<!-- <a class="txt2" href="loginCtrl.php">
							Connexion
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> -->
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
