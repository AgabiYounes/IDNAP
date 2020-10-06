<?php ob_start(); ?>
  <div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="../index.php">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Gerer les sessions</li>
</ol>
  <div class="card mb-3">
    <div class="card-header">
      <div class="row">

      <div class="col-sm-5">
        <i class="fa fa-table"></i> Table des comptes
      </div>
    <div class="col-sm-4">  </div>
    <div class="col-sm-3" ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AjouterModal" id="ajouter-session">Ajouter un compte</button></div>
  </div>
  <div class="modal fade" id="AjouterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="add.php">
          <div class="row">
          <div class="col-sm-5 text-left"><label style="font-size:18px;">Type</label></div>
            <div class="col-sm-7">
              <select class="form-control text-center" name="type" style="text-align-last:center;">
              <option value="admin">Administrateur</option>
              <option value="superviseur">Superviseur</option>
              <option value="bureauPoste">Bureau de poste</option>
            </select>
          </div>
          </div>
          <div class="row">
                <div class="col-sm-5 text-left"><label style="font-size:18px;">Nom</label></div>
                <div class="col-sm-7">
                  <input type="text" name="lastname" class="form-control text-center" placeholder="Nom" id="lastname" required>
                </div>
          </div>
          <div class="row">
                <div class="col-sm-5 text-left"><label style="font-size:18px;">Prénom</label></div>
                <div class="col-sm-7">
                  <input type="text" name="firstname" class="form-control text-center" placeholder="Prénom" id="firstname" required>
                </div>
          </div>
          <div class="row">
                <div class="col-sm-5 text-left"><label style="font-size:18px;">Nom d'utilisateur</label></div>
                <div class="col-sm-7">
                  <input type="text" name="username" class="form-control text-center" placeholder="Nom d'utilisateur" id="uid" required>
                </div>
          </div>
          <div class="row">
                <div class="col-sm-5 text-left"><label style="font-size:18px;">Mot de passe</label></div>
                <div class="col-sm-7">
                  <input type="password" name="password" class="form-control text-center" placeholder="*********" id="password" required>
                </div>
          </div>
          <div class="row">
                <div class="col-sm-5 text-left"><label style="font-size:18px;">Code Wilaya</label></div>
                <div class="col-sm-7">
                  <select name="wilaya" class="form-control text-center" style="text-align-last:center;">
    <option value="01">01- Adrar</option>
    <option value="02">02- Chlef</option>
    <option value="03">03- Laghouat</option>
    <option value="04">04- Oum El Bouaghi</option>
    <option value="05">05- Batna </option>
    <option value="06">06- Béjaïa </option>
    <option value="07">07- Biskra </option>
    <option value="08">08- Béchar </option>
    <option value="09">09- Blida</option>
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
          <div class="row">
                <div class="col-sm-5 text-left"><label style="font-size:18px;">Code Postal</label></div>
                <div class="col-sm-7">
                  <input type="number" name="codepostal" class="form-control text-center" placeholder="16046" id="codepostal" required maxlength="5">
                </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <input type="submit" name="" value="Valider" class="btn btn-success ">

      </div>
    </form>
    </div>
  </div>
</div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>UID</th>
              <th>Nom d'utilisateur</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Type</th>
              <th>Modifier</th>
              <th>Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($donnee= $liste->fetch())
            {
              ?>
              <tr>
                <td><strong><?php  echo strip_tags($donnee['UID']); ?></strong></td>
                <td><?php  echo strip_tags($donnee['username']); ?></td>
                <td><?php  echo strip_tags($donnee['Nom']); ?></td>
                <td><?php  echo strip_tags($donnee['Prenom']); ?></td>
                <td><?php  echo strip_tags($donnee['Type']); ?></td>
                <td>
                  <input type="button" class="btn btn-outline-warning" value="Modifier" name="" data-toggle="modal" data-target="#<?php  echo strip_tags($donnee['UID']); ?>M">
                  <div class="modal fade" id="<?php  echo strip_tags($donnee['UID']); ?>M" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLongTitle"><strong style="font-size : 25px;">Modifier le compte de Mr/Mme : <?php  echo strip_tags($donnee['Nom']); ?></strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="modifier.php">
                          <input type="hidden" name="UID" value="<?php  echo strip_tags($donnee['UID']); ?>">
                          <input type="hidden" name="type" value="<?php  echo strip_tags($donnee['Type']); ?>">

                          <div class="row" style="margin-bottom : 15px">
                                <div class="col-sm-5 text-left"><label style="font-size:18px;"><strong>Nom</strong></label></div>
                                <div class="col-sm-7">
                                  <input type="text" name="lastname" class="form-control text-center" value="<?php  echo strip_tags($donnee['Nom']); ?>" id="lastname" required>
                                </div>
                          </div>
                          <div class="row" style="margin-bottom : 15px">
                                <div class="col-sm-5 text-left"><label style="font-size:18px;"><strong>Prénom</strong></label></div>
                                <div class="col-sm-7">
                                  <input type="text" name="firstname" class="form-control text-center" value="<?php  echo strip_tags($donnee['Prenom']); ?>" id="firstname" required>
                                </div>
                          </div>
                          <div class="row" style="margin-bottom : 15px">
                                <div class="col-sm-5 text-left"><label style="font-size:18px;"><strong>Nom d'utilisateur</strong></label></div>
                                <div class="col-sm-7">
                                  <input type="text" name="username" class="form-control text-center" value="<?php  echo strip_tags($donnee['username']); ?>" id="uid" required>
                                </div>
                          </div>
                          <div class="row" style="margin-bottom : 15px">
                                <div class="col-sm-5 text-left"><label style="font-size:18px;"><strong>Mot de passe</strong></label></div>
                                <div class="col-sm-7">
                                  <input type="password" name="password" class="form-control text-center" placeholder="*********" id="password" required>
                                </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <input type="submit" name="" value="Modifier" class="btn btn-warning">

                      </div>
                    </form>
                    </div>
                  </div>
                  </div>
                </td>
                <td>
                    <input type="button" class="btn btn-outline-danger" value="Supprimer" name="" data-toggle="modal" data-target="#<?php  echo strip_tags($donnee['UID']); ?>S" id="<?php  echo strip_tags($donnee['UID']); ?>B">
                    <div class="modal fade" id="<?php  echo strip_tags($donnee['UID']); ?>S" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Supprimer un compte utilisateur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Voulez-Vous vraiment supprimer le compte de Mr/Mme : <strong><?php  echo strip_tags($donnee['Nom']); ?> <?php  echo strip_tags($donnee['Prenom']); ?></strong> ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <form method="post" action="supprimer.php">
                              <input type="hidden" id="uid" name= "uid" value="<?php  echo strip_tags($donnee['UID']); ?>">
                              <input type="submit" class="btn btn-danger" value="Supprimer">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                </td>
              </tr>
              <?php
            }
            $liste->closeCursor();
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>UID</th>
              <th>Nom d'utilisateur</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Type</th>
              <th>Modifier</th>
              <th>Supprimer</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
