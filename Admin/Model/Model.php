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
function login($username, $password, $type)
{
  $db=dbConnect();
  $req = $db->prepare('SELECT * FROM utilisateur WHERE username = ? AND password = ? AND type= ?');
  $req->execute(array($username,$password,$type));
  $user=$req->fetch();
  if ($user) {
    return true;
  }
  else {
    return false;
  }

}
function DemandeNonConfirm()
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande WHERE Etat=?");
  $req->execute(array('0'));
  $user=$req->fetch();
  return $user[0];
}
function DemandeConfirm()
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande WHERE Etat=?");
  $req->execute(array('1'));
  $user=$req->fetch();
  return $user[0];
}
function DemandeTotal()
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande");
  $req->execute();
  $user=$req->fetch();
  return $user[0];
}
function TableWilaya()
{
  $db=dbConnect();
  $req = $db->prepare("SELECT upw.IDW, upw.NomWilaya,  FROM demande");
  $req->execute(array('1'));
  $user=$req->fetch();

}
function Reexpedition()
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM servicepostal WHERE type = ?");
  $req->execute(array("reexpedition"));
  $user=$req->fetch();
  return $user[0];
}
function PosteRestante()
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM servicepostal WHERE type = ?");
  $req->execute(array("posterestante"));
  $user=$req->fetch();
  return $user[0];
}
function GardeCourrier()
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM servicepostal WHERE type = ?");
  $req->execute(array("gardecourrier"));
  $user=$req->fetch();
  return $user[0];
}

