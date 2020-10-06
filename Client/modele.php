<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

function login($email, $mdp)
{
  $db=dbConnect();
  $req = $db->prepare('SELECT * FROM client WHERE email = ? AND MotDePasse = ? ');
  $req->execute(array($email,$mdp));
  $user=$req->fetch();
  if ($user) {
    return true;
  }
  else {
    return false;
  }
}

function dbConnect(){
   try {
	$bdd = new PDO('mysql:host=localhost;dbname=mabase', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 }
catch(PDOException $e)
	 {
	 echo "Connection failed: " . $e->getMessage();
	 }
return $bdd;
}

function getIdnap($email)
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT IDPostal FROM client WHERE email=? ');
	$stmt->execute(array($email));
	$idnap=$stmt->fetch();
	return $idnap[0];
}

function getCommuneFromCp($CodePostal)
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT NomBureau FROM bureauposte WHERE CodePostal=?');
	$stmt->execute(array($CodePostal));
	$commune=$stmt->fetch();
	return $commune[0];
}

function getNotifs($idnap){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT * FROM notification,lignenotification WHERE IDPostal=? AND lignenotification.NID=notification.NID ORDER BY date DESC');
	$stmt->execute(array($idnap));

	return $stmt;
}
function getColisIds($idnap)
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT idColis FROM Colis WHERE idRecepteur=?');
	$stmt->execute(array($idnap));
	
	return $stmt;
}
function updateColis($idColis,$dateRecep,$communeRecep){
try{
		$db=dbConnect();
		$stmt = $db->prepare('UPDATE `Colis` SET `dateReception`= ? , `adresseReception`= ? WHERE idColis=?');
		$stmt->execute(array($dateRecep,$communeRecep,$idColis));
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			}
	}

function getCommunes()
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT CodePostal,NomBureau FROM bureauposte ORDER BY IDW');
	$stmt->execute();
	
	return $stmt;
}

function getWilayas()
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT IDW,NomWilaya FROM upw ORDER BY IDW');
	$stmt->execute();
	
	return $stmt;
}

function getColis($idnap){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT * FROM Colis WHERE idRecepteur=?');
	$stmt->execute(array($idnap));
	
	return $stmt;

}
function getColumnName($idcol){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT NomBureau FROM bureauposte WHERE CodePostal=? ');
	$stmt->execute(array($idcol));
	$com=$stmt->fetch();
	return $com[0];

}
function insertClientInfos($IDPostal,
$lastname,
$firstname,
$email,
$password,
$DateInscription,
$date_naissance,
$lieu_naissance,
$sexe,
$mobile_number,
$ccp,
$ncib,
$type,
$cle,$CodePostal){
  $db=dbConnect();
  $nomEntreprise="";
  if($type=="Entreprise"){$nomEntreprise=$lastname; $firstname=NULL; $lastname=NULL ;$date_naissance=NULL;$ncib=NULL;}

  $stmt = $db->prepare("INSERT INTO client (IDPostal,Nom,Prenom,NomEntreprise,Email,MotDePasse,DateInscription,DateNaissance,LieuNaissance,Sexe,NumTel,CCP,NCIB,Type,CleConfirmation)
    										VALUES (:id,:Nom,:Prenom,:nomEntreprise,:Email,:Mdp,:DateInscription,:DateNaissance,:LieuNaissance,:Sexe,:NumTel,:NumCCP,:NCIB,:Type,:cleconf)");

	$stmt->execute(array(':id'=> $IDPostal,
							':Nom'=> $lastname,
							':Prenom'=> $firstname,
							':nomEntreprise'=> $nomEntreprise,
							':Email'=> $email,
							':Mdp'=> $password,
							':DateInscription'=> date('Y-m-d'),
							':DateNaissance'=> $date_naissance,
							':LieuNaissance'=> $lieu_naissance,
							':Sexe'=> $sexe,
							':NumTel'=> $mobile_number,
							':NumCCP'=> $ccp,
							':NCIB'=> $ncib,
							':Type'=> $type,
							':cleconf'=> $cle));

	$stmt2 = $db->prepare("INSERT INTO `demande`(`IDPostal`, `CodePostal`, `DateDemande`, `DateConfirmation`, `Etat`) 
							VALUES (?,?,?,?,?)");
		$stmt2->execute(array($IDPostal,$CodePostal,date('Y-m-d'),null,0));

}

function existance($address,$Commune,$Numero,$wilaya,$CodePostal){
	try{
		$db=dbConnect();
		$stmt = $db->prepare(" SELECT COUNT(*) from adresse where adresse=? AND Commune=? AND idw=? AND CodePostal=? AND Numero=?");
		$stmt->execute(array($address,$Commune,$wilaya,$CodePostal,$Numero));
		$result=$stmt->fetch();
		if ($result[0]>0) {
				return 1;
		}
		else {
			return 0;
		}
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			}
}
function insertInfoHabitat($idadr,$IDPostal,$datedem){
	 $db=dbConnect();
  $stmt = $db->prepare("INSERT INTO habitat (IDPostal,IDAdr,DateDem)
    										VALUES (:idnap,:idAdr,:DateDem)");

	$stmt->execute(array(':idnap'=> $IDPostal,':idAdr'=> $idadr,':DateDem'=> $datedem ));


}

function getIDAdr($address,$Commune,$wilayaN,$CodePostal,$Numero){
		try{

		$db=dbConnect();
		$stm = $db->prepare("SELECT IDAdr from adresse WHERE
		adresse=? AND CodePostal=? AND numero=?");
		$stm->execute(array($address,$CodePostal,$Numero));
		$id=$stm->fetch();
		return $id[0];
}catch(PDOException  $e ){
			echo "Error: ".$e;
			}
		}

function getWilayaNamefromIdw($wilaya)
{
	try{

	$db=dbConnect();
		$stm = $db->prepare(" SELECT NomWilaya from upw WHERE IDW=?");
		$stm->execute(array($wilaya));
		$wilayaN=$stm->fetch();
		return $wilayaN[0];
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			}
}
function inserer_Adresse($address,$Commune,$Numero,$wilayaN,$CodePostal){
	try{
		$db=dbConnect();
		$stmt = $db->prepare('INSERT INTO `adresse` (adresse,numero,apc,wilaya,CodePostal)
														VALUES (?,?,?,?,?)');

		$stmt->execute(array($address,$Numero,$Commune,$wilayaN,$CodePostal));
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			}
}


function getClientsNbr(){
			$db=dbConnect();
			$stm = $db->prepare("SELECT COUNT(*) from client");
					$stmt->execute();
					$result=$stmt->fetch();
					return $result[0];

}



function inserGardeCourier($idnap,$dateDebut,$dateFin){

try{
		$db=dbConnect();
		$type="gardecourier";
		$stmt = $db->prepare('INSERT INTO servicepostal(`IDPostal`,`type`, `DateInscription`, `DateFin`) VALUES (?,?,?,?)');
		$stmt->execute(array($idnap,$type,$dateDebut,$dateFin));
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			}

	}


function insererReexpedition($idnap,$dateDebut,$dateFin,$bp){

		try{
		$db=dbConnect();
		$type="reexpedition";
		$stmt = $db->prepare('INSERT INTO `servicepostal`(`IDPostal`, `type`, `DateInscription`, `dateFin`, `NouvelleAdresse`) VALUES (?,?,?,?,?)');
		$stmt->execute(array($idnap,$type,$dateDebut,$dateFin,$bp));
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			}

	}

function insererPsteRestante($idnap,$dateDebut,$dateFin,$bp){
	try{
		$db=dbConnect();
		$type="posterestante";
		$stmt = $db->prepare('INSERT INTO `servicepostal`(`IDPostal`, `type`,`dateInscription`, `dateFin`, `NouvelleAdresse`) VALUES (?,?,?,?,?)');
		$stmt->execute(array($idnap,$type,$dateDebut,$dateFin,$bp));
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			}
}

	
function updateCcp($idnap,$ccp){
try{
		$db=dbConnect();
		$stmt = $db->prepare('UPDATE `client` SET `CCP`= ? WHERE IDPostal=?');
		$stmt->execute(array($ccp,$idnap));
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			}
}

function getInfoClient($idnap){

	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT * FROM client WHERE IDPostal=? ');
	$stmt->execute(array($idnap));
	$table=$stmt->fetch();
	return $table;
}


function getInfoAdr($idnap){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT * FROM habitat RIGHT JOIN adresse ON habitat.IDAdr=adresse.IDAdr WHERE IDPostal=?; ');
	$stmt->execute(array($idnap));
	$table=$stmt->fetch();
	return $table;
}
function getNameForCommune($CodePostal){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT NomBureau FROM bureauposte WHERE CodePostal=?; ');
	$stmt->execute(array($CodePostal));
	$result=$stmt->fetch();
	return $result[0];
}
function getWilayaName($nw){

	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT NomWilaya FROM upw WHERE IDW=?; ');
	$stmt->execute(array($nw));
	$result=$stmt->fetch();
	return $result[0];

}

function getUserName($UID){

	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT Nom FROM utilisateur WHERE UID=?; ');
	$stmt->execute(array($UID));
	$result=$stmt->fetch();
	return $result[0];
}

function makeKey(){
	$keylength=12;
	$cle="";
for($i=1 ; $i<$keylength ; $i++)
{
	$cle.=mt_rand(0,9);
}
return $cle;
}




function sendCode($mail,$cle)
{

$message = "Salutation, Voici votre code de confirmation  :/  ".$cle."  /";
$sujet="Confirmation du compte d'Algérie poste";
        if(@mail($mail, $sujet, $message))
{
  echo "Mail Sent Successfully";
}else{
  echo "Mail Not Sent";}

}

function checkIfAlreadyExisting($idnap,$type){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT Count(*) FROM servicepostal WHERE IDPostal=? AND type=? and Etat=? and DateFin>=?; ');
	$stmt->execute(array($idnap,$type,1,date('Y-m-d')));
	$result=$stmt->fetch();
	return $result[0];
}

function getDateFin($idnap,$type)
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT DateFin FROM servicepostal WHERE IDPostal=? AND type=? and Etat=?; ');
	$stmt->execute(array($idnap,$type,1));
	$result=$stmt->fetch();
	return $result[0];
}

function checkIfMailAlreadyExisting($email){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT Count(*) FROM client WHERE email=?; ');
	$stmt->execute(array($email));
	$result=$stmt->fetch();
	return $result[0];
}
function checkIfIDNAlreadyExisting($ncib){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT Count(*) FROM client WHERE ncib=?; ');
	$stmt->execute(array($ncib));
	$result=$stmt->fetch();
	return $result[0];
}

function getIdfor($yearofbirth,$sexe,$wilayaNaissance,$type){
	$thisyear=date('Y');
 	
 	$dateInsc=date('y-m-d');
	
	if($sexe="Femme"){$sexe=0;}
	if($sexe="Homme"){$sexe=1;}

	if($type="Entreprise"){$type=0;$yearofbirth="2000-01-01";$sexe=2;}
	else{$type=1;}

	$wilaya2 = sprintf('%02d',$wilayaNaissance);

	$leftSide=substr($dateInsc,0,2).substr($yearofbirth,2,2).$sexe.$type.$wilaya2;
	
	$seqNumber=SeqNumber($leftSide);

	$seqNumber=$seqNumber+1;
	$seqNumber6=sprintf('%06d',$seqNumber);

	return $leftSide.''.$seqNumber6.'';

}

function SeqNumber($leftSide){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT Count(*) FROM client WHERE SUBSTR( IDPostal, 1, 8)=? ; ');
	$stmt->execute(array($leftSide));
	$result=$stmt->fetch();
	return $result[0];
}

function getTypeOf($idnap){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT Type FROM client WHERE IDPostal=?; ');
	$stmt->execute(array($idnap));
	$result=$stmt->fetch();
	return $result[0];
}

function checkCleConf($idnap,$cleconf)
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT CleConfirmation FROM client WHERE IDPostal=?; ');
	$stmt->execute(array($idnap));
	$result=$stmt->fetch();
	if($result[0]!=$cleconf){
		return false;
	}
	else{
		return true;
	}

}

function checkEtatConfirmation($idnap)
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT Etat FROM demande WHERE IDPostal=?; ');
	$stmt->execute(array($idnap));
	$result=$stmt->fetch();
	return $result[0];
}

function setStateCleConf($idnap){

	$bdd=dbConnect();
	$stmt=$bdd->prepare('UPDATE client SET EtatConfirmation=1 WHERE IDPostal=?;');
	$stmt->execute(array($idnap));

}

function checkEtatConfirmationMail($idnap)
{

	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT EtatConfirmation FROM client WHERE IDPostal=?; ');
	$stmt->execute(array($idnap));
	$result=$stmt->fetch();
	return $result[0];

}

function updateAdr($idnap,$address,$Numero,$wilaya,$CodePostal){
	

	$bdd=dbConnect();
	$commune=getCommuneFromCp($CodePostal);
	$wil=getWilayaNamefromIdw($wilaya);
	$add=utf8_decode($address);

	$exist=existingAdr($address,$Numero,$commune,$wil,$CodePostal);
	echo $exist;
	if($exist==0){
	
	$stmt=$bdd->prepare(' INSERT INTO `adresse`(`adresse`, `numero`, `apc`, `wilaya`, `CodePostal`) VALUES (?,?,?,?,?) ');
	$stmt->execute(array($add,$Numero,$commune,$wil,$CodePostal));
	}
	$idAdr=getIdAdresse($address,$Numero,$commune,$wil,$CodePostal);

	habiter($idnap,$idAdr,date('Y-m-d'));
}

function getIdAdresse($address,$Numero,$commune,$wil,$CodePostal){
	$bdd=dbConnect();
	echo $address.$Numero.$commune.$wil.$CodePostal;
	$stmt2=$bdd->prepare('SELECT IDAdr FROM adresse WHERE adresse=? and numero=? and apc=? and wilaya=? and CodePostal=?');
	$stmt2->execute(array(utf8_decode($address),$Numero,$commune,$wil,$CodePostal));
	$result=$stmt2->fetch();
	return $result[0];
}

function existingAdr($address,$Numero,$commune,$wil,$CodePostal){
	$bdd=dbConnect();
	$stmt2=$bdd->prepare('SELECT Count(*) FROM adresse WHERE adresse=? and numero=? and apc=? and wilaya=? and CodePostal=?');
	$stmt2->execute(array(utf8_decode($address),$Numero,$commune,$wil,$CodePostal));
	$result=$stmt2->fetch();
	return $result[0];
}

function habiter($idnap,$idAdr,$date){

	$bdd=dbConnect();
	$stmt=$bdd->prepare('UPDATE habitat SET IDAdr=? , DateDem=? WHERE IDPostal=?; ');
	$stmt->execute(array($idAdr,$date,$idnap));
}

function setKey($mail,$key){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('UPDATE client SET CleConfirmation=? WHERE Email=?; ');
	$stmt->execute(array($key,$mail));
}

function getCode($idnap)
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT CleConfirmation FROM client WHERE IDPostal=?; ');
	$stmt->execute(array($idnap));
	$result=$stmt->fetch();
	return $result[0];
}

function updatePassword($idnap,$newpass){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('UPDATE client SET MotDePasse=?  WHERE IDPostal=?; ');
	$stmt->execute(array($newpass,$idnap));
}

function LastSendMail($alpha,$key){

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'epicpostedz@gmail.com';                 // SMTP username
    $mail->Password = 'lapostedz123';                           // SMTP password
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('epicpostedz@gmail.com', utf8_decode('Algérie Poste'));
    $mail->addAddress($alpha);               // Name is optional
    $mail->addReplyTo('epicpostedz@gmail.com', 'Algerie Poste');


    //Content
    $string="Confirmation du compte d\'Algérie poste";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = utf8_decode($string);
    $mail->Body    = 'Salutation, Voici votre code de confirmation  :/  '.$key.'  /';

    $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}


function MailChangePw($alpha,$key){

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'epicpostedz@gmail.com';                 // SMTP username
    $mail->Password = 'lapostedz123';                           // SMTP password
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('epicpostedz@gmail.com', utf8_decode('Algérie Poste'));
    $mail->addAddress($alpha);               // Name is optional
    $mail->addReplyTo('epicpostedz@gmail.com', 'Algerie Poste');


    //Content
    $string="Confirmation du compte d\'Algérie poste";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = utf8_decode($string);
    $mail->Body    = 'Salutation, Voici votre code de changement de mot de passe  :/  '.$key.'  /';

    $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}

function getAdressInfoStr($idadr){
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT * FROM adresse WHERE IDAdr=?; ');
	$stmt->execute(array($idadr));
	$table=$stmt->fetch();

	$adr=$table[1];
	$n=$table[2];
	$commune=getCommuneFromCp($table[3]);
	$wilaya=$table[4];
	return $n.", ".$adr." ".$commune.", ".$wilaya;
}

function getAdresses()
{
	$bdd=dbConnect();
	$stmt=$bdd->prepare('SELECT * FROM adresse');
	$stmt->execute(array($idadr));
	
	return $stmt;
}

