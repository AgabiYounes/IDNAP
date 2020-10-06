
<?php
require('session.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
  <link rel="icon" type="image/png" href="images/icons/favicon.png"/>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="img/logo2.png" />
    <link href="css/animate.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
   
    <script type="text/javascript" src="js/script.js"></script>
    <script src="js/wow.min.js" type="text/javascript"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


    <title>Accueil | IDN Algérie Poste</title>

    <!-- Modal stuff -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- end -->

  </head>
<?php 

if(isset($_COOKIE['success'])){
  echo $_COOKIE['success'];
  unset($_COOKIE['success']);
} 
if(isset($_COOKIE['success-modification'])){
  echo $_COOKIE['success-modification'];
  unset($_COOKIE['success-modification']);
}

if(isset($_COOKIE['success-inscriptionService'])){
  echo $_COOKIE['success-inscriptionService'];
  unset($_COOKIE['success-inscriptionService']);
}
if(isset($_COOKIE['error'])){
  echo $_COOKIE['error'];
  unset($_COOKIE['error']);
}
?>
  <!-- ************************************  HEADER  *************************************** -->
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
    <a class="nav-link text-warning hvr-wobble-vertical" href="#" id="link-home" href="accueilClient.php"> Accueil<span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white hvr-wobble-vertical" href="Messagerie.php">Messagerie</a>
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

  <!-- *************************************************************************** -->


  <body id="IndexBody">


      <div class="container-fluid">
        <section id="sect_features"  class="section-features padding-section">
        <div class="container">

        <div class="row">
        	<div class="col-sm-4">
        		<article class="item-feature wow slideInLeft">
        		<span class="icon-wrap"><i class="fas fa-envelope logo-items-feature"></i></span>
        		<div class="text-wrap">
        			<h4 class="title-items-feature">Messagerie</h4>
        			<p class="text-item-feature">Consultez votre messagerie</p>
              <a href="Messagerie.php"><button class="button-fct btn btn-outline-primary"><span>Consulter </span></button></a>
        		</div>
                </article>
        	</div> <!-- col// -->
        	<div class="col-sm-4">
        		<article class="item-feature wow bounceInUp">
        		<span class="icon-wrap"><i class="fas fa-archive logo-items-feature"></i></span>
        		<div class="text-wrap">
        			<h4 class="title-items-feature">Colis</h4>
        			<p class="text-item-feature">Suivez votre collis utilisant votre IDN</p>
               <a href="MesColis.php"><button class="button-fct btn btn-outline-primary"><span>Suivre </span></button></a>
        		</div>
                </article>
        	</div> <!-- col// -->
        	<div class="col-sm-4">
        		<article class="item-feature wow slideInRight">
        		<span class="icon-wrap"><i class="fas fa-truck logo-items-feature"></i></span>
        		<div class="text-wrap">
        			<h4 class="title-items-feature">Livraison</h4>
        			<p class="text-item-feature"> Modifiez la livraison : delai , adresse</p>
              <a href="ModifColisInfosCtrl.php"><button class="button-fct btn btn-outline-primary"><span>Modifier </span></button></a>
        		</div>
                </article>
        	</div> <!-- col// -->
        </div><!-- row // -->


        <div class="row">
          <div class="col-sm-4">
            <article class="item-feature wow slideInLeft">
            <span class="icon-wrap"><i class="fas fa-key logo-items-feature"></i></span>
            <div class="text-wrap">
              <h4 class="title-items-feature">Garde du courrier</h4>
              <p class="text-item-feature">Conservez temporairement vos courriers<br></p>
              <!-- Modal Num 1 ++++++++++++++++++++++++++++++++++++++++++++++ -->
 <!-- Trigger the modal with a button -->
  <button type="button" class="button-fct btn btn-outline-primary goldbg" data-toggle="modal" data-target="#myModal1">Informations</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

      <!-- Infos Modal-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Résumé et tarifs</h4>
        </div>
        <div class="modal-body">
          <p>La garde du courrier c’est de conserver temporairement les courriers des particuliers habituellement desservie à domicile lorsqu’ils s’absentent, donc les particuliers peuvent demander que leurs courriers soient conservés en instance au bureau de poste pendant une période au plus égale à trois (03) mois.
            Les demandes de garde du courrier formulée par les destinataires appelés à s’absenter, donnent lieu pour chaque demande, à la perception d’un tarif fixé selon le journal officiel de la république algérienne N°63 du 22/10/2014 à 400 DA.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
      </div>

    </div>
  </div>
            <!-- -->
              <a href="inscriptionGardeCourierCtrl.php"><button class="button-fct btn btn-outline-primary"><span>S'y inscrire</span></button></a>
            </div>
                </article>
          </div> <!-- col// -->
          <div class="col-sm-4">
            <article class="item-feature wow bounceInUp">
            <span class="icon-wrap"><i class="fas fa-map-signs logo-items-feature"></i></span>
            <div class="text-wrap">
              <h4 class="title-items-feature">Réexpédition</h4>
              <p class="text-item-feature">Réexpédition a la nouvelle adresse</p>
<!-- Trigger the modal with a button -->
  <button type="button" class="button-fct btn btn-outline-primary goldbg" data-toggle="modal" data-target="#myModal2">Informations</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

      <!-- Infos Modal-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Résumé et tarifs</h4>
        </div>
        <div class="modal-body">
          <p>Tous les objets réceptionnés à l’ancienne adresse seront réexpédiés quotidiennement par le facteur pendant la durée du contrat.
            Les services d’Algérie Poste transfèrent vers le lieu de séjour provisoire des particuliers l’intégralité de leurs courriers de 15 jours à (01) Un an, période qui peut être interrompu à tout moment.
            Les ordres de réexpédition à exécuter par le service postal, donnent lieu à la perception sur le demandeur d’un tarif fixé selon le journal officiel de la république algérienne N°63 du 22/10/2014 comme suit :
            Jusqu’à 03 mois : 350 DA ;
            Au-delà de 03 mois et jusqu’à 1 an : 700 DA.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
      </div>

    </div>
  </div>
              <a href="inscriptionReexpeditionCtrl.php"><button class="button-fct btn btn-outline-primary"><span>S'y inscrire</span></button></a>
            </div>
                </article>
          </div> <!-- col// -->
          <div class="col-sm-4">
            <article class="item-feature wow slideInRight">
            <span class="icon-wrap"><i class="fas fa-map-marker-alt logo-items-feature"></i></span>
            <div class="text-wrap">
              <h4 class="title-items-feature">La poste restante</h4>
              <p class="text-item-feature"> Pour les entreprises.</p>
              <!-- Modal Num 3 ++++++++++++++++++++++++++++++++++++++++++++++ -->
 <!-- Trigger the modal with a button -->
  <button type="button" class="button-fct btn btn-outline-primary goldbg" data-toggle="modal" data-target="#myModal3">Informations</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">

      <!-- Infos Modal-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Résumé et tarifs</h4>
        </div>
        <div class="modal-body">
          <p>Avec la poste restante, les particuliers ainsi que les entreprises peuvent recevoir leurs courriers dans le bureau de poste de leurs choix, avec une confidentialité assurée et remise en main propre seulement en se présentant muni d’une pièce d’identité, dans les 15 jours suivant.
          Les tarifs des envois adressés « Poste Restante » sont fixés selon le journal officiel de la république algérienne N°63 du 22/10/2014 comme suit :
          Journaux et périodiques (tarif fixe applicable par journal ou périodique) : 30 DA ;
          Autres objets (tarif fixe applicable par objet) : 55 DA ;
        Tarif d’abonnement annuel : 2.000 DA.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
      </div>

    </div>
  </div>
            <!-- -->
              <a href="InscriptionPosteRestanteCtrl.php"><button class="button-fct btn btn-outline-primary"><span>S'y inscrire</span></button></a>
            </div>
                </article>
          </div> <!-- col// -->
        </div><!-- row // -->


        </div><!-- container //  -->
        </section>
    </div>

  </body>

</html>