function StatEntreprise()
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM client WHERE Type = ?");
  $req->execute(array("entreprise"));
  $user=$req->fetch();
  return $user[0];
}
function StatPersonne()
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM client WHERE Type = ?");
  $req->execute(array("personne"));
  $user=$req->fetch();
  return $user[0];
}
/////////////////////////////////////////////////////////////////////////////////////
function entreprise($IDW) //elle retourne la liste des IDPostal des entreprise avec filtre Wilaya
{
  $db=dbConnect();
  if ($IDW==0) {
    $req = $db->prepare("SELECT * FROM client WHERE Type=?");
    $req->execute(array("entreprise"));
  }
  else {
    $req = $db->prepare("SELECT * FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal INNER JOIN bureauposte b ON b.CodePostal=d.CodePostal WHERE c.Type=? AND b.IDW=?");
    $req->execute(array("entreprise",$IDW));
  }

 return $req;
}
/////////////////////////////////////////////////////////////////////////////////////
function personne($ageMin, $ageMax,$sexe, $IDW)  //elle retourne la liste des IDPostal des personnes avec filtre Wilaya, sexe, age
{
  $db=dbConnect();
  if ($IDW==0) {
    if ($sexe=='h&f') {
      $req = $db->prepare("SELECT * FROM client WHERE Type=? AND DateNaissance >= NOW() - INTERVAL ? YEAR AND DateNaissance <= NOW() - INTERVAL ? YEAR");
      $req->execute(array("personne",$ageMax,$ageMin));
    }
    else {
      if ($sexe=='h') {
        $req = $db->prepare("SELECT * FROM client WHERE Type=? AND Sexe=? AND DateNaissance >= NOW() - INTERVAL ? YEAR AND DateNaissance <= NOW() - INTERVAL ? YEAR");
        $req->execute(array("personne",'homme',$ageMax,$ageMin));
      }
      if ($sexe=='f') {
        $req = $db->prepare("SELECT * FROM client WHERE Type=? AND Sexe=? AND DateNaissance >= NOW() - INTERVAL ? YEAR AND DateNaissance <= NOW() - INTERVAL ? YEAR");
        $req->execute(array("personne",'femme',$ageMax,$ageMin));
      }

    }

  }
  else {
    if ($sexe=='h&f') {
      $req = $db->prepare("SELECT * FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal INNER JOIN bureauposte b ON b.CodePostal=d.CodePostal WHERE c.Type=? AND b.IDW=? AND c.DateNaissance >= NOW() - INTERVAL ? YEAR AND c.DateNaissance <= NOW() - INTERVAL ? YEAR");
      $req->execute(array("personne",$IDW,$ageMax,$ageMin));
    }
    else {
      if ($sexe=='h') {
        $req = $db->prepare("SELECT * FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal INNER JOIN bureauposte b ON b.CodePostal=d.CodePostal WHERE c.Type=? AND c.Sexe=? AND b.IDW=? AND c.DateNaissance >= NOW() - INTERVAL ? YEAR AND c.DateNaissance <= NOW() - INTERVAL ? YEAR");
        $req->execute(array("personne",'homme',$IDW,$ageMax,$ageMin));
      }
      if ($sexe=='f') {
        $req = $db->prepare("SELECT * FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal INNER JOIN bureauposte b ON b.CodePostal=d.CodePostal WHERE c.Type=? AND c.Sexe=? AND b.IDW=? AND c.DateNaissance >= NOW() - INTERVAL ? YEAR AND c.DateNaissance <= NOW() - INTERVAL ? YEAR");
        $req->execute(array("personne",'femme',$IDW,$ageMax,$ageMin));
      }

    }

  }

  return $req;
}
/////////////////////////////////////////////////////////////////////////////////////
function ListeUtilisateur()
{
  $db=dbConnect();
  $req = $db->query("SELECT * FROM utilisateur ORDER BY UID ");
  return $req;
}
function SupprimerCompte($uid)
{
  $db=dbConnect();
  $req = $db->prepare("DELETE FROM utilisateur WHERE UID = ?");
  $req->execute(array($uid));
  return $req;
}
function ModifierCompte( $uid, $username, $type,$lastname, $firstname, $password)
{
  $db=dbConnect();
  $req = $db->prepare('UPDATE utilisateur SET username=? , Nom= ? , Prenom= ? , Type = ? , password=? WHERE UID = ?');
  $req->execute(array($username, $lastname, $firstname,$type, $password, $uid));
  return $req;
}
function AjouterCompte ($username, $lastname, $firstname, $type, $password, $wilaya, $codePostal)
{
  $db=dbConnect();
  $req=$db->prepare('INSERT INTO utilisateur (username, Nom, Prenom, Type, password, IDW, CodePostal)
                      VALUES(:username,:Nom,:Prenom,:Type,:password, :IDW, :CodePostal)');
$req->execute(array(
  'username'=> $username,
  'Nom'=>$lastname,
  'Prenom'=>$firstname,
  'Type'=>$type,
  'password'=>$password,
  'IDW'=>$wilaya,
  'CodePostal'=>$codePostal,
));
  return $req;
}
///////////////////////////////////////////////////////////////////////////////////
function ListeWilaya()
{
$db=dbConnect();
$req = $db->query("SELECT u.IDW, u.NomWilaya, v0.c0, v1.c1 FROM upw u LEFT JOIN vue_0 v0 ON u.IDW= v0.IDW LEFT JOIN vue_1 v1 ON v1.IDW= u.IDW");

  return $req;
}
/////////////////////////////////////////////////////////////////////////////////

function age($date)
{

  $age = (time() - strtotime($date)) / 3600 / 24 / 365;
  $age=round($age,0);
  return $age;

}

function getNID($typenotification,$date,$uid)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT MAX(NID) FROM notification WHERE Type=? AND Date=? AND UID=?");
  $req->execute(array($typenotification,$date,$uid));
  $user=$req->fetch();
  return $user[0];
}
function AjouterLigneNotification($NID,$Client)
{
  $db=dbConnect();
  $req=$db->prepare('INSERT INTO lignenotification (IDPostal, NID)
                      VALUES(:IDPostal, :NID)');
$req->execute(array(

  'IDPostal'=> $Client,
  'NID'=>$NID

));
  return $req;
}

function AjouterNotificationAdmin($region, $sexe, $ageMin, $ageMax,$uid, $typepersonne,$typenotification, $message, $date)
{
  $db=dbConnect();
  $req=$db->prepare('INSERT INTO notification (Type, Date, Contenu, UID, AgeMin, AgeMax, Sexe, Wilaya, TypeVise)
                      VALUES(:Type, :Date, :Contenu, :UID, :AgeMin, :AgeMax, :Sexe, :Wilaya, :TypeVise)');
$req->execute(array(

  'Type'=> $typenotification,
  'Date'=>$date,
  'Contenu'=>$message,
  'UID'=>$uid,
  'AgeMin'=>$ageMin,
  'AgeMax'=>$ageMax,
  'Sexe'=>$sexe,
  'Wilaya'=>$region,
  'TypeVise'=>$typepersonne

));
  return $req;
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
