<div class="list" >
  
<?php
$infoRap = array("Matricule :","Date du rapport :","Bilan :","Date de saisie :","Etat :","Numéro du praticien visité :","Médicament(s) présenté(s) :","Motif de la visite :","Autre motif :","Remplacant :");

$lesRapports = array();
echo "<h1> Rapport n°".getLesRapportsCol($_GET['mat'])[$_GET['rap']-1][1]."</h2>";
for($i=0;$i<14;$i++){
  if(isset(getLesRapportsCol($_GET['mat'])[$_GET['rap']-1][$i])){
    $lesRapports[$i] = getLesRapportsCol($_GET['mat'])[$_GET['rap']-1][$i];
  }
}
array_splice($lesRapports,1,1);
  
if(isset($lesRapports[6])){
  $codeMed = $lesRapports[6];
  $lesRapports[6] .= " (".getLeMed(getLesRapportsCol($_GET['mat'])[$_GET['rap']-1]['MED_DEPOTLEGAL'])[0]['Nom commercial'].") ";
  $lesRapports[6] = "<a href='index.php?c=menu&a=leMedicament&med=".$codeMed."'>".$lesRapports[6]."</a>";
}

if(isset($lesRapports[7])){
  $lesRapports[7] = "<a href='index.php?c=menu&a=leMedicament&med=".$lesRapports[7]."'>".$lesRapports[7]." (".getLeMed(getLesRapports()[$_GET['rap']-1]['MED_DEPOTLEGAL_2'])[0]['Nom commercial'].") "."</a>";
  if(isset($lesRapports[6])){
    $lesRapports[6] .= ", ";
  }
  $lesRapports[6] .= $lesRapports[7];
}
array_splice($lesRapports,7,1);
for($i=0;$i<(count($lesRapports)-2);$i++){
  if(!is_null($lesRapports[$i])){
    if($lesRapports[$i] == getLesRapportsCol($_GET['mat'])[$_GET['rap']-1]['PRA_NUM']){
      echo "<div class='row'>".$infoRap[$i]."<a href='index.php?c=menu&a=lePraticien&pra=".$lesRapports[$i]."'> ".$lesRapports[$i].", ".getLePra(getLesRapportsCol($_GET['mat'])[$_GET['rap']-1]['PRA_NUM'])[0]['PRA_NOM']." ".getLePra(getLesRapportsCol($_GET['mat'])[$_GET['rap']-1]['PRA_NUM'])[0]['PRA_PRENOM']."</a></div>";
    }else{
      if($infoRap[$i] == "Etat :"){
        if($lesRapports[$i] == 1){
          echo "<div class='row'>".$infoRap[$i]." Définitif</div>";
        }else{
          echo "<div class='row'>".$infoRap[$i]." Non définitif</div>";          
        }
      }else{
        if($infoRap[$i] == "Motif de la visite :"){
          echo "<div class='row'>".$infoRap[$i]." ".getLeMotifById($lesRapports[$i])[0][0]."</div>";
        }else{
          if($i == 6){
            echo "<div class='row'>".$infoRap[6].$lesRapports[6]."</div>";
          }else{
            echo "<div class='row'>".$infoRap[$i]." ".$lesRapports[$i]."</div>";
          }
        }
      }
    }

  }
}
?>
<form style="margin-bottom: 0px; padding-bottom: 0px;" class="leX" action="index.php?c=rapports&a=valideRapport&mat=<?php echo $_GET['mat'] ?>&rap=<?php echo $_GET['rap'] ?>" method="post">
  <div style="text-align:center">
  <input style="font-size:14px; text-align:center; width:25%; border-radius:0px; box-shadow:none; height:32px;" class="btn btn-success bouton" type="submit" name="bouton" value="Valider le rapport">
  </div>
</form>
<form style="margin-top: -64px; margin-bottom: 0px;" class="leX" action="index.php?c=rapports&a=checkRapportNouveaux" method="post">
  <div style="text-align:center">
<input style="font-size:14px; text-align:center; width:25%; border-radius:0px; box-shadow:none; height:32px;" class="btn btn-warning bouton" type="submit" name="bouton" value="Retour">
  </div>
</form>
</div>