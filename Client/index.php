<!--
  Project Name: ID Numérique Algerie Poste
  Version: 1.0.0
  Author: Agabi Rayane Younes, Arar Mohamed Akram
  Date : 15-02-2018
-->
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
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
    <title>Votre Accueil | IDN Algérie Poste</title>
  </head>
  <? if(isset($_COOKIE['success_registration']))
  {echo $_COOKIE['success_registration'];} ?>
  <body id="IndexBody">
      <header>
        <div class="col-sm-12">
          <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><img src="img/logo.png" id="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-warning hvr-wobble-vertical" href="index.php" id="link-home">Accueil<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white hvr-wobble-vertical" href="en-savoir-plus.html">En savoir Plus</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white hvr-wobble-vertical" href="about.html">A Propos</a>
      </li>
    </ul>
    <ul class="notmob nav navbar-nav navbar-right">
      <li><a href="RegistrationControl.php"><button class="btn btn-primary hvr-grow-shadow btn-inscribe">S'inscrire</button></a></li>
      <li><a href="loginCtrl.php"><button class="btn btn-secondary hvr-grow-shadow btn-login">Se Connecter</button></a></li>
    </ul>
  </div>
</nav>
<div class="mobile-con">
  <a href="RegistrationControl.php"><button class="btn btn-primary hvr-grow-shadow btn-inscribe">S'inscrire</button></a>
  <a href="loginCtrl.html"><button class="btn btn-secondary hvr-grow-shadow btn-login">Se Connecter</button></a>
<div>
        </div>
      </header>
      <div class="container-fluid">
        <section id="sect_features"  class="section-features padding-section">
        <div class="container">

        <div class="row">
        	<div class="col-sm-4">
        		<article class="item-feature wow slideInLeft">
        		<span class="icon-wrap"><i class="fas fa-lock logo-items-feature"></i></span>
        		<div class="text-wrap">
        			<h4 class="title-items-feature">Sécurisée</h4>
        			<p class="text-item-feature">Le service <span class="id-entite">ID</span>entité <span class="id-entite">N</span>umerique d'Algérie Poste vous protege contre les fraudes d'identité sur internet</p>
        		</div>
                </article>
        	</div> <!-- col// -->
        	<div class="col-sm-4">
        		<article class="item-feature wow bounceInUp">
        		<span class="icon-wrap"><i class="fas fa-id-card logo-items-feature"></i></span>
        		<div class="text-wrap">
        			<h4 class="title-items-feature">IDentité Validée</h4>
        			<p class="text-item-feature">Une <span class="id-entite">ID</span>entité <span class="id-entite">N</span>umerique Validée par Algérie Poste</p>
        		</div>
                </article>
        	</div> <!-- col// -->
        	<div class="col-sm-4">
        		<article class="item-feature wow slideInRight">
        		<span class="icon-wrap"><i class="far fa-money-bill-alt logo-items-feature"></i></span>
        		<div class="text-wrap">
        			<h4 class="title-items-feature">Gratuit</h4>
        			<p class="text-item-feature">Le service <span class="id-entite">ID</span>entité <span class="id-entite">N</span>umerique d'Algérie Poste est totalement gratuit</p>
        		</div>
                </article>
        	</div> <!-- col// -->
        </div><!-- row // -->

        </div><!-- container //  -->
        </section>
    </div>
  </body>
</html>
