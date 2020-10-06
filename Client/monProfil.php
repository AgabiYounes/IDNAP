<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
      <link rel="icon" type="image/png" href="images/icons/favicon.png"/>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <meta name="viewport" content="width=device-width">
    <link rel="icon" type="image/png" href="img/logo2.png" />
    <link href="css/animate.css" rel="stylesheet"/>
    <script src="js/wow.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/style-monProfil.css">
    <script type="text/javascript" src="js/script.js"></script>
    <title>Mon profil | IDN Algérie Poste</title>
  </head>
  <body id="IndexBody">
      <header>

        <div class="col-sm-12">
          <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="accueilClient.php"><img src="img/logo.png" id="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
  <li class="nav-item active">
    <a class="nav-link text-white hvr-wobble-vertical" id="link-home" href="accueilClient.php"> Accueil<span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white hvr-wobble-vertical" href="#">Messagerie</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white hvr-wobble-vertical" href="MesColis.php">Mes Colis</a>
  </li>
</ul>
<ul class="nav navbar-nav navbar-right">
  <li><a href="monProfilCtrl.php"><button class="btn btn-primary hvr-grow-shadow btn-inscribe" >Mon Profil</button></a></li>
    <form class="" action="logout.php" method="POST">
     <li><button type="submit" class="btn btn-secondary hvr-grow-shadow btn-login">Se déconnecter</button></a></li>
   </form>
</ul>
</div>
</nav>
        </div>
      </header>

      <body>
      	    <div class="container"> 
      	        <div class="row">
      		        <div class="col-sm-8 col-sm-offset-2 monprofil">
                    <div class="generalInfo">
      											<h5 class=""> Vos informations générales :</h5>
      											<div class="col-sm-12">
      												<div class="form-group">
      													<label>Prénom </label>
      													<input name="firstname" type="text" class="form-control" placeholder=<? echo $firstname; ?> readonly>
      												</div>
                              <div class="form-group">
                                <label>Nom d'entreprise</label>
                                <input name="epname" type="text" class="form-control" readonly placeholder=<? echo $epname; ?>   >
                              </div>
      												<div class="form-group">
      													<label>Nom </label>
      													<input name="lastname" type="text" class="form-control" readonly placeholder=<? echo $lastname; ?> >
      												</div>
      											</div>
      											<div class="col-sm-12">
      												<div class="form-group">
      													<label>Email</label>
      													<input name="email" type="email" class="form-control" readonly placeholder=<? echo $email; ?> >
      												</div>
      												<div class="form-group">
      												<label>Modifier votre mot de passe :</label>
      												<a href="generateCode.php"><input name="ModifAddr" type="button" class="form-control btn-info"   value="Modifier" > </a>
      											</div>
                          </div>
                    </div>
                                    <div class="personnal-info">
                                      <h5 class=""> Vos informations personnelles :</h5>
                                            <div class="form-group">
                    													<label>Votre Date de naissance</label>
                    													<input name="date-naissance" type="text" class="form-control" readonly placeholder=<? echo $dateNaissance; ?> >
                    												</div>
                    												<div class="form-group">
                    													<label>Votre lieu de naissance </label>
                    													<input name="lieu-naissance" type="text" class="form-control" readonly placeholder=<? echo $lieuNaissance; ?> >
                    												</div>
                    												
                    												<div class="form-group">
                    													<label>N° téléphone</label>
                    													<input name="mobile-number" type="number" class="form-control" readonly placeholder=<? echo $numTel; ?> min="10" max="10" >
                    												</div>
                    												<div class="form-group">
                    												<label>Votre Numéro de Compte CCP</label>
                    												<input name="ccp" type="number" class="form-control" readonly placeholder=<? echo $ccp; ?> >
                    											</div>
                                    </div>

                                          <div class="phy-add">

      		                                        <h5 class="info-text"> Votre adresse physique :</h5>
      		                                    	<div class="form-group">
      		                                            <label>Adresse</label>
      		                                            <input type="text" class="form-control"  readonly placeholder=<? echo utf8_encode($adr); ?> >
      		                                        </div>
      		                                        <div class="form-group">
      		                                            <label>N°</label>
      		                                            <input type="number" class="form-control" readonly placeholder=<? echo $n; ?> >
      		                                    </div>
      		                                        <div class="form-group">
      		                                            <label>Commune</label>
      		                                            <input type="text" class="form-control" readonly placeholder=<? echo $commune; ?> >
      		                                        </div>
      		                                        <div class="form-group">
      		                                            <label>Wilaya</label><br>
                                                      <input type="text" class="form-control" readonly placeholder=<? echo $wilaya; ?> >
      		                                        </div>
                                                    <label>Modifier votre adresse :</label>
                                                   <a href="ModificationAdresseCtrl.php"><input name="ModifAddr" type="button" class="form-control btn-info" value="Modifier"></a>

                                            </div>
      		                                </div>
      		                            </div>
      		                        <div class="wizard-footer">
      		              <div class="clearfix"></div>
      		                        </div>
      		            </div>

                      </div>
      </body>

</html>
