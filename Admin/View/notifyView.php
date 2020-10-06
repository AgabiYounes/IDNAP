<?php ob_start(); ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" >Notifier les clients</li>
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
            <label class="label-form col-sm-4">Région ciblée</label>
              <div class="col-sm-4">
                <select class="form-control" name="region" style="text-align-last:center;">
                  <option value="toutes">Toutes les Wilayas</option>
                  <option value="1">01- Adrar</option>
		              <option value="2">02- Chlef</option>
                  <option value="3">03- Laghouat</option>
                  <option value="4">04- Oum El Bouaghi</option>
                  <option value="5">05- Batna </option>
                  <option value="6">06- Béjaïa </option>
                  <option value="7">07- Biskra </option>
                  <option value="8">08- Béchar </option>
                  <option value="9">09- Blida</option>
                  <option value="10">10- Bouira</option>
                  <option value="11">11- Tamanrasset</option>
                  <option value="12">12- Tébessa</option>
                  <option value="13">13- Tlemcen</option>
                  <option value="14">14- Tiaret</option>
                  <option value="15">15- Tizi Ouzou</option>
                  <option value="16">16- Alger</option>
                  <option value="17">17- Djelfa</option>
                  <option value="18">18- Jijel</option>
                  <option value="19">19- Sétif</option>
									<option value="20">20- Saïda</option>
									<option value="21">21- Skikda</option>
									<option value="22">22- Sidi Bel Abbès</option>
									<option value="23">23- Annaba</option>
									<option value="24">24- Guelma</option>
									<option value="25">25- Constantine</option>
									<option value="26">26- Médéa</option>
									<option value="27">27- Mostaganem</option>
									<option value="28">28- M'Sila</option>
									<option value="29">29- Mascara</option>
									<option value="30">30- Ouargla</option>
									<option value="31">31- Oran</option>
									<option value="32">32- El Bayadh</option>
									<option value="33">33- Illizi</option>
									<option value="34">34- Bordj Bou Arreridj</option>
									<option value="35">35- Boumerdès</option>
									<option value="36">36- El Tarf</option>
									<option value="37">37- Tindouf</option>
									<option value="38">38- Tissemsilt</option>
									<option value="39">39- El Oued</option>
									<option value="40">40- Khenchela</option>
									<option value="41">41- Souk Ahras</option>
									<option value="42">42- Tipaza</option>
									<option value="43">43- Mila</option>
									<option value="44">44- Aïn Defla</option>
									<option value="45">45- Naâma</option>
									<option value="46">46- Aïn Témouchent</option>
									<option value="47">47- Ghardaïa</option>
									<option value="48">48- Relizane</option>
                </select>
                </div>
          </div>
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
