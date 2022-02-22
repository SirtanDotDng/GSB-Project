<div class="list" >
<?php

$indicPra = array ("Matricule", "Code", "Nom", "Prénom", "Adresse", "Code Postal", "Ville", "Notoriété", "Confiance", "Type");

if(isset($_POST['idPra'])){
  $lesColonnes=getLePra($_POST['idPra'])[0];
  echo "<h1>".$lesColonnes['PRA_NOM']." ".$lesColonnes['PRA_PRENOM']."</h1>";
  for($i=0;$i<(count($lesColonnes))/2;$i++){
    echo "<div class='row'>".$indicPra[$i]." : ".$lesColonnes[$i]."</div>";
  }
}
?>
  <form action="http://gsb.mattatyalexis.fr/?c=menu&a=praticiens" method="post">
  <div>
    <input class="btn btn-success bouton" type="submit" name="bouton" value="Retour">
  </div>
</form>
</div>