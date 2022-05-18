<?php

echo "<section class=displayRap>";

for($j=0;$j<(count($newRapports));$j++){
  echo "<div id='element".$j."' class='raplist'>";

  echo "<h2> Rapport n°".$newRapports[$j][1]."</h2>";

  for($i=0;$i<(count($lesRapports));$i++){
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
  echo "</div>";
  ?>
  <script type="text/javascript">
    document.getElementById("element<?php echo $j;?>").onclick = function () {
    	location.href = "index.php?c=rapports&a=leRapportNouveau&rap=<?php echo $newRapports[$j][1];?>&mat=<?php echo $lesRapports[0];?>";
    };
  </script>
  <?php
}
echo "</section>";
?>