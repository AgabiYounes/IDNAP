<?php ob_start(); ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="http://localhost/PFE/bureauPoste/index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" >Notifier un client</li>
    </ol>
  <div class="container">
    <div class="row">
    <div class="col-sm-12">
      <?php
      if ($VarAffiche=="true") {
        echo '<div class="alert alert-success text-center" role="alert">Votre demande de notification a été bien prise en charge</div>';
        $VarAffiche="false";
      }
      elseif($VarAffiche=="errorIDPostal")
      {
        echo '<div class="alert alert-warning text-center" role="alert">Veuillez introduire un Identifiant client valide</div>';
        $VarAffiche="false";
      }
      elseif ($VarAffiche=="errorDroit") {
        echo '<div class="alert alert-danger text-center" role="alert">Erreur de permission : Ce compte n'."'est pas autorisé a notifié ce client </div>";
        $VarAffiche="false";
      } ?>
  </div>
      </div>
    <form action="#" method="post" id="formnotify">
      <fieldset>
        <legend class="text-center">Notifier un client</legend>
      <div class="form-group row">
              <label class="col-sm-4 label-form">IDentifiant client</label>
              <div class="col-sm-4">
            <input type="number" name="idclient" class="form-control text-center" placeholder="ex: 0xxxxxxx" maxlength="14" minlength="14" required>
          </div>
      </div>
      <div class="form-group row">
            <label class="col-sm-4 label-form">Nom du client / entreprise</label>
            <div class="col-sm-4">
          <input type="text" name="nom" class="form-control text-center" placeholder="Nom du client / entreprise" required>
          </div>
      </div>
      <div class="form-group row">
            <label class="col-sm-4 label-form">Prénom du client</label>
            <div class="col-sm-4">
              <input type="text" name="prenom" class="form-control text-center" placeholder="Prénom du client" >
            </div>
      </div>
      <div class="form-group row">
        <label class="label-form col-sm-4">Type de notification</label>
          <div class="col-sm-4">
            <select class="form-control text-center" name="type" style="text-align-last:center;">
              <option value="colis">Colis</option>
              <option value="courrier">Courrier</option>
              <option value="carteEdahabia">Carte EDahabia</option>
              <option value="carnetCheque">Carnet de chèque</option>
              <option value="telegramme">Télégramme</option>
              <option value="offre">Offre</option>
            </select>
            </div>
      </div>
      <div class="form-group row">
            <label class="col-sm-4 label-form ">Message</label>

            <div class="col-sm-4">
            <textarea class="form-control text-center" rows="3" placeholder="Saisissez votre message ici" name="message"></textarea>
          </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center div-submit ">
          <button type="submit" class="btn btn-outline-success" id="submit-notify">Valider</button>
        </div>
      </div>
      </fieldset>
    </form>
  </div>
    </div>
      </div>

      <?php $content = ob_get_clean(); ?>

      <?php require('template.php'); ?>
