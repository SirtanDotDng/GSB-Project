<div class="list" >
<?php

$indicMed = array ("Code Médicament", "Nom Commercial", "Composition", "Contre-Indication", "Effets", "Prix Échantillon");
  
if(isset($_POST['medDepotLeg'])){
  $lesColonnes=getLeMed($_POST['medDepotLeg'])[0];
  echo "<h1>".$lesColonnes[1]."</h1>";
  for($i=0;$i<(count($lesColonnes))/2-1;$i++){
    echo "<div class='row'>".$indicMed[$i].' : '.$lesColonnes[$i]."</div>";
  }
}
?>
  <form action="http://gsb.mattatyalexis.fr/?c=menu&a=medicaments" method="post">
    <div>
      <input class="btn btn-success bouton" type="submit" name="bouton" value="Retour">
    </div>
  </form>
</div>