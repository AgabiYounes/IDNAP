<?php ob_start(); ?>
  <div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="http://localhost/PFE/bureauPoste/index.php">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Table des Personnes</li>
</ol>
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Table des Personnes</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Adresse</th>
              <th>Sexe</th>
              <th>Etat</th>
              <th>Valider</th>
              <th>Supprimer</th>
              <th>Imprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($donnee= $demandes->fetch())
            {
              ?>
              <tr>
                <td class="text-center"><strong><?php  echo utf8_encode(strip_tags($donnee['IDPostal'])); ?></strong></td>
                <td class="text-center"><?php
                if ($donnee['Nom']==NULL) {
                  echo utf8_encode(strip_tags($donnee['NomEntreprise']));
                }
                else {
                  echo utf8_encode(strip_tags($donnee['Nom']));
                }

                  ?></td>
                <td class="text-center">
                  <?php
                   if ($donnee['Prenom']==NULL) {
                     echo "Ø";
                   }
                   else {
                     echo utf8_encode(strip_tags($donnee['Prenom']));
                   }?>
                 </td>
                <td class="text-center"><?php  echo utf8_encode(strip_tags($donnee['numero']).", ".strip_tags($donnee['adresse'])); ?></td>
                <td class="text-center">
                  <?php
                   if ($donnee['Sexe']==NULL) {
                     echo "Ø";
                   }
                   else {
                     echo utf8_encode(strip_tags($donnee['Sexe']));
                   }?>
                 </td>
                <td class="text-center">
                  <?php
                    if( strip_tags($donnee['Etat'])==1)
                    {
                      echo '<i class="far fa-check-circle text-center" style="font-size: 30px; "></i>';
                    }
                    if( strip_tags($donnee['Etat'])==0)
                    {
                      echo '<i class="far fa-times-circle text-center" style="font-size: 30px;"></i>';
                    }?>
                </td>
                <td>
                <?php  if( strip_tags($donnee['Etat'])==1)
                {?>
                  <button type="button" class="btn btn-outline-secondary disabled " data-toggle="tooltip" data-placement="top" title="Compte dèja validé">Confirmé</button>
                <?php
                }
                if( strip_tags($donnee['Etat'])==0)
                {?>


                  <input type="button" class="btn btn-outline-success" value="Confirmer" name="" data-toggle="modal" data-target="#<?php  echo strip_tags($donnee['IDPostal']); ?>K" id="<?php  echo strip_tags($donnee['IDPostal']); ?>B">
                  <div class="modal fade" id="<?php  echo strip_tags($donnee['IDPostal']); ?>K" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Confirmer la demande d'inscription</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Voulez-Vous Confirmer la demande d'inscription de <?php if ($donnee['Nom']!=NULL) {
                            echo "Mr/Mme :";
                          }
                          else {
                            echo ": ";
                          } ?> <strong><?php  if ($donnee['Nom']==NULL) {
                            echo utf8_encode(strip_tags($donnee['NomEntreprise']));
                          }
                          else {
                            echo utf8_encode(strip_tags($donnee['Nom']));
                          }; ?> <?php  echo strip_tags($donnee['Prenom']); ?></strong> ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                          <form method="post" action="confirm.php">
                            <input type="hidden" id="uid" name= "uid" value="<?php  echo strip_tags($donnee['IDPostal']); ?>">
                            <input type="submit" class="btn btn-success" value="Valider">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>


                <?php
              }?>
                </td>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <td>
<?php if ($donnee['historique']=="ok") {
?>
<input type="button" class="btn btn-outline-danger" value="Refuser" name="" data-toggle="modal" data-target="#<?php  echo strip_tags($donnee['IDPostal']); ?>S" id="<?php  echo strip_tags($donnee['IDPostal']); ?>B">
<div class="modal fade" id="<?php  echo strip_tags($donnee['IDPostal']); ?>S" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle2">Refuser la demande d'inscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Voulez-Vous refuser la demande d'inscription de <?php if ($donnee['Nom']!=NULL) {
          echo "Mr/Mme :";
        }
        else {
          echo ": ";
        }
        ?> <strong><?php  if ($donnee['Nom']==NULL) {
          echo utf8_encode(strip_tags($donnee['NomEntreprise']));
        }
        else {
          echo utf8_encode(strip_tags($donnee['Nom']));
        }; ?> <?php  echo strip_tags($donnee['Prenom']); ?></strong> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <form method="post" action="delete.php">
          <input type="hidden" id="uid" name= "uid" value="<?php  echo strip_tags($donnee['IDPostal']); ?>">
          <input type="submit" class="btn btn-danger" value="Supprimer">
        </form>
      </div>
    </div>
  </div>
</div>
<?php }
elseif ($donnee['historique']=="archive") {
  ?>
  <button type="button" class="btn btn-outline-danger disabled " data-toggle="tooltip" data-placement="top" title="Compte archivé">refusé</button>
<?php }
?>



                </td>
                <td class="text-center">
                <form class="" action="docs.php" method="post" name="ficheinfo">
                  <input type="hidden" id="uid" name= "idpostal" value="<?php  echo strip_tags($donnee['IDPostal']); ?>">
                  <button type="submit" name="button" style="  border: none; cursor: pointer; color: transparent; background-color:transparent;">
                    <img src="../public/img/print.png" alt="" height="35px" width="35px">
                  </button>
                </form>
              </td>
              </tr>
              <?php
            }
            $demandes->closeCursor();
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Adresse</th>
              <th>Sexe</th>
              <th>Etat</th>
              <th>Valider</th>
              <th>Supprimer</th>
              <th>Imprimer</th>
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
