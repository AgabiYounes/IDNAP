<?php
require("modele.php");
require("session.php");

$idnap=getIdnap($_SESSION['client']);

$epname="";
$type=getTypeOf($idnap);

$table=getInfoClient($idnap);


$lastname=$table[1];
if($type="entreprise"){$epname==$table[2];}

$firstname=$table[3];
$email=$table[4];
$dateNaissance=$table[7];
$lieuNaissance=$table[8];
$cdn=$table[8];
$numTel=$table[10];
$ccp=$table[11];




$table2=getInfoAdr($idnap);

$adr=$table2[4];
$n=$table2[5];
$commune=getNameForCommune($table2[6]);
$wilaya=$table2[7];


//////////////////////////
require("monProfil.php");