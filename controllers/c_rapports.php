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
        if(isset($_POST['echantillon1']) && isset($_POST['qte'])){
            saisieEchantillon($_POST['echantillon1'],$_SESSION['matricule'],(getNumRapport()-1),$_POST['qte']);
            echo $_POST['echantillon1'];
            echo $_POST['echantillon2'];
        }
        include('vues/v_insertRapport.php');
    	break;
    case 'valideRapport' :
        include('vues/v_valideRapport.php');
        break;
    default :
        include('vues/v_accueil.php');
        break;
}

?>