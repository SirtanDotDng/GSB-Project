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
    	include('vues/v_leRapport.php');
    	break;
    case 'leRapportD' :
    	include('vues/v_leRapportD.php');
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
                saisieRapport($_SESSION['matricule'],getNumRapport(),$_POST['rapDate'] ,$_POST['rapBilan'],date("Y-m-d"), $_POST['rapEtat'],$_POST['praNum'] ,$_POST['medDepotLeg'],$_POST['medDepotLeg2'],$_POST['idMotif'],$_POST['motifAutre'],$_POST['remplacant']);
                if(isset($_POST['echantillon']) && isset($_POST['qte'])){
                saisieEchantillon($_POST['echantillon'],$_POST['praNum'],getNumRapport(),$_POST['qte']);
                }
            }else{
                $rapEtat = 0;
                SaisieRapport($_SESSION['matricule'],getNumRapport(),$_POST['rapDate'] ,$_POST['rapBilan'],date("Y-m-d"), $rapEtat ,$_POST['praNum'] ,$_POST['medDepotLeg'],$_POST['medDepotLeg2'],$_POST['idMotif'],$_POST['motifAutre'],$_POST['remplacant']);
                if(isset($_POST['echantillon']) && isset($_POST['qte'])){
                SaisieEchantillon($_POST['echantillon'],$_POST['praNum'],getNumRapport(),$_POST['qte']);
                }
            }
    	include('vues/v_insertRapport.php');
    	break;
    default :
        include('vues/v_accueil.php');
        break;
}

?>