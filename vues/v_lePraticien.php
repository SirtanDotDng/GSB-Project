<div class="list" >
<?php

$indicPra = array ("Matricule", "Code", "Nom", "Prénom", "Adresse", "Code Postal", "Ville", "Notoriété", "Confiance", "Type");

if(isset($_POST['idPra'])){
  $lePra = $_POST['idPra'];
}else{
  if(isset($_GET['pra']) && $_GET['pra'] != ""){
    $lePra = $_GET['pra'];
  }else{
    echo "<script>window.location.href = 'http://gsb.mattatyalexis.fr/?c=menu&a=praticiens';</script>";
  }
}
  
$lesColonnes=getLePra($lePra)[0];
echo "<h1>".$lesColonnes['PRA_NOM']." ".$lesColonnes['PRA_PRENOM']."</h1>";
for($i=0;$i<(count($lesColonnes))/2;$i++){
  echo "<div class='row'>".$indicPra[$i]." : ".$lesColonnes[$i]."</div>";
}

?>
  <form class="leX" action="http://gsb.mattatyalexis.fr/?c=menu&a=praticiens" method="post">
  <div style="text-align:center">
    <input style="width:25%; border-radius:0px; box-shadow:none; height:32px;" class="btn btn-warning bouton" type="submit" name="bouton" value="Retour">
  </div>
</form>
</div>