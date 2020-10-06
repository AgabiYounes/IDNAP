<?php
require('session.php');
require('modele.php');
?>

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

        <link rel="stylesheet" href="css/style3.css">
                <link rel="stylesheet" href="css/w3.css">


<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

    <script type="text/javascript" src="js/script.js"></script>



    <title>Messagerie | IDN Algérie Poste</title>
  </head>
  <body id="msgBody">
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
    <a class="nav-link text-warning hvr-wobble-vertical" href="#">Messagerie</a>
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
 <aside class="container lg-side">
                      <div class="inbox-head">
                        <!--   <form action="#" class="pull-right position">
                              <div class="input-append">
                                  <input type="text" class="sr-input" placeholder="Search Mail">
                                  <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                              </div>
                          </form> -->
                      </div>
                      <div class="inbox-body container-fluid">
                         
                          <table class="table table-inbox table-hover">
                            <tbody>


                              <div class="w3-container">
                              <tr class="read">
                                  <td class="inbox-small-cells">
                              
                                  </td>
                                  <td class="inbox-small-cells"></i></td>
                                  <td class="text-left">Envoyé par</td>
                                  <td class="text-center">Type</td>
                                  <td class="view-message  dont-show"></i></td>
                                  <td class="view-message  text-right">Date</td>
                                  <td class="inbox-small-cells">
                              
                                  </td>
                              </tr>

                              <?php 

$idnap=getIdnap($_SESSION['client']);
$table3=getNotifs($idnap);
$i=1;
while ($donnee= $table3->fetch())
{
  if($donnee[4]==0)
                              $a="unread";
                            else
                              $a="read";?>
                              <tr class=<?php echo $a; ?> onclick="document.getElementById('id01').style.display='block'">
                                  <td class="inbox-small-cells">

                                  </td>
                                  <td class="inbox-small-cells"></td>
                                  <td class="view-message dont-show text-left"><?php  $user=getUserName($donnee['UID']); echo strip_tags($user); ?></td>
                                  <td class="view-message"><?php echo strip_tags($donnee['Type']); ?></td>
                                  <td class="view-message inbox-small-cells"></td>
                                  <td class="view-message text-right"><?php echo strip_tags($donnee['Date']); ?></td>
                                  <td class="inbox-small-cells">

                                  </td>

                                     <div id="id01" class="w3-modal" >
                                        <div class="w3-modal-content w3-animate-top w3-card-4">
                                          <header class="w3-container w3-blue"> 
                                            <span onclick="document.getElementById('id01').style.display='none'" 
                                                  class="w3-button w3-display-topright">&times;</span>
                                            <h2><?php  echo strip_tags($user); ?></h2>
                                          </header>
                                          <div class="w3-container">
                                              <p><?php echo strip_tags(utf8_encode($donnee['Contenu'])); ?></p>

                                          </div>
                                          <footer class="w3-container w3-yellow">
                                            <p><?php echo strip_tags($donnee['Date']); ?></p>
                                          </footer>
                                        </div>
                                    </div>
                              </tr>
                               <?php
  $i=$i+1;
}
$table3->closeCursor();
?>
                          </tbody>
                          </table>
                      </div>
              </div>
                  </aside>
  </body>
</html>
