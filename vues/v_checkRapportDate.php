<?php include('vues/v_checkRapportSearch.php'); ?>
<?php
$infoRap = array("Matricule :","Date du rapport :","Date de saisie :","Numéro du praticien visité :");
echo "<section class=displayRap>";

if(isset($_POST['date1']) && $_POST['date1'] != ""){
  $date1 = $_POST['date1'];
}else{
  $date1 = '2000-01-01';
}
if(isset($_POST['date2']) && $_POST['date2'] != ""){
  $date2 = $_POST['date2'];
}else{
  $date2 = date('Y-m-d');
}


for($j=0;$j<(count(getLesRapportsDate($date1, $date2)));$j++){
	echo "<div style='background:#fff;' id='element".getLesRapportsDate($date1, $date2)[$j][1]."' class='raplist'>";
  $lesRapports = array();
  echo "<h2> Rapport n°".getLesRapportsDate($date1, $date2)[$j][1]."</h2>";
  
  $lesRapports[0] = getLesRapportsDate($date1, $date2)[$j]['COL_MATRICULE'];
  $lesRapports[1] = getLesRapportsDate($date1, $date2)[$j]['rap_date'];
  $lesRapports[2] = getLesRapportsDate($date1, $date2)[$j]['RAP_saisie_date'];
  $lesRapports[3] = getLesRapportsDate($date1, $date2)[$j]['PRA_NUM'];

  for($i=0;$i<(count($lesRapports));$i++){
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
  echo "</div>";
  ?>
  <script type="text/javascript">
    document.getElementById("element<?php echo getLesRapportsDate($date1, $date2)[$j][1];?>").onclick = function () {
        location.href = "https://gsb.mattatyalexis.fr/?c=rapports&a=leRapport&rap=<?php echo getLesRapportsDate($date1, $date2)[$j][1];?>";
    };
  </script>
  <?php
}
echo "</section>";
?>