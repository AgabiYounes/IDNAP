<?php
require('session.php');
require('Model/Model.php');
$DemandeNonConfirm=DemandeNonConfirm();
$DemandeConfirm=DemandeConfirm();
$NbrTotalInscription=DemandeTotal();
$Reexpedition=Reexpedition();
$PosteRestante=PosteRestante();
$GardeCourrier=GardeCourrier();
require('View/indexView.php');