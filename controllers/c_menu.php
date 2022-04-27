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
    default :
        include('vues/v_accueil.php');
        break;
}

?>