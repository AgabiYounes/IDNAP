<?php ob_start(); ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
    </ol>
    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-black o-hidden h-100" style="background-color:#318CE7;">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-tachometer-alt"></i>
            </div>
            <div class="mr-5" style="font-size: 20px"><strong>Code Postal du bureau</strong></div>
          </div>
          <div class="card-footer text-black clearfix small z-1" href="#">
            <span class="float-left nbr-inscription"><?php echo $codePostal; ?></span>
            <span class="float-right">
            </span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-black o-hidden h-100" style="background-color:#318CE7;">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="far fa-calendar-alt"></i>
            </div>
            <div class="mr-5"style="font-size: 20px"><strong>Date</strong></div>
          </div>
          <div class="card-footer text-black clearfix small z-1" href="#">
            <span class="float-left nbr-inscription"><?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo (strftime("%A %d %B %Y")); ?></span>
            <span class="float-right">
            </span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-black o-hidden h-100" style="background-color:#318CE7;">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="far fa-clock"></i>
            </div>
            <div class="mr-5" style="font-size: 20px"><strong>Heure</strong></div>
          </div>
          <div class="card-footer text-black clearfix small z-1" href="#">
            <span class="float-left nbr-inscription"><div id="horloge"> </div></span>
            <span class="float-right">
            </span>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-black bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-list"></i>
            </div>
            <div class="mr-5" style="font-size: 20px"><strong>Nombre total d'inscriptions</strong></div>
          </div>
          <div class="card-footer text-black clearfix small z-1" href="#">
            <span class="float-left nbr-inscription"><?=$NbrTotalInscription; ?> Personne(s)</span>
            <span class="float-right">
            </span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-black bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="far fa-check-circle"></i>
            </div>
            <div class="mr-5" style="font-size: 20px"><strong>Nombre de demandes confirmées</strong></div>
          </div>
          <div class="card-footer text-black clearfix small z-1" href="#">
            <span class="float-left nbr-inscription"><?=$DemandeConfirm; ?> Personne(s)</span>
            <span class="float-right">
            </span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-black bg-light o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="far fa-calendar-plus"></i>
            </div>
            <div class="mr-5" style="font-size: 20px"><strong>En attente de confirmation</strong></div>
          </div>
          <div class="card-footer text-black clearfix small z-1" href="#">
            <span class="float-left nbr-inscription"><?=$DemandeNonConfirm; ?> Personne(s)</span>
            <span class="float-right">
            </span>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-black  o-hidden h-100" style="background-color: #FFE436">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-archive"></i>
            </div>
            <div class="mr-5" style="font-size: 20px"><strong>Nombre d'inscriptions : Poste restante </strong></div>
          </div>
          <div class="card-footer text-black clearfix small z-1" href="#">
            <span class="float-left nbr-inscription"><?=$PosteRestante; ?> Personne(s)</span>
            <span class="float-right">
            </span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-black  o-hidden h-100" style="background-color: #FFE436">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-truck"></i>
            </div>
            <div class="mr-5" style="font-size: 20px"><strong>Nombre d'inscriptions : Réexpedition du courrier</strong></div>
          </div>
          <div class="card-footer text-black clearfix small z-1" href="#">
            <span class="float-left nbr-inscription"><?=$Reexpedition; ?> Personne(s)</span>
            <span class="float-right">
            </span>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-black o-hidden h-100" style="background-color: #FFE436">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="mr-5" style="font-size: 20px"><strong>Nombre d'inscriptions : Garde du courrier</strong></div>
          </div>
          <div class="card-footer text-black clearfix small z-1" href="#">
            <span class="float-left nbr-inscription"><?=$GardeCourrier; ?> Personne(s)</span>
            <span class="float-right">
            </span>
          </div>
        </div>
      </div>



    </div>
    </div>
  </div>
  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>
