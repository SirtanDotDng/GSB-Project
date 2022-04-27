<?php

require('bd/bd.php');

function register($username, $password, $mail, $matricule, $type) {
  
  $hash = md5($mail).md5($password);

  $monPdo = connexionPDO();
  $req="INSERT INTO compte (username, password, Mail, COL_MATRICULE, ID_Type) VALUES (?,?,?,?,?)";  
  $query = $monPdo->prepare($req);
  $query->execute(array($username, $hash, $mail, $matricule, $type));
      echo "<script>location.href='http://gsb.mattatyalexis.fr/?c=menu';</script>";
}

function changePassword($mail, $newpassword) {
  
  $hash = md5($mail).md5($newpassword);

  $monPdo = connexionPDO();
  $req="UPDATE compte SET password = ? WHERE Mail = ?";  
  $query = $monPdo->prepare($req);
  $query->execute(array($hash, $mail));
}

function login($mail, $password) {

    $monPdo = connexionPDO();
    $req="SELECT IdCompte, Mail, ID_Type, COL_MATRICULE FROM compte WHERE Mail = ? AND password = ?";  
    $query = $monPdo->prepare($req);
    $query->execute(array($mail, md5($mail).md5($password)));
    $res=$query->fetchAll();
    if($res){
      $_SESSION['id'] = $res[0][0];
      $_SESSION['mail'] = $mail;
      $_SESSION['grade'] = $res[0][2];
      $_SESSION['matricule'] = $res[0][3];
      echo "<script>location.href='http://gsb.mattatyalexis.fr/?c=menu';</script>";
    }
    else{
      echo "<script>location.href='http://gsb.mattatyalexis.fr/?c=compte&a=formConnexion&x=erreur';</script>";
      deconnexion();
    }
}

function getPassword($mail) {

  $monPdo = connexionPDO();
  $req="SELECT password FROM compte WHERE Mail = ?";  
  $query = $monPdo->prepare($req);
  $query->execute(array($mail));
  $res=$query->fetchAll();
  return $res;

}

function getListeMed() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT MED_DEPOTLEGAL as 'idMed', MED_NOMCOMMERCIAL as 'Nom commercial' FROM medicament ORDER BY MED_NOMCOMMERCIAL";
  $res = $monPdo->query($req);
  $lesLignes=$res->fetchAll();
  return $lesLignes;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLeMed($idMed) {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT MED_DEPOTLEGAL as 'idMed', MED_NOMCOMMERCIAL as 'Nom commercial', MED_COMPOSITION as 'Composition', MED_CONTREINDIC as 'Contreindication', MED_EFFETS as 'Effets', MED_PRIXECHANTILLON as 'Prix' FROM medicament WHERE MED_DEPOTLEGAL = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($idMed));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getListeColReg() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT collaborateur.COL_NOM, collaborateur.COL_PRENOM, collaborateur.COL_MATRICULE FROM `collaborateur` INNER JOIN travailler ON travailler.COL_MATRICULE = collaborateur.COL_MATRICULE WHERE travailler.REG_CODE = (SELECT REG_CODE FROM travailler WHERE COL_MATRICULE = ? GROUP BY COL_MATRICULE) GROUP BY collaborateur.COL_MATRICULE";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule']));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getListePra() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT PRA_NUM as 'idPra', PRA_NOM as 'Nom', PRA_PRENOM as 'Prenom' FROM praticien ORDER BY PRA_NOM";
  $res = $monPdo->query($req);
  $lesLignes=$res->fetchAll();
  return $lesLignes;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getListePraRap() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT praticien.PRA_NOM, praticien.PRA_PRENOM, praticien.PRA_NUM FROM `praticien` INNER JOIN rapport_visite ON praticien.PRA_NUM = rapport_visite.PRA_NUM WHERE COL_MATRICULE = ? GROUP BY rapport_visite.PRA_NUM";
  $query = $monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule']));
  $lesLignes=$query->fetchAll();
  return $lesLignes;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLePra($idPra) {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT PRA_NUM, PRA_CODE, PRA_NOM, PRA_PRENOM, PRA_ADRESSE, PRA_CP, PRA_VILLE, PRA_COEFNOTORIETE, PRA_COEFConfiance, TYP_CODE FROM praticien WHERE PRA_NUM = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($idPra));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getNumRapport() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT (COUNT(rap_num)+1) FROM rapport_visite WHERE COL_MATRICULE = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule']));
  $res=$query->fetchAll();
  return $res[0][0];
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function saisieRapport($colMat, $rapNum, $rapDate, $rapBilan, $rapSaisieDate, $rapEtat, $praNum, $medDepotLeg, $medDepotLeg2, $idMotif, $motifAutre, $remplacant) {
  try
    {
    $monPdo = connexionPDO();
    $req="INSERT INTO rapport_visite (COL_MATRICULE, rap_num, rap_date, RAP_BILAN, RAP_saisie_date, RAP_ETAT, PRA_NUM, MED_DEPOTLEGAL, MED_DEPOTLEGAL_2, ID_motif, motif_Autre, PRA_NUM_PRATICIEN) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $query=$monPdo->prepare($req);
    $query->execute(array($colMat, $rapNum, $rapDate, $rapBilan, $rapSaisieDate, $rapEtat, $praNum, ($medDepotLeg == "")? NULL : $medDepotLeg, ($medDepotLeg2 == "")? NULL : $medDepotLeg2, ($idMotif == "")? NULL : $idMotif, ($motifAutre == "")? NULL : $motifAutre, ($remplacant == "")? NULL : $remplacant));
    $mes="Le rapport a bien été enregistré, vous pourrez le voir en retournant sur la page 'consulter mes rapports'";
    }
  catch (PDOException $e)
    {
    $mes="Une erreur s'est produite pendant l'enregistrement du rapport, veuillez réessayer plus tard";
    print "Erreur !: " . $e-getMessage();
    die();
    }
  return($mes);
}


function saisieEchantillon($medDepotLeg, $praNum, $rapNum, $qte) {
  try
  {
  $monPdo = connexionPDO();
  $req="INSERT INTO offrir (MED_DEPOTLEGAL, COL_MAT, rap_num, OFF_QTE) VALUES (?,?,?,?)";
  $query=$monPdo->prepare($req);
  $query->execute(array($medDepotLeg, $praNum, $rapNum, $qte));
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getNbEchantillon($rapport) {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT COUNT(*) FROM offrir WHERE rap_num = ? AND COL_MAT = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($rapport, $_SESSION['matricule']));
  $res=$query->fetch();
  return $res[0][0];
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getEchantillon($rapport) {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT MED_DEPOTLEGAL, OFF_QTE FROM offrir WHERE COL_MAT = ? AND rap_num = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule'], $rapport));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getNumRapportAttente() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT (COUNT(rap_num)+1) FROM rapport_visite WHERE COL_MATRICULE = ? AND RAP_ETAT = 0";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule']));
  $res=$query->fetchAll();
  return $res[0][0];
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function setRapportValide($mat, $rap) {
  try
  {
  $monPdo = connexionPDO();
  $req="UPDATE rapport_visite SET RAP_NOUVEAU = '0' WHERE rapport_visite.COL_MATRICULE = ? AND rapport_visite.rap_num = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($mat, $rap));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLesRapports() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT COL_MATRICULE, rap_num, rap_date, RAP_BILAN, RAP_saisie_date, RAP_ETAT, PRA_NUM, MED_DEPOTLEGAL, MED_DEPOTLEGAL_2, ID_motif, motif_Autre, PRA_NUM_PRATICIEN FROM rapport_visite WHERE COL_MATRICULE = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule']));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLesRapportsAttente() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT COL_MATRICULE, rap_num, rap_date, RAP_BILAN, RAP_saisie_date, RAP_ETAT, PRA_NUM, MED_DEPOTLEGAL, MED_DEPOTLEGAL_2, ID_motif, motif_Autre, PRA_NUM_PRATICIEN FROM rapport_visite WHERE COL_MATRICULE = ? AND RAP_NOUVEAU = 1 ORDER BY rap_date";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule']));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLeRapportAttente($rap_num) {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT COL_MATRICULE, rap_num, rap_date, RAP_BILAN, RAP_saisie_date, RAP_ETAT, PRA_NUM, MED_DEPOTLEGAL, MED_DEPOTLEGAL_2, ID_motif, motif_Autre, PRA_NUM_PRATICIEN FROM rapport_visite WHERE COL_MATRICULE = ? AND RAP_NUM = ? AND RAP_ETAT = 0";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule'], $rap_num));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLesRapportsCol($col) {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT COL_MATRICULE, rap_num, rap_date, RAP_BILAN, RAP_saisie_date, RAP_ETAT, PRA_NUM, MED_DEPOTLEGAL, MED_DEPOTLEGAL_2, ID_motif, motif_Autre, PRA_NUM_PRATICIEN FROM rapport_visite WHERE COL_MATRICULE = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($col));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLesRapportsDate($date1, $date2) {
  try
  {
  $monPdo = connexionPDO();
  if(isset($_POST['idPra']) && $_POST['idPra'] != 'aucun'){
    $req="SELECT COL_MATRICULE, rap_num, rap_date, RAP_BILAN, RAP_saisie_date, RAP_ETAT, PRA_NUM, MED_DEPOTLEGAL, MED_DEPOTLEGAL_2, ID_motif, motif_Autre, PRA_NUM_PRATICIEN FROM rapport_visite WHERE COL_MATRICULE = ? AND RAP_saisie_date >= ? AND RAP_saisie_date <= ? AND PRA_NUM = ? ORDER BY rap_date";
  	$query=$monPdo->prepare($req);
  	$query->execute(array($_SESSION['matricule'], $date1, $date2, $_POST['idPra']));
  }else{
  	$req="SELECT COL_MATRICULE, rap_num, rap_date, RAP_BILAN, RAP_saisie_date, RAP_ETAT, PRA_NUM, MED_DEPOTLEGAL, MED_DEPOTLEGAL_2, ID_motif, motif_Autre, PRA_NUM_PRATICIEN FROM rapport_visite WHERE COL_MATRICULE = ? AND RAP_saisie_date >= ? AND RAP_saisie_date <= ? ORDER BY rap_date";
  	$query=$monPdo->prepare($req);
  	$query->execute(array($_SESSION['matricule'], $date1, $date2));
  }
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLesRapportsDateD($date1, $date2) {
  try
  {
  $monPdo = connexionPDO();
  if(isset($_POST['idCol']) && $_POST['idCol'] != 'aucun'){
    $req="SELECT rapport_visite.COL_MATRICULE, rapport_visite.rap_num, rapport_visite.rap_date, rapport_visite.RAP_BILAN, rapport_visite.RAP_saisie_date, rapport_visite.RAP_ETAT, rapport_visite.PRA_NUM, rapport_visite.MED_DEPOTLEGAL, rapport_visite.MED_DEPOTLEGAL_2, rapport_visite.ID_motif, rapport_visite.motif_Autre, rapport_visite.PRA_NUM_PRATICIEN FROM rapport_visite INNER JOIN travailler ON travailler.COL_MATRICULE = rapport_visite.COL_MATRICULE WHERE travailler.REG_CODE = (SELECT REG_CODE FROM travailler WHERE COL_MATRICULE = ? GROUP BY COL_MATRICULE) AND rapport_visite.RAP_saisie_date >= ? AND rapport_visite.RAP_saisie_date <= ? AND rapport_visite.COL_MATRICULE = ? GROUP BY rap_num, rapport_visite.COL_MATRICULE ORDER BY rapport_visite.rap_date";
  	$query=$monPdo->prepare($req);
  	$query->execute(array($_SESSION['matricule'], $date1, $date2, $_POST['idCol']));
  }else{
  	$req="SELECT rapport_visite.COL_MATRICULE, rapport_visite.rap_num, rapport_visite.rap_date, rapport_visite.RAP_BILAN, rapport_visite.RAP_saisie_date, rapport_visite.RAP_ETAT, rapport_visite.PRA_NUM, rapport_visite.MED_DEPOTLEGAL, rapport_visite.MED_DEPOTLEGAL_2, rapport_visite.ID_motif, rapport_visite.motif_Autre, rapport_visite.PRA_NUM_PRATICIEN FROM rapport_visite INNER JOIN travailler ON travailler.COL_MATRICULE = rapport_visite.COL_MATRICULE WHERE travailler.REG_CODE = (SELECT REG_CODE FROM travailler WHERE COL_MATRICULE = ? GROUP BY COL_MATRICULE) AND rapport_visite.RAP_saisie_date >= ? AND rapport_visite.RAP_saisie_date <= ? GROUP BY rap_num, rapport_visite.COL_MATRICULE ORDER BY rapport_visite.rap_date, rapport_visite.rap_num";
  	$query=$monPdo->prepare($req);
  	$query->execute(array($_SESSION['matricule'], $date1, $date2));
  }
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLesRapportsNouveaux() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT rapport_visite.COL_MATRICULE, rapport_visite.rap_num, rapport_visite.rap_date, rapport_visite.RAP_BILAN, rapport_visite.RAP_saisie_date, rapport_visite.RAP_ETAT, rapport_visite.PRA_NUM, rapport_visite.MED_DEPOTLEGAL, rapport_visite.MED_DEPOTLEGAL_2, rapport_visite.ID_motif, rapport_visite.motif_Autre, rapport_visite.PRA_NUM_PRATICIEN FROM rapport_visite INNER JOIN travailler ON travailler.COL_MATRICULE = rapport_visite.COL_MATRICULE WHERE travailler.REG_CODE = (SELECT REG_CODE FROM travailler WHERE COL_MATRICULE = ? GROUP BY COL_MATRICULE) AND RAP_NOUVEAU = 1 GROUP BY rap_num, rapport_visite.COL_MATRICULE ORDER BY rapport_visite.rap_date, rapport_visite.rap_num";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule']));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getLeGrade() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT Typ_lib FROM type WHERE ID_Type = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['grade']));
  $res=$query->fetchAll();
  return $res[0][0];
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function getInfoCol() {
  try
  {
  $monPdo = connexionPDO();
  $req="SELECT COL_MATRICULE, COL_NOM, COL_PRENOM, COL_ADRESSE, COL_CP, COL_VILLE, COL_DATEEMBAUCHE, SEC_CODE FROM collaborateur WHERE COL_MATRICULE = ?";
  $query=$monPdo->prepare($req);
  $query->execute(array($_SESSION['matricule']));
  $res=$query->fetchAll();
  return $res;
  }
  catch (PDOException $e)
  {
  print "Erreur !: " . $e-getMessage();
  die();
  }
}

function isConnected() {

    $connected = false;
    if(isset($_SESSION['id'])){
        $connected = true;
    }
    return $connected;
}

function deconnexion() {

    session_unset();
    session_destroy();
    echo "<script>location.href='http://gsb.mattatyalexis.fr';</script>";
}

?>