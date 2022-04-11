<?php include('vues/v_checkRapportSearch.php'); ?>
<?php
$infoRap = array("Matricule :","Date du rapport :","Bilan :","Date de saisie :","Etat :","Numéro du praticien visité :","Médicament(s) présenté(s) :","Motif de la visite :","Autre motif :","Remplacant :");
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
	echo "<div id='element".getLesRapportsDate($date1, $date2)[$j][1]."' class='raplist'>";
  $lesRapports = array();
  echo "<h2> Rapport n°".getLesRapportsDate($date1, $date2)[$j][1]."</h2>";
  for($i=0;$i<14;$i++){
    $lesRapports[$i] = getLesRapportsDate($date1, $date2)[$j][$i];
  }
  array_splice($lesRapports,1,1);
  if(isset($lesRapports[7])){
    $lesRapports[6] .= ", ";
    $lesRapports[6] .= $lesRapports[7];
  }
  array_splice($lesRapports,7,1);
  for($i=0;$i<(count($lesRapports)-2);$i++){
    if(is_null($lesRapports[$i])){
      $lesRapports[$i] = "NONE";
    }
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
  echo "</div>";
  ?>
  <script type="text/javascript">
    document.getElementById("element<?php echo getLesRapportsDate($date1, $date2)[$j][$i];?>").onclick = function () {
        location.href = "http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapport&rap=<?php echo getLesRapportsDate($date1, $date2)[$j][$i];?>";
    };
  </script>
  <?php
}
echo "</section>";
?>