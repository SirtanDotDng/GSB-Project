<?php

require('bd/bd.php');

function login($mail, $pass) {
    
    $monPdo = connexionPDO();
    $req="SELECT IdCompte, Mail, password, ID_Type, COL_MATRICULE FROM compte WHERE Mail = ? AND password = ?";  
    $query = $monPdo->prepare($req);
    $query->execute(array($mail, $pass));
    $res=$query->fetchAll();
    if($res){
      	$_SESSION['id'] = $res[0][0];
        $_SESSION['mail'] = $mail;
      	$_SESSION['grade'] = $res[0][3];
      	$_SESSION['matricule'] = $res[0][4];
        echo "<script>location.href='http://gsb.mattatyalexis.fr/?c=menu';</script>";
    }else{
       echo "<script>location.href='http://gsb.mattatyalexis.fr/?c=compte&a=formConnexion&x=erreur';</script>";
        deconnexion();
    }
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
  $req="INSERT INTO offrir (MED_DEPOTLEGAL, PRA_NUM, rap_num, OFF_QTE) VALUES (?,?,?,?)";
  $query=$monPdo->prepare($req);
  $query->execute(array($medDepotLeg, $praNum, $rapNum, $qte));
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

function getLesRapportsDate($date1, $date2) {
  try
  {
  $monPdo = connexionPDO();
  if(isset($_POST['idPra']) && $_POST['idPra'] != 'aucun'){
    $req="SELECT COL_MATRICULE, rap_num, rap_date, RAP_BILAN, RAP_saisie_date, RAP_ETAT, PRA_NUM, MED_DEPOTLEGAL, MED_DEPOTLEGAL_2, ID_motif, motif_Autre, PRA_NUM_PRATICIEN FROM rapport_visite WHERE COL_MATRICULE = ? AND RAP_saisie_date >= ? AND RAP_saisie_date <= ? AND PRA_NUM = ?";
  	$query=$monPdo->prepare($req);
  	$query->execute(array($_SESSION['matricule'], $date1, $date2, $_POST['idPra']));
  }else{
  	$req="SELECT COL_MATRICULE, rap_num, rap_date, RAP_BILAN, RAP_saisie_date, RAP_ETAT, PRA_NUM, MED_DEPOTLEGAL, MED_DEPOTLEGAL_2, ID_motif, motif_Autre, PRA_NUM_PRATICIEN FROM rapport_visite WHERE COL_MATRICULE = ? AND RAP_saisie_date >= ? AND RAP_saisie_date <= ?";
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