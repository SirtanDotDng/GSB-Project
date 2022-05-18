<div class="list" >
<?php

echo "<h1>".$praticien['PRA_NOM']." ".$praticien['PRA_PRENOM']."</h1>";
for($i=0;$i<(count($praticien))/2;$i++){
  echo "<div class='row'>".$indicPra[$i]." : ".$praticien[$i]."</div>";
}

?>
  <form class="leX" action="index.php?c=menu&a=praticiens" method="post">
  <div style="text-align:center">
    <input style="font-size:14px; width:25%; border-radius:0px; box-shadow:none; height:32px;" class="btn btn-warning bouton" type="submit" name="bouton" value="Retour">
  </div>
</form>
</div>