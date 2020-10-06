<!--
  Project Name: ID Numérique Algerie Poste
  Version: 1.0.0
  Author: Agabi Rayane Younes, Arar Mohamed Akram
  Date de debut du developpement : 15-02-2018
  Date de fin du developpement : 08-06-2018
-->

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon"  href="../public/img/logo.png" />
  <title>IDN Algérie Poste -Superviseur Wilaya</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <link href="../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/change-pw.css">
  <link href="../public/css/sb-admin.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="../public/img/logo.png" height="30px" width="30px" id='logo-template' style="margin-right:10px"><a class="navbar-brand" href="index.php" style="font-size: 25px ">Superviseur</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fas fa-database"></i>
            <span class="nav-link-text">&nbsp;Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Table des BP</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.php">
            <i class="fas fa-chart-pie"></i>
            <span class="nav-link-text">Statistiques Wilaya</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="notify.php">
            <i class="fas fa-bell"></i>
            <span class="nav-link-text">Notifier les clients</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="changepw.php">
            <i class="fas fa-key"></i>
            <span class="nav-link-text">Changer le mot de passe</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-sign-out-alt"></i>  Se déconnecter</a>
        </li>
      </ul>
    </div>
  </nav>
<?= $content ?>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>© Algérie Poste 2018</small>
        </div>
      </div>
    </footer>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Se déconnecter</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Voulez-vous vraiment vous déconnecter</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
            <form class="" action="logout.php" method="POST">
              <input type="submit" name="" class="btn btn-primary" value="Oui">
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="../public/vendor/jquery/jquery.min.js"></script>
    <script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../public/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../public/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../public/js/sb-admin.min.js"></script>
    <script src="../public/js/sb-admin-datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../public/js/validation-form.js"></script>
    </div>
    <script type="text/javascript">
    function horloge(){
     var div = document.getElementById("horloge");
     var heure = new Date();
     var strMonth = '' + heure.getMinutes();
  if (strMonth.length == 1) {
    strMonth = '0' + strMonth;
  }
  var strheure = '' + heure.getHours();
  if (strheure.length == 1) {
  strheure = '0' + strheure;
  }
  var strsec = '' + heure.getSeconds();
  if (strsec.length == 1) {
  strsec = '0' + strsec;
  }
     div.firstChild.nodeValue = strheure+" : "+strMonth+" : "+strsec;
     window.setTimeout("horloge()",1000);
    }

    horloge();
    </script>


</body>

</html>
