<?php

if(isset($_GET['a'])){
    $a=$_GET['a'];
}else{
    $a="";
}
switch ($a) {
    
    case 'praticiens' :
        $praticiens = getListePra();
        include('vues/v_praticiens.php');
        break;
    case 'lePraticien' :
        $indicPra = array ("Matricule", "Code", "Nom", "Prénom", "Adresse", "Code Postal", "Ville", "Notoriété", "Confiance", "Type");
        if(isset($_POST['idPra'])){
            $lePra = $_POST['idPra'];
          }else{
            if(isset($_GET['pra']) && $_GET['pra'] != ""){
              $lePra = $_GET['pra'];
            }else{
              echo "<script>window.location.href = 'index.php?c=menu&a=praticiens';</script>";
            }
          }
        $praticien = getLePra($lePra)[0];
        include('vues/v_lePraticien.php');
        break;
    case 'medicaments' :
        $medicaments = getListeMed();
        include('vues/v_medicaments.php');
        break;
  	case 'leMedicament' :
        $indicMed = array ("Code Médicament", "Nom Commercial", "Composition", "Contre-Indication", "Effets", "Prix Échantillon");
        if(isset($_POST['medDepotLeg'])){
            $leMed = $_POST['medDepotLeg'];
          }else{
            if(isset($_GET['med']) && $_GET['med'] != ""){
              $leMed = $_GET['med'];
            }else{
              echo "<script>window.location.href = 'index.php?c=menu&a=medicaments';</script>";
            }
          }
        $medicament = getLeMed($leMed)[0];
    	include('vues/v_leMedicament.php');
    	break;
    default :
        include('vues/v_accueil.php');
        break;
}

?>