<?php

if(isset($_GET['a'])){
    $a=$_GET['a'];
}else{
    $a="";
}

switch ($a) {
    
    case 'login' :
        echo(login($_POST['mail'],$_POST['pass']));
        break;
    case 'deconnexion' :
        deconnexion();
        break;
    case 'monCompte' :
        include('vues/v_monCompte.php');
        break;
  	default :
    	include('vues/v_formConnexion.php');
    	break;
}

?>