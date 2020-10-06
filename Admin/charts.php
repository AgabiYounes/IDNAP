<?php
require('session.php');
require('Model/Model.php');
$DemandeNonConfirm=DemandeNonConfirm();
$DemandeConfirm=DemandeConfirm();
$StatEntreprise=StatEntreprise();
$StatPersonne=StatPersonne();
require('View/chartsView.php');
