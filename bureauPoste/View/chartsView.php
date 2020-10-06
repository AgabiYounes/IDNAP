<?php ob_start(); ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="http://localhost/PFE/bureauPoste/index.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Statistiques du bureau de Poste</li>
    </ol>
    <div class="col-sm-12">
      <h4 style="margin-bottom:50px; margin-top:50px;"><em><b><mark>1- Statistiques Demandes/Confirmations</mark></b></em></h4>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <canvas id="pie-chart" width="700" height="250"></canvas>
        <script type="text/javascript">
        new Chart(document.getElementById("pie-chart"), {
          type: 'pie',
          data: {
            labels: ["Demandes en attente de confirmation", "Demandes confirmées","Demandes refusées"],
            datasets: [{
              label: "Nombre de personnes",
              backgroundColor: [ "#ffbf00","#5555f4","#BA3951"],
              data: [<?= $DemandeNonConfirm ?>,<?= $DemandeConfirm ?>,<?=$DemandeRefus ?>]
            }]
          },

        });
        </script>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h4 style="margin-bottom:50px; margin-top:50px;"><em><b><mark>2- Statistiques Personnes physiques/Entreprises</mark></b></em></h4>
      </div>
      </div>


        <div class="row">
          <div class="col-sm-2">

          </div>
          <div class="col-sm-8">
            <canvas id="bar-chart" width="100" height="50" ></canvas>
            <script type="text/javascript">
            new Chart(document.getElementById("bar-chart"), {
          type: 'bar',
          data: {
            labels: ["Entreprises", "Personnes physiques"],
            datasets: [
              {
                label: "Nombre d'inscriptions",
                backgroundColor: ["#ffbf00","#5555f4"],
                data: [<?php echo $StatEntreprise; ?>,<?php echo $StatPersonne; ?>]
              }
            ]
          },
          options: {
            legend: { display: false },
            scales: {
        yAxes: [{
            display: true,
            ticks: {
                suggestedMin: 0,    // minimum will be 0, unless there is a lower value.

            }
        }]
    },
            title: {
              display: true,
              text: "Nombre d'inscriptions au service IDNAP Entreprises/Personnes physiques"
            }
          }
      });
            </script>
          </div>
          <div class="col-sm-2">

          </div>
        </div>
    <div class="row">
      <div class="col-sm-12">
        <h4 style="margin-bottom:50px; margin-top:50px;"><em><b><mark>3- Evolution d'inscription au service d'IDN Algerie Poste</mark></b></em></h4>
      </div>
      </div>


        <div class="row">
          <div class="col-sm-2">

          </div>
          <div class="col-sm-8">
            <canvas id="line-chart" width="800" height="450"></canvas>
            <script type="text/javascript">
            new Chart(document.getElementById("line-chart"), {
              type: 'line',
              data: {
                labels: ['Janvier','Fevrier','Mars','Avril','Mai','Juin'],
                datasets: [{
                    data: [1,2,4,3,7,10],
                    label: "Personnes physique",
                    borderColor: "#ffbf00",
                    fill: false
                  }, {
                    data: [1,1,2,6,3,7],
                    label: "Entreprises",
                    borderColor: "#5555f4",
                    fill: false
                  }
                ]
              },
              options: {
                title: {
                  display: true,
                  text: "Evolution d'inscription au service d'IDN Algerie Poste"
                }
              }
            });
            </script>
          </div>
          <div class="col-sm-2">

          </div>
        </div>
  </div>
  </div>
  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>
