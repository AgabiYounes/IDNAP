<?php ob_start(); ?>
  <div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="http://localhost/PFE/bureauPoste/index.php">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Services Postaux</li>
</ol>
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Services Postaux</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Type Service</th>
              <th class="text-center">Nom Demandeur</th>
              <th class="text-center">Etat</th>
              <th class="text-center">Valider</th>
              <th class="text-center">Supprimer</th>
              <th class="text-center">Imprimer</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($donnee= $demandes->fetch())
            {
              ?>
              <tr>
                <td class="text-center"><strong><?php  echo utf8_encode(strip_tags($donnee['type'])); ?></strong></td>
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
                    if( strip_tags($donnee['Etat'])==1)
                    {
                      echo '<i class="far fa-check-circle text-center" style="font-size: 30px; "></i>';
                    }
                    if( strip_tags($donnee['Etat'])==0)
                    {
                      echo '<i class="far fa-times-circle text-center" style="font-size: 30px;"></i>';
                    }?>
                </td>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <td class="text-center">
                <?php  if( strip_tags($donnee['Etat'])=="1")
                {?>
                  <button type="button" class="btn btn-outline-secondary disabled " data-toggle="tooltip" data-placement="top" title="Service dèja validé">Confirmé</button>
                <?php
                }
                elseif( strip_tags($donnee['Etat'])=="0")
                {?>


                  <input type="button" class="btn btn-outline-success" value="Confirmer" name="" data-toggle="modal" data-target="#<?php  echo strip_tags($donnee['idservice']); ?>K" id="<?php  echo strip_tags($donnee['idservice']); ?>B">
                  <div class="modal fade" id="<?php  echo strip_tags($donnee['idservice']); ?>K" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Confirmer la demande d'inscription au service</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Voulez-Vous Confirmer la demande d'inscription au service de la <?php  echo utf8_encode(strip_tags($donnee['type'])); ?> pour  <?php if ($donnee['Nom']!=NULL) {
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
                          <form method="post" action="confirmservice.php">
                            <input type="hidden" id="uid" name= "uid" value="<?php  echo strip_tags($donnee['idservice']); ?>">
                            <input type="submit" class="btn btn-success" value="Valider">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>


                <?php
              }?>
                </td>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
                <td class="text-center">
                  <?php if ($donnee['historique']=="ok") {
                    ?>

                  <input type="button" class="btn btn-outline-danger" value="Refuser" name="" data-toggle="modal" data-target="#<?php  echo strip_tags($donnee['idservice']); ?>S" id="<?php  echo strip_tags($donnee['idservice']); ?>B">
                  <div class="modal fade" id="<?php  echo strip_tags($donnee['idservice']); ?>S" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle2">Refuser la demande d'inscription</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Voulez-Vous refuser la demande d'inscription de la <?php  echo utf8_encode(strip_tags($donnee['type'])); ?> pour   <?php if ($donnee['Nom']!=NULL) {
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
                          <form method="post" action="deleteservice.php">
                            <input type="hidden" id="uid" name= "uid" value="<?php  echo strip_tags($donnee['idservice']); ?>">
                            <input type="submit" class="btn btn-danger" value="Supprimer">
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php }
 elseif ($donnee['historique']=="archive") {
?>


<button type="button" class="btn btn-outline-danger disabled " data-toggle="tooltip" data-placement="top" title="Service archivé">Archivé</button>





<?php } ?>

                </td>
                <td class="text-center">
                <form class="" action="servdoc.php" method="post" name="ficheinfo">
                  <input type="hidden" id="uid" name= "idservice" value="<?php  echo strip_tags($donnee['idservice']); ?>">
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
              <th class="text-center">Type Service</th>
              <th class="text-center">Nom Demandeur</th>
              <th class="text-center">Etat</th>
              <th class="text-center">Valider</th>
              <th class="text-center">Supprimer</th>
              <th class="text-center">Imprimer</th>
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
