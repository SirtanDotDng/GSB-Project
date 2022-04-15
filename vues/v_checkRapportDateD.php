<?php include('vues/v_checkRapportSearchD.php');?>
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

$lesRapports = array();

for($j=0;$j<(count(getLesRapportsDateD($date1, $date2)));$j++){
  echo "<div id='element".$j."' class='raplist'>";

  echo "<h2> Rapport n°".getLesRapportsDateD($date1, $date2)[$j][1]."</h2>";

  $lesRapports[0] = getLesRapportsDateD($date1, $date2)[$j]['COL_MATRICULE'];
  $lesRapports[1] = getLesRapportsDateD($date1, $date2)[$j]['rap_date'];
  $lesRapports[2] = getLesRapportsDateD($date1, $date2)[$j]['RAP_saisie_date'];
  $lesRapports[3] = getLesRapportsDateD($date1, $date2)[$j]['PRA_NUM'];

  for($i=0;$i<(count($lesRapports));$i++){
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
  echo "</div>";
  ?>
  <script type="text/javascript">
    document.getElementById("element<?php echo $j;?>").onclick = function () {
    	location.href = "http://gsb.mattatyalexis.fr/?c=rapports&a=leRapportD&rap=<?php echo getLesRapportsDateD($date1, $date2)[$j][1];?>&mat=<?php echo $lesRapports[0];?>";
    };
  </script>
  <?php
}
echo "</section>";
?>