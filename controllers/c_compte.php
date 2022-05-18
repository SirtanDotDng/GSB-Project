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
        $grade = getLeGrade();
        $infos = getInfoCol()[0];
        include('vues/v_monCompte.php');
        break;
  	default :
    	if(!isConnected()){
          include('vues/v_formConnexion.php');
        }else{
          echo "<script>location.href='index.php?c=menu';</script>";
        }
    	break;
}

?>