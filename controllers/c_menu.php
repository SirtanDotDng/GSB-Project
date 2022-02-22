<?php

if(isset($_GET['a'])){
    $a=$_GET['a'];
}else{
    $a="";
}

switch ($a) {
    
    case 'praticiens' :
        include('vues/v_praticiens.php');
        break;
    case 'lePraticien' :
        include('vues/v_lePraticien.php');
        break;
    case 'medicaments' :
        include('vues/v_medicaments.php');
        break;
  	case 'leMedicament' :
    	include('vues/v_leMedicament.php');
    	break;
    case 'addMedicament' :
    	include('vues/v_addMedicament.php');
    	break;    
    case 'rapports' :
        include('vues/v_rapports.php');
        break;
    case 'addRapport' :
        include('vues/v_addRapport.php');
        break;
    case 'checkRapport' :
        include('vues/v_checkRapport.php');
        break;
  	case 'insertRapport' :
    	saisieRapport($_SESSION['matricule'],getNumRapport(),$_POST['rapDate'],$_POST['rapBilan'],date("Y-m-d"),$_POST['rapEtat'],$_POST['praNum'] ,$_POST['medDepotLeg'],$_POST['medDepotLeg2'],$_POST['idMotif'],$_POST['motifAutre'],$_POST['remplacant']);
    	if(isset($_POST['echantillon']) && isset($_POST['qte'])){
          saisieEchantillon($_POST['echantillon'],$_POST['praNum'],getNumRapport(),$_POST['qte']);
        }
    	include('vues/v_insertRapport.php');
    	break;
    default :
        include('vues/v_accueil.php');
        break;
}

?>