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
    case 'addRapport' :
        include('vues/v_addRapport.php');
        break;
    case 'checkRapport' :
    	if(isset($_POST['date1']) || isset($_POST['date2'])){
          include('vues/v_checkRapportDate.php');
        }else{
          include('vues/v_checkRapport.php');
        }
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