<div class="list" >
  
<?php
$infoRap = array("Matricule :","Date du rapport :","Bilan :","Date de saisie :","Etat :","Numéro du praticien visité :","Médicament(s) présenté(s) :","Motif de la visite :","Autre motif :","Remplacant :");

$lesRapports = array();
echo "<h1> Rapport n°".getLesRapportsCol($_GET['mat'])[$_GET['rap']-1][1]."</h2>";
for($i=0;$i<14;$i++){
  $lesRapports[$i] = getLesRapportsCol($_GET['mat'])[$_GET['rap']-1][$i];
}
array_splice($lesRapports,1,1);

$lesRapports[6] .= " (".getLeMed(getLesRapportsCol($_GET['mat'])[$_GET['rap']-1]['MED_DEPOTLEGAL'])[0]['Nom commercial'].") ";

if(isset($lesRapports[7])){
  $lesRapports[7] .= " (".getLeMed(getLesRapportsCol($_GET['mat'])[$_GET['rap']-1]['MED_DEPOTLEGAL_2'])[0]['Nom commercial'].") ";
  $lesRapports[6] .= ", ";
  $lesRapports[6] .= $lesRapports[7];
}
array_splice($lesRapports,7,1);
for($i=0;$i<(count($lesRapports)-2);$i++){
  if(is_null($lesRapports[$i])){
    $lesRapports[$i] = "NONE";
  }
  if($lesRapports[$i] == getLesRapportsCol($_GET['mat'])[$_GET['rap']-1]['PRA_NUM']){
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i].", ".getLePra(getLesRapportsCol($_GET['mat'])[$_GET['rap']-1]['PRA_NUM'])[0]['PRA_NOM']." ".getLePra(getLesRapportsCol($_GET['mat'])[$_GET['rap']-1]['PRA_NUM'])[0]['PRA_PRENOM']."</div>";
  }else{
    echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
  }
}
?>
<form class="leX" action="http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportSearchD" method="post">
  <div>
    <input class="btn btn-success bouton" type="submit" name="bouton" value="Retour">
  </div>
</form>
</div>