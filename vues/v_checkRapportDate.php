<?php include('vues/v_checkRapportSearch.php'); ?>
<?php
echo "<section class=displayRap>";


for($j=0;$j<(count($rapportsDate));$j++){
	echo "<div style='background:#fff;' id='element".$rapportsDate[$j][1]."' class='raplist'>";
  echo "<h2> Rapport n°".$rapportsDate[$j][1]."</h2>";
  
  $lesRapports[0] = $rapportsDate[$j]['COL_MATRICULE'];
  $lesRapports[1] = $rapportsDate[$j]['rap_date'];
  $lesRapports[2] = $rapportsDate[$j]['RAP_saisie_date'];
  $lesRapports[3] = $rapportsDate[$j]['PRA_NUM'];

  for($i=0;$i<(count($lesRapports));$i++){
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
  echo "</div>";
  ?>
  <script type="text/javascript">
    document.getElementById("element<?php echo $rapportsDate[$j][1];?>").onclick = function () {
        location.href = "index.php?c=rapports&a=leRapport&rap=<?php echo $rapportsDate[$j][1];?>";
    };
  </script>
  <?php
}
echo "</section>";
if($date1 > $date2){
  echo "<div class='list'>Vous ne pouvez pas sélectionner une date maximale inférieur à celle minimale.</div>";
}
?>