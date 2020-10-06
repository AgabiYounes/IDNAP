<?php
function dbConnect()
{
  try
   {
       $db = new PDO('mysql:host=localhost;dbname=mabase', 'root', '');
       return $db;
   }
   catch(Exception $e)
   {
       die('Erreur : '.$e->getMessage());
   }
}
function checkOldPass($username,$pw, $type)
{
  $db=dbConnect();
  $re = $db->prepare('SELECT password FROM utilisateur WHERE username = ? AND type= ?');
  $re->execute(array($username, $type));
  $user=$re->fetch();
  if($user[0]==$pw)
  {
    return true;
  }
  else {
    return false;
  }
}
function changePassWord($new,$username)
{
  $db=dbConnect();
  $req = $db->prepare('UPDATE utilisateur SET password=? WHERE username = ?');
  $req->execute(array($new,$username));
}
function login($username, $password,$type)
{
  $db=dbConnect();
  $req = $db->prepare('SELECT * FROM utilisateur WHERE username = ? AND password = ? AND Type= ?');
  $req->execute(array($username,$password,"bureauPoste"));
  $user=$req->fetch();
  if ($user) {
    return true;
  }
  else {
    return false;
  }

}

///////////////////////////////////////////////////////////////////////////////////////////////////
function getCodePostal($UID)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT CodePostal FROM utilisateur WHERE UID=? ");
  $req->execute(array($UID));
  $user=$req->fetch();
  return $user[0];
}
function getPassWord($user)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT password FROM utilisateur WHERE username = ?");
  $req->execute(array($user));
  $res=$req->fetch();
  return $res[0];
}
function getUID($user, $password)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT UID FROM utilisateur WHERE username = ? AND password = ?");
  $req->execute(array($user,$password));
  $res=$req->fetch();
  return $res[0];
}

function DemandeNonConfirm($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande WHERE Etat=? AND historique=? AND CodePostal=?");
  $req->execute(array('0',"ok",$codePostal));
  $user=$req->fetch();
  return $user[0];
}
function DemandeConfirm($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande WHERE Etat=? AND CodePostal=?");
  $req->execute(array('1',$codePostal));
  $user=$req->fetch();
  return $user[0];
}
function DemandeRefus($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande WHERE historique=? AND CodePostal=?");
  $req->execute(array('archive',$codePostal));
  $user=$req->fetch();
  return $user[0];
}

function DemandeTotal($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande WHERE CodePostal=?");
  $req->execute(array($codePostal));
  $user=$req->fetch();
  return $user[0];
}







function Reexpedition($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM servicepostal s INNER JOIN client c ON s.IDPostal=c.IDPostal INNER JOIN demande d ON d.IDPostal=c.IDPostal WHERE d.CodePostal=? AND s.type=?");
  $req->execute(array($codePostal ,"reexpedition"));
  $user=$req->fetch();
  return $user[0];
}
function PosteRestante($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM servicepostal s INNER JOIN client c ON s.IDPostal=c.IDPostal INNER JOIN demande d ON d.IDPostal=c.IDPostal WHERE d.CodePostal=? AND s.type=?");
  $req->execute(array($codePostal ,"posterestante"));
  $user=$req->fetch();
  return $user[0];
}
function GardeCourrier($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM servicepostal s INNER JOIN client c ON s.IDPostal=c.IDPostal INNER JOIN demande d ON d.IDPostal=c.IDPostal WHERE d.CodePostal=? AND s.type=?");
  $req->execute(array($codePostal ,"gardecourrier"));
  $user=$req->fetch();
  return $user[0];
}
/////////////////////////////////////////////////////////////////
function StatEntreprise($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal WHERE d.CodePostal=? AND c.Type=?");
  $req->execute(array($codePostal,'entreprise'));
  $user=$req->fetch();
  return $user[0];
}
/////////////////////////////////////////////////////////////////
function StatPersonne($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal WHERE d.CodePostal=? AND c.Type=?");
  $req->execute(array($codePostal,'personne'));
  $user=$req->fetch();
  return $user[0];
}
function getNID($typenotification,$date,$uid)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT MAX(NID) FROM notification WHERE Type=? AND Date=? AND UID=?");
  $req->execute(array($typenotification,$date,$uid));
  $user=$req->fetch();
  return $user[0];
}
//////////////////////////////////////////////////////////////////////////////////
function AjouterNotificationBureau ($message, $date, $typenotification, $idpostal, $UID)
{
  $db=dbConnect();
  $req=$db->prepare('INSERT INTO notification (Type, Date, Contenu, UID)
                      VALUES(:Type, :Date, :Contenu, :UID)');
$req->execute(array(
  'Type'=> $typenotification,
  'Date'=>$date,
  'Contenu'=>$message,
  'UID'=>$UID
));
$NID=getNID($typenotification,$date,$UID);
$req=$db->prepare('INSERT INTO lignenotification (IDPostal,NID)
                    VALUES(:IDPostal,:NID)');
$req->execute(array(
'IDPostal'=> $idpostal,
'NID'=>$NID
));

  return $req;
}
function CheckIDPostal($idpostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT IDPostal FROM client WHERE IDPostal=?");
  $req->execute(array($idpostal));
  $user=$req->fetch();
  if ($user[0]==$idpostal) {
    return true;
  }
  else {
    return false;
  }
}
function CheckDroit($idpostal,$codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT CodePostal FROM demande WHERE IDPostal=?");
  $req->execute(array($idpostal));
  $user=$req->fetch();
  if ($user[0]==$codePostal) {
    return true;
  }
  else {
    return false;
  }
}
///////////////////////////////////////////////////////////////////////////////////
function ConfirmCompte($uid)
{ $var=1;
  $db=dbConnect();
  $req = $db->prepare('UPDATE demande SET Etat=?, historique=? WHERE IDPostal = ?');
  $req->execute(array($var,"ok",$uid));
  return $req;
}
function SupprimerCompte($uid)
{ $var=0;
  $db=dbConnect();
  $req = $db->prepare("UPDATE demande SET Etat=?, historique=? WHERE IDPostal = ?");
  $req->execute(array($var,"archive",$uid));
  return $req;
}
function SupprimerService($uid)
{ $var=0;
  $db=dbConnect();
  $req = $db->prepare("UPDATE servicepostal SET Etat=? , historique=? WHERE idservice = ?");
  $req->execute(array($var,"archive",$uid));
  return $req;
}
function ConfirmService($uid)
{
  $var=1;
    $db=dbConnect();
    $req = $db->prepare('UPDATE servicepostal SET Etat=? , historique=? WHERE idservice = ?');
    $req->execute(array($var,"ok",$uid));
    return $req;
}
function ListeDemande($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT c.IDPostal, c.Nom, c.NomEntreprise, c.Prenom, a.adresse, a.numero, c.Sexe, d.Etat, d.historique FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal INNER JOIN habitat h ON h.IDPostal=c.IDPostal INNER JOIN adresse a ON h.IDAdr=a.IDAdr WHERE d.CodePostal=?");
  $req->execute(array($codePostal));

  return $req;
}
function ListeServices($codePostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT c.Nom, c.Prenom,c.NomEntreprise, s.idservice, s.Etat, s.NouvelleAdresse, s.type, s.DateInscription, s.DateFin, s.historique FROM servicepostal s INNER JOIN client c ON s.IDPostal=c.IDPostal INNER JOIN demande d ON d.IDPostal=c.IDPostal WHERE d.CodePostal=?");
  $req->execute(array($codePostal));

  return $req;
}
function getClient($idpostal)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT * FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal INNER JOIN habitat h ON h.IDPostal=c.IDPostal INNER JOIN adresse a ON a.IDAdr=h.IDAdr WHERE c.IDPostal=?");
  $req->execute(array($idpostal));
  return $req;
}
function telecharger($fileName)
{
  ini_set('zlib.output_compression', 0);
  $date = gmdate(DATE_RFC1123);

  header('Pragma: public');
  header('Cache-Control: must-revalidate, pre-check=0, post-check=0, max-age=0');

  header('Content-Tranfer-Encoding: none');
  header('Content-Length: '.filesize($fileName));
  header('Content-MD5: '.base64_encode(md5_file($fileName)));
  header('Content-Type: application/octetstream; name="'.$fileName.'"');
  header('Content-Disposition: attachment; filename="'.$fileName.'"');

  header('Date: '.$date);
  header('Expires: '.gmdate(DATE_RFC1123, time()+1));
  header('Last-Modified: '.gmdate(DATE_RFC1123, filemtime($fileName)));

  readfile($fileName);
  exit;
}
function getService($idservice)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT * FROM servicepostal s INNER JOIN client c ON s.IDPostal=c.IDPostal INNER JOIN demande d ON c.IDPostal=d.IDPostal INNER JOIN bureauposte b ON b.CodePostal=d.CodePostal WHERE s.idService=?");
  $req->execute(array($idservice));
  return $req;
}

function NotifierService($Sid, $uid)
{
    $date=date("Y-m-d");
  $db=dbConnect();
  $x=getService($Sid);
  while ($data=$x->fetch()) {
  $typeService=$data['type'];
  $idpostal=$data['IDPostal'];

  }
  if ($typeService=="gardecourrier") {
    $tS="garde du courrier";
  }
  elseif ($typeService=="posterestante") {
    $tS="poste restante";
  }
  $message=utf8_decode("Votre demande d'inscription au service de la ".$tS ." a etait validée.Pour plus d'informations, veuillez consulter la rubrique du service de la ".$tS);
  $req=$db->prepare('INSERT INTO notification (Type, Date, Contenu, UID)
                      VALUES(:Type, :Date, :Contenu, :UID)');
$req->execute(array(

  'Type'=> $typeService,
  'Date'=>$date,
  'Contenu'=>$message,
  'UID'=>$uid

));
$NID=getNID($typeService,$date,$uid);
$re=$db->prepare('INSERT INTO lignenotification (IDPostal,NID)
                    VALUES(:IDPostal,:NID)');
$re->execute(array(
'IDPostal'=> $idpostal,
'NID'=>$NID
));
}
