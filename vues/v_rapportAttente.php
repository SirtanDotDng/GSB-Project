<div class="createrap">
    <a href="index.php?c=rapports&a=addRapport">
   		<button>Ajouter un rapport</button>
	</a>
</div>

<?php

echo "<section class=displayRap>";

for($j=0;$j<(count($lesRapportsAttente));$j++){
	echo "<div id='element".$lesRapportsAttente[$j][1]."' class='raplist'>";

  echo "<h2> Rapport n°".$lesRapportsAttente[$j][1]."</h2>";
  
  $lesRapports[0] = $lesRapportsAttente[$j]['COL_MATRICULE'];
  $lesRapports[1] = $lesRapportsAttente[$j]['rap_date'];
  $lesRapports[2] = $lesRapportsAttente[$j]['RAP_saisie_date'];
  $lesRapports[3] = $lesRapportsAttente[$j]['PRA_NUM'];

  for($i=0;$i<(count($lesRapports));$i++){
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
  echo "</div>";
  ?>
  <script type="text/javascript">
    document.getElementById("element<?php echo $lesRapportsAttente[$j][1];?>").onclick = function () {
        location.href = "index.php?c=rapports&a=modifierLeRapport&rap=<?php echo $lesRapportsAttente[$j][1];?>";
    };
  </script>
  <?php
}
echo "</section>";
?>