<?php ob_start(); ?>
  <div class="content-wrapper">
<div class="container-fluid">
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="../index.php">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Table des Wilayas</li>
</ol>

  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Table des Wilayas</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Wilaya</th>
              <th class="text-center">Nombre total d'inscriptions</th>
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

                <td class="text-center"><?php  echo strip_tags($donnee['IDW']); ?></td>
                <td class="text-center"><?php  echo  utf8_encode(strip_tags($donnee['NomWilaya'])); ?></td>
                <td class="text-center"><?php  if ($donnee['c1']!=NULL || $donnee['c0']!=NULL) {echo $donnee['c1']+$donnee['c0'];}
                else {
                  echo '0';
                } ?></td>
                <td class="text-center">
                  <?php
                  if ($donnee['c1']==NULL) {
                    echo "0";
                  }
                  else {
                    echo strip_tags($donnee['c1']);
                  }
                    ?>
                </td>
                <td class="text-center">
                  <?php
                  if ($donnee['c0']==NULL) {
                    echo "0";
                  }
                  else {
                    echo strip_tags($donnee['c0']);
                  }
                    ?>
                </td>
                <th class="text-center ">
                <?php
                if ($donnee['c1']!=NULL || $donnee['c0']!=NULL) {
                  $pourcentagevalidation= ($donnee['c1'] * 100)/($donnee['c1']+$donnee['c0']);
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
              <th class="text-center">N°</th>
              <th class="text-center">Wilaya</th>
              <th class="text-center">Nombre total d'inscriptions</th>
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
