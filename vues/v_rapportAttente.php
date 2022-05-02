<?php
$infoRap = array("Matricule :","Date du rapport :","Date de saisie :","Numéro du praticien visité :");
echo "<section class=displayRap>";

for($j=0;$j<(count(getLesRapportsAttente()));$j++){
	echo "<div id='element".getLesRapportsAttente()[$j][1]."' class='raplist'>";
  $lesRapports = array();
  echo "<h2> Rapport n°".getLesRapportsAttente()[$j][1]."</h2>";
  
  $lesRapports[0] = getLesRapportsAttente()[$j]['COL_MATRICULE'];
  $lesRapports[1] = getLesRapportsAttente()[$j]['rap_date'];
  $lesRapports[2] = getLesRapportsAttente()[$j]['RAP_saisie_date'];
  $lesRapports[3] = getLesRapportsAttente()[$j]['PRA_NUM'];

  for($i=0;$i<(count($lesRapports));$i++){
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
  echo "</div>";
  ?>
  <script type="text/javascript">
    document.getElementById("element<?php echo getLesRapportsAttente()[$j][1];?>").onclick = function () {
        location.href = "https://gsb.mattatyalexis.fr/?c=rapports&a=modifierLeRapport&rap=<?php echo getLesRapportsAttente()[$j][1];?>";
    };
  </script>
  <?php
}
echo "</section>";
?>