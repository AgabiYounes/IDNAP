<?php
require('session.php');
require('Model/Model.php');
$user=$_SESSION['superviseur'];
$password=getPassWord($user);
$UID=getUID($user, $password);
$IDW=getIDW($UID);
$liste=getListeBP($IDW);
require('View/tablesView.php');
