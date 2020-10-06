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
  $req->execute(array($username,$password,"superviseur"));
  $user=$req->fetch();
  if ($user) {
    return true;
  }
  else {
    return false;
  }

}

function DemandeNonConfirm($user)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande p INNER JOIN bureauposte b ON p.CodePostal=b.CodePostal INNER JOIN upw w ON w.IDW=b.IDW WHERE p.Etat=? AND w.IDW=?");
  $req->execute(array('0',getIDW(getUID($user, getPassWord($user))) ));
  $user=$req->fetch();
  return $user[0];
}
function DemandeConfirm($user)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande p INNER JOIN bureauposte b ON p.CodePostal=b.CodePostal INNER JOIN upw w ON w.IDW=b.IDW WHERE p.Etat=? AND w.IDW=?");
  $req->execute(array('1',getIDW(getUID($user, getPassWord($user))) ));
  $user=$req->fetch();
  return $user[0];
}
function DemandeTotal($user)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM demande p INNER JOIN bureauposte b ON p.CodePostal=b.CodePostal INNER JOIN upw w ON w.IDW=b.IDW WHERE w.IDW=?");
  $req->execute(array(getIDW(getUID($user, getPassWord($user))) ));
  $user=$req->fetch();
  return $user[0];
}
function Reexpedition($user)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM servicepostal s INNER JOIN client c ON s.IDPostal=c.IDPostal INNER JOIN demande d ON d.IDPostal=c.IDPostal INNER JOIN bureauposte b ON d.CodePostal=b.CodePostal WHERE b.IDW=? AND s.type=?");
  $req->execute(array(getIDW(getUID($user, getPassWord($user))),"reexpedition"));
  $user=$req->fetch();
  return $user[0];
}
function PosteRestante($user)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM servicepostal s INNER JOIN client c ON s.IDPostal=c.IDPostal INNER JOIN demande d ON d.IDPostal=c.IDPostal INNER JOIN bureauposte b ON d.CodePostal=b.CodePostal WHERE b.IDW=? AND s.type=?");
  $req->execute(array(getIDW(getUID($user, getPassWord($user))),"posterestante"));
  $user=$req->fetch();
  return $user[0];
}
function GardeCourrier($user)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM servicepostal s INNER JOIN client c ON s.IDPostal=c.IDPostal INNER JOIN demande d ON d.IDPostal=c.IDPostal INNER JOIN bureauposte b ON d.CodePostal=b.CodePostal WHERE b.IDW=? AND s.type=?");
  $req->execute(array(getIDW(getUID($user, getPassWord($user))),"gardecourrier"));
  $user=$req->fetch();
  return $user[0];
}
function StatEntreprise($user)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal INNER JOIN bureauposte b ON b.CodePostal=d.CodePostal WHERE b.IDW=? AND c.Type=?");
  $req->execute(array(getIDW(getUID($user, getPassWord($user))),"entreprise"));
  $user=$req->fetch();
  return $user[0];
}
function StatPersonne($user)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT COUNT(*) FROM client c INNER JOIN demande d ON c.IDPostal=d.IDPostal INNER JOIN bureauposte b ON b.CodePostal=d.CodePostal WHERE b.IDW=? AND c.Type=?");
  $req->execute(array(getIDW(getUID($user, getPassWord($user))),"personne"));
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
function getIDW($UID)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT IDW FROM utilisateur WHERE UID= ?");
  $req->execute(array($UID));
  $res=$req->fetch();
  return $res[0];
}
function getWilaya($idw)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT NomWilaya FROM upw WHERE IDW= ?");
  $req->execute(array($idw));
  $res=$req->fetch();
  return $res[0];
}
function AjouterNotificationSuperviseur($region, $sexe, $ageMin, $ageMax,$uid, $typepersonne,$typenotification, $message, $date)
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
function getListeBP($IDW)
{
  $db=dbConnect();
  $req = $db->prepare("SELECT b.CodePostal, b.NomBureau, sum(Etat) as nb1,(count(Etat)-sum(Etat))  as nb0
FROM upw i INNER JOIN bureauposte b
On b.IDW=i.IDW
LEFT JOIN demande d
ON d.CodePostal=b.CodePostal
WHERE i.idw=?
GROUP BY NomBureau");
  $req->execute(array($IDW));
  return $req;
}
////////////////////////////////////////////////////////////////////
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
