<?php

if(isset($_GET['a'])){
    $a=$_GET['a'];
}else{
    $a="";
}

switch ($a) {
    case 'rapports' :
        include('vues/v_rapports.php');
        break;
  	case 'leRapport' :
        $infoRap = array("Matricule :","Date du rapport :","Bilan :","Date de saisie :","Etat :","Praticien visité :","Médicament(s) présenté(s) :","Motif de la visite :","Autre motif :","Remplacant :");
        $lesRapports = array();
        $rapports = getLesRapports();
        $medicamentRapportSix = getLeMed($rapports[$_GET['rap']-1]['MED_DEPOTLEGAL']);
        $medicamentRapportSeven = getLeMed($rapports[$_GET['rap']-1]['MED_DEPOTLEGAL_2']);
        $praticien = getLePra($rapports[$_GET['rap']-1]['PRA_NUM'])[0];
    	include('vues/v_leRapport.php');
    	break;
    case 'leRapportD' :
        $infoRap = array("Matricule :","Date du rapport :","Bilan :","Date de saisie :","Etat :","Praticien visité :","Médicament(s) présenté(s) :","Motif de la visite :","Autre motif :","Remplacant :");
    	$colRapports = getLesRapportsCol($_GET['mat'])[$_GET['rap']-1];
        $medicamentColRapports = getLeMed($colRapports['MED_DEPOTLEGAL'])[0]['Nom commercial'];
        $medicament2ColRapports = getLeMed(getLesRapports()[$_GET['rap']-1]['MED_DEPOTLEGAL_2'])[0]['Nom commercial'];
        $praticien = getLePra($colRapports['PRA_NUM'])[0];
        include('vues/v_leRapportD.php');
    	break;
    case 'leRapportNouveau' :
        $infoRap = array("Matricule :","Date du rapport :","Date de saisie :","Numéro du praticien visité :");
        $lesRapports = array();
        $newRapports = getLesRapportsNouveaux();
    	include('vues/v_leRapportNouveau.php');
    	break;
    case 'addRapport' :
        $praticiens = getListePra();
        $medicaments = getListeMed();
        include('vues/v_addRapport.php');
        break;
    case 'modifierLeRapport' :
        $leRapport = getLeRapportAttente($_GET['rap']);

        $matricule =    $leRapport[0]["COL_MATRICULE"];
        $rapport =      $leRapport[0]["rap_num"];
        $date =         $leRapport[0]["rap_date"];
        $bilan =        $leRapport[0]["RAP_BILAN"];
        $saisie =       $leRapport[0]["RAP_saisie_date"];
        $etat =         $leRapport[0]["RAP_ETAT"];
        $praticien =    $leRapport[0]["PRA_NUM"];
        $medicament1 =  $leRapport[0]["MED_DEPOTLEGAL"];
        $medicament2 =  $leRapport[0]["MED_DEPOTLEGAL_2"];
        $motif =        $leRapport[0]["ID_motif"];
        $autreMotif =   $leRapport[0]["motif_Autre"];
        $remplacant =   $leRapport[0]["PRA_NUM_PRATICIEN"];

        $praticiens = getListePra();
        $medicaments = getListeMed();
        $nbEchantillons = getNbEchantillon($rapport);
        include('vues/v_modifierLeRapport.php');
        break;
    case 'modifyRapports' :
        $infoRap = array("Matricule :","Date du rapport :","Date de saisie :","Numéro du praticien visité :");

        $lesRapportsAttente = getLesRapportsAttente();
        $lesRapports = array();
        include('vues/v_rapportAttente.php');
        break;
    case 'checkRapportSearch' :
        $listePra = getListePraRap();
    	include('vues/v_checkRapportSearch.php');
    	break;
    case 'checkRapportNouveaux' :
        $infoRap = array("Matricule :","Date du rapport :","Date de saisie :","Numéro du praticien visité :");

        $newRapports = getLesRapportsNouveaux();
        $lesRapports = array();
        $lesRapports[0] = $newRapports[1]['COL_MATRICULE'];
        $lesRapports[1] = $newRapports[2]['rap_date'];
        $lesRapports[2] = $newRapports[3]['RAP_saisie_date'];
        $lesRapports[3] = $newRapports[4]['PRA_NUM'];
    	include('vues/v_checkRapportNouveaux.php');
    	break;
    case 'checkRapportSearchD' :
        $listeColReg = getListeColReg();
    	include('vues/v_checkRapportSearchD.php');
    	break;
    case 'checkRapport' :
        $listePra = getListePraRap();
        $infoRap = array("Matricule :","Date du rapport :","Date de saisie :","Numéro du praticien visité :");
        if(isset($_POST['date1']) && $_POST['date1'] != ""){
            $date1 = $_POST['date1'];
          }else{
            $date1 = date("Y-m-d", strtotime("-7 years"));
          }
          if(isset($_POST['date2']) && $_POST['date2'] != ""){
            $date2 = $_POST['date2'];
          }else{
            $date2 = date('Y-m-d');
          }
          $rapportsDate = getLesRapportsDate($date1, $date2);
          $lesRapports = array();
        include('vues/v_checkRapportDate.php');
        break;
    case 'checkRapportD' :
        $listePra = getListePraRap();
        $infoRap = array("Matricule :","Date du rapport :","Date de saisie :","Numéro du praticien visité :");
        if(isset($_POST['date1']) && $_POST['date1'] != ""){
            $date1 = $_POST['date1'];
          }else{
            $date1 = date("Y-m-d", strtotime("-7 years"));
          }
          if(isset($_POST['date2']) && $_POST['date2'] != ""){
            $date2 = $_POST['date2'];
          }else{
            $date2 = date('Y-m-d');
          }
          $lesRapports = array();
          $rapportsDateD = getLesRapportsDateD($date1, $date2);
        include('vues/v_checkRapportDateD.php');
        break;
    case 'insertRapport' :
        if(isset($_POST['rapEtat'])){
            $rapEtat = 1;
        }else{
            $rapEtat = 0;
        }
        saisieRapport($_SESSION['matricule'],getNumRapport(),$_POST['rapDate'] ,$_POST['rapBilan'],date("Y-m-d"), $rapEtat, $_POST['praNum'] ,$_POST['medDepotLeg'],$_POST['medDepotLeg2'],$_POST['idMotif'],$_POST['motifAutre'],$_POST['remplacant']);
        if(isset($_POST['echantillon1']) && isset($_POST['qte1'])){
            saisieEchantillon($_POST['echantillon1'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte1']);
        }
        if(isset($_POST['echantillon2']) && isset($_POST['qte2'])){
            saisieEchantillon($_POST['echantillon2'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte2']);
        }
        if(isset($_POST['echantillon3']) && isset($_POST['qte3'])){
            saisieEchantillon($_POST['echantillon3'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte3']);
        }
        if(isset($_POST['echantillon4']) && isset($_POST['qte4'])){
            saisieEchantillon($_POST['echantillon4'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte4']);
        }
        if(isset($_POST['echantillon5']) && isset($_POST['qte5'])){
            saisieEchantillon($_POST['echantillon5'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte5']);
        }
        if(isset($_POST['echantillon6']) && isset($_POST['qte6'])){
            saisieEchantillon($_POST['echantillon6'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte6']);
        }
        if(isset($_POST['echantillon7']) && isset($_POST['qte7'])){
            saisieEchantillon($_POST['echantillon7'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte7']);
        }
        if(isset($_POST['echantillon8']) && isset($_POST['qte8'])){
            saisieEchantillon($_POST['echantillon8'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte8']);
        }
        if(isset($_POST['echantillon9']) && isset($_POST['qte9'])){
            saisieEchantillon($_POST['echantillon9'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte9']);
        }
        if(isset($_POST['echantillon10']) && isset($_POST['qte10'])){
            saisieEchantillon($_POST['echantillon10'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte10']);
        }
        include('vues/v_insertRapport.php');
    	break;
    case 'valideRapport' :
        setRapportValide($_GET['mat'], $_GET['rap']);
        include('vues/v_valideRapport.php');
        break;
    case 'updateRapport' :
    	echo "maisquoiiiiiii".$_POST['medDepotLeg'];
        if(isset($_POST['rapEtat'])){
            $rapEtat = 1;
        }else{
            $rapEtat = 0;
        }
        editRapport($_POST['rapDate'], $_POST['rapBilan'], date("Y-m-d"), $rapEtat, $_POST['praNum'] , $_POST['medDepotLeg'], $_POST['medDepotLeg2'], $_POST['idMotif'], $_POST['motifAutre'], $_POST['remplacant'], $_SESSION['matricule'],$_GET['rap']);
        
        delEchantillon($_SESSION['matricule'], $_GET['rap']);
        
        if(isset($_POST['echantillon1']) && isset($_POST['qte1'])){
            saisieEchantillon($_POST['echantillon1'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte1']);
        }
        if(isset($_POST['echantillon2']) && isset($_POST['qte2'])){
            saisieEchantillon($_POST['echantillon2'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte2']);
        }
        if(isset($_POST['echantillon3']) && isset($_POST['qte3'])){
            saisieEchantillon($_POST['echantillon3'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte3']);
        }
        if(isset($_POST['echantillon4']) && isset($_POST['qte4'])){
            saisieEchantillon($_POST['echantillon4'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte4']);
        }
        if(isset($_POST['echantillon5']) && isset($_POST['qte5'])){
            saisieEchantillon($_POST['echantillon5'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte5']);
        }
        if(isset($_POST['echantillon6']) && isset($_POST['qte6'])){
            saisieEchantillon($_POST['echantillon6'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte6']);
        }
        if(isset($_POST['echantillon7']) && isset($_POST['qte7'])){
            saisieEchantillon($_POST['echantillon7'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte7']);
        }
        if(isset($_POST['echantillon8']) && isset($_POST['qte8'])){
            saisieEchantillon($_POST['echantillon8'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte8']);
        }
        if(isset($_POST['echantillon9']) && isset($_POST['qte9'])){
            saisieEchantillon($_POST['echantillon9'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte9']);
        }
        if(isset($_POST['echantillon10']) && isset($_POST['qte10'])){
            saisieEchantillon($_POST['echantillon10'],$_SESSION['matricule'],$_GET['rap'],$_POST['qte10']);
        }
        include('vues/v_insertRapport.php');
    	break;
  default :
        include('vues/v_accueil.php');
        break;
}

?>