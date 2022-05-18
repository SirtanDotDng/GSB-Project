<?php include('vues/v_checkRapportSearchD.php');?>
<?php

echo "<section class=displayRap>";

for($j=0;$j<(count($rapportsDateD));$j++){
  echo "<div id='element".$j."' class='raplist'>";

  echo "<h2> Rapport n°".$rapportsDateD[$j][1]."</h2>";

  $lesRapports[0] = $rapportsDateD[$j]['COL_MATRICULE'];
  $lesRapports[1] = $rapportsDateD[$j]['rap_date'];
  $lesRapports[2] = $rapportsDateD[$j]['RAP_saisie_date'];
  $lesRapports[3] = $rapportsDateD[$j]['PRA_NUM'];

  for($i=0;$i<(count($lesRapports));$i++){
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
  echo "</div>";
  ?>
  <script type="text/javascript">
    document.getElementById("element<?php echo $j;?>").onclick = function () {
    	location.href = "index.php?c=rapports&a=leRapportD&rap=<?php echo $rapportsDateD[$j][1];?>&mat=<?php echo $lesRapports[0];?>";
    };
  </script>
  <?php
}
echo "</section>";
?>