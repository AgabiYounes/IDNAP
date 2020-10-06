<?php ob_start(); ?>
  <div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="http://localhost/PFE/superviseur/index.php">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Table des Bureaux de Poste</li>
</ol>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> Table des Bureaux de Poste</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">Code Postal BP</th>
            <th class="text-center">Nom bureau de poste</th>
            <th class="text-center">Nombre total de demandes</th>
            <th class="text-center">ID confirmés</th>
            <th class="text-center">ID en attente</th>
            <th class="text-center">Pourcentage de confirmation</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($donnee= $liste->fetch())
          {
            ?>
            <tr>
            <td class="text-center"><?php  echo strip_tags($donnee['CodePostal']); ?></td>
            <td class="text-center"><?php  echo strip_tags($donnee['NomBureau']); ?></td>
              <td class="text-center"><?php  if ($donnee['nb1']!=NULL || $donnee['nb0']!=NULL) {echo $donnee['nb1']+$donnee['nb0'];}
              else {
                echo '0';
              }  ?></td>
            <td class="text-center"><?php
            if ($donnee['nb1']!=NULL) {
              echo strip_tags($donnee['nb1']);
              }
            else {
              echo '0';
              } ?>
            </td>
            <td class="text-center"><?php
            if ($donnee['nb0']!=NULL) {
              echo strip_tags($donnee['nb0']);
              }
            else {
              echo '0';
              } ?>
            </td>
            <th class="text-center"><?php
            if ($donnee['nb1']!=NULL || $donnee['nb0']!=NULL) {
              $pourcentagevalidation= ($donnee['nb1'] * 100)/($donnee['nb1']+$donnee['nb0']);
              $pourcentagevalidation=round($pourcentagevalidation, 2);
            }
            else {
              $pourcentagevalidation=0;
            }
            if($pourcentagevalidation <50 && $pourcentagevalidation >=25)
            {
              echo '<span class="text-warning">'.$pourcentagevalidation.' %';
            }
            elseif ($pourcentagevalidation >=50) {
              echo '<span class="text-success">'.$pourcentagevalidation." %";
            }
            elseif ($pourcentagevalidation <30) {
              echo '<span class="text-danger">'.$pourcentagevalidation." %";
            }

             ?></th>


            </tr>
            <?php
          }
          $liste->closeCursor();
          ?>

        </tbody>
        <tfoot>
          <tr>
            <th class="text-center">Code Postal BP</th>
            <th class="text-center">Nom bureau de poste</th>
            <th class="text-center">Nombre total de demandes</th>
            <th class="text-center">ID confirmés</th>
            <th class="text-center">ID en attente</th>
            <th class="text-center">Pourcentage de confirmation</th>
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
