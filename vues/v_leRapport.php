<div class="list" >
  
<?php

echo "<h1> Rapport n°".$rapports[$_GET['rap']-1][1]."</h2>";
for($i=0;$i<14;$i++){
  if(isset($rapports[$_GET['rap']-1][$i])){
    $lesRapports[$i] = $rapports[$_GET['rap']-1][$i];
  }
}
array_splice($lesRapports,1,1);

if(isset($lesRapports[6]) && isset($medicamentRapportSix[0]['Nom commercial'])){
  $codeMed = $lesRapports[6];
  $lesRapports[6] .= " (".$medicamentRapportSix[0]['Nom commercial'].") ";
  $lesRapports[6] = "<a href='index.php?c=menu&a=leMedicament&med=".$codeMed."'>".$lesRapports[6]."</a>";
}

if(isset($lesRapports[7]) && isset($medicamentRapportSeven[0]['Nom commercial'])){
  $lesRapports[7] = "<a href='index.php?c=menu&a=leMedicament&med=".$lesRapports[7]."'>".$lesRapports[7]." (".$medicamentRapportSeven[0]['Nom commercial'].") "."</a>";
  if(isset($lesRapports[6])){
  	$lesRapports[6] .= ", ";
  }
  $lesRapports[6] .= $lesRapports[7];
}
array_splice($lesRapports,7,1);
for($i=0;$i<(count($lesRapports)-2);$i++){
  if(!is_null($lesRapports[$i])){
    if($lesRapports[$i] == $rapports[$_GET['rap']-1]['PRA_NUM']){
      echo "<div class='row'>".$infoRap[$i]."<a href='index.php?c=menu&a=lePraticien&pra=".$lesRapports[$i]."'> ".$lesRapports[$i].", ".$praticien['PRA_NOM']." ".$praticien['PRA_PRENOM']."</a></div>";
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
<form class="leX" action="index.php?c=rapports&a=checkRapportSearch" method="post">
  <div style="text-align:center">
    <input style="font-size:14px; width:25%; border-radius:0px; box-shadow:none; height:32px;" class="btn btn-warning bouton" type="submit" name="bouton" value="Retour">
  </div>
</form>
</div>