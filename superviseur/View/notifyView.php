<?php ob_start(); ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="http://localhost/PFE/superviseur/index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" >Notifier les clients au niveau de la wilaya</li>
    </ol>
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-12">
          <?php
          if ($VarAffiche==true) {
            echo '<div class="alert alert-success text-center" role="alert">Votre demande de notification a été bien prise en charge</div>';
            $VarAffiche=false;
          } ?>
      </div>
      </div>
        <form action="#" method="post" id="formnotify">
          <fieldset>
            <legend class="text-center" style="margin-bottom:20px;">Notifier les clients</legend>

          <div class="form-group row">
                  <label class="col-sm-4 label-form">Sexe ciblée</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="sexe" style="text-align-last:center;">
                      <option value="h&f">Hommes&Femmes</option>
                      <option value="h">Hommes</option>
                      <option value="f">Femmes</option>
                    </select>
              </div>
          </div>
          <div class="form-group row">
                  <label class="col-sm-4 label-form">Age ciblée</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="age" style="text-align-last:center;">
                      <option value="jeune">18-30</option>
                      <option value="adulte">31-50</option>
                      <option value="vieu">51-100</option>
                      <option value="tous">18-100</option>
                    </select>
              </div>
          </div>
          <div class="form-group row">
            <label class="label-form col-sm-4">Type de Personne</label>
              <div class="col-sm-4">
                <select class="form-control" name="typepersonne" style="text-align-last:center;">
                  <option value="p&e">Entreprises & Personnes</option>
                  <option value="entreprise">Entreprises</option>
                  <option value="personne">Personnes</option>
                </select>
                </div>
          </div>
          <div class="form-group row">
            <label class="label-form col-sm-4">Type de notification</label>
              <div class="col-sm-4">
                <select class="form-control" name="typenotification" style="text-align-last:center;">
                  <option value="information">Annonce</option>
                  <option value="offre">Offre</option>
                  <option value="carteEdahabia">Carte EDahabia</option>
                </select>
                </div>
          </div>
          <div class="form-group row">
                <label class="col-sm-4 label-form">Message</label>

                <div class="col-sm-4">
                <textarea class="form-control text-center" rows="3" placeholder="Saisissez votre message ici" name="message" required></textarea>
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
