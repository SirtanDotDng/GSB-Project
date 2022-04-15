<?php
$infoRap = array("Matricule :","Date du rapport :","Date de saisie :","Numéro du praticien visité :");
echo "<section class=displayRap>";

$lesRapports = array();

for($j=0;$j<(count(getLesRapportsNouveaux()));$j++){
  echo "<div id='element".$j."' class='raplist'>";

  echo "<h2> Rapport n°".getLesRapportsNouveaux()[$j][1]."</h2>";

  $lesRapports[0] = getLesRapportsNouveaux()[$j]['COL_MATRICULE'];
  $lesRapports[1] = getLesRapportsNouveaux()[$j]['rap_date'];
  $lesRapports[2] = getLesRapportsNouveaux()[$j]['RAP_saisie_date'];
  $lesRapports[3] = getLesRapportsNouveaux()[$j]['PRA_NUM'];

  for($i=0;$i<(count($lesRapports));$i++){
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
  echo "</div>";
  ?>
  <script type="text/javascript">
    document.getElementById("element<?php echo $j;?>").onclick = function () {
    	location.href = "http://gsb.mattatyalexis.fr/?c=rapports&a=leRapportNouveau&rap=<?php echo getLesRapportsNouveaux()[$j][1];?>&mat=<?php echo $lesRapports[0];?>";
    };
  </script>
  <?php
}
echo "</section>";
?>