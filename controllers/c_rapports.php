<?php

if(isset($_GET['a'])){
    $a=$_GET['a'];
}else{
    $a="";
}

switch ($a) {
    case 'test' :
        include('vues/v_test.php');
        break;
    case 'rapports' :
        include('vues/v_rapports.php');
        break;
  	case 'leRapport' :
    	include('vues/v_leRapport.php');
    	break;
    case 'leRapportD' :
    	include('vues/v_leRapportD.php');
    	break;
    case 'leRapportNouveau' :
    	include('vues/v_leRapportNouveau.php');
    	break;
    case 'addRapport' :
        include('vues/v_addRapport.php');
        break;
    case 'modifierLeRapport' :
        include('vues/v_modifierLeRapport.php');
        break;
    case 'modifyRapports' :
        include('vues/v_rapportAttente.php');
        break;
    case 'checkRapportSearch' :
    	include('vues/v_checkRapportSearch.php');
    	break;
    case 'checkRapportNouveaux' :
    	include('vues/v_checkRapportNouveaux.php');
    	break;
    case 'checkRapportSearchD' :
    	include('vues/v_checkRapportSearchD.php');
    	break;
    case 'checkRapport' :
        include('vues/v_checkRapportDate.php');
        break;
    case 'checkRapportD' :
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
        include('vues/v_valideRapport.php');
        break;
    case 'updateRapport' :
        if(isset($_POST['rapEtat'])){
            $rapEtat = 1;
        }else{
            $rapEtat = 0;
        }
        editRapport($_POST['rapDate'], $_POST['rapBilan'],date("Y-m-d"), $rapEtat, $_POST['praNum'] ,$_POST['medDepotLeg'],$_POST['medDepotLeg2'],$_POST['idMotif'],$_POST['motifAutre'],$_POST['remplacant'], $_SESSION['matricule'],$_GET['rap']);
        
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