<div class="list">
<h1> Rapports </h1>
<div class="rapmenudiv">
	<div class="rapmenu">
      <img class="fit-picture" src="images/viewrapport.png"><br/>
      <a href="http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportSearch">Consulter ses rapports</a>
  	</div>
<div class="rapmenu">
<img class="fit-picture" src="images/addrapport.png"><br/>
<a href="http://gsb.mattatyalexis.fr/?c=rapports&a=addRapport">Saisir un rapport</a>
  </div>
  <div class="rapmenu">
<img class="fit-picture" src="images/editrapport.png"><br/>
<a href="http://gsb.mattatyalexis.fr/?c=rapports&a=modifyRapports">Reprendre la saisie d'un rapport</a>
</div>
<?php
if($_SESSION['grade'] == 2){
  echo '<div class="rapmenu">';
  echo '<img class="fit-picture" src="images/viewrapportregion.png"><br/>';
  echo '<a href="http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportSearchD">Consulter les rapports de sa région</a>';
  echo '</div>';
  
  echo '<div class="rapmenu">';
  echo '<img class="fit-picture" src="images/viewnewrapportregion.png"><br/>';
  echo '<a href="http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportNouveaux">Consulter les nouveaux rapports de sa région</a>';
  echo '</div>';
}
?>
</div>
</div>