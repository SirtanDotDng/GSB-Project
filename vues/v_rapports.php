<div class="list">
<h1> Rapports </h1>
<div class="rapmenudiv">
	<div id="checkrap" class="rapmenu">
      <img class="fit-picture" src="images/viewrapport.png"><br/>
      <a href="http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportSearch">Consulter ses rapports</a>
  	</div>

  <script>
    document.getElementById("checkrap").onclick = function () {
    	location.href = "http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportSearch";
    }
  </script>

<div id="newrap" class="rapmenu">
<img class="fit-picture" src="images/addrapport.png"><br/>
<a href="http://gsb.mattatyalexis.fr/?c=rapports&a=addRapport">Saisir un rapport</a>
</div>

<script>
    document.getElementById("newrap").onclick = function () {
    	location.href = "http://gsb.mattatyalexis.fr/?c=rapports&a=addRapport";
    }
  </script>

  <div id="editrap" class="rapmenu">
<img class="fit-picture" src="images/editrapport.png"><br/>
<a href="http://gsb.mattatyalexis.fr/?c=rapports&a=modifyRapports">Reprendre la saisie d'un rapport</a>
</div>

<script>
    document.getElementById("editrap").onclick = function () {
    	location.href = "http://gsb.mattatyalexis.fr/?c=rapports&a=modifyRapports";
    }
  </script>

<?php
if($_SESSION['grade'] == 2){
  echo '<div id="rapregion" class="rapmenu">';
  echo '<img class="fit-picture" src="images/viewrapportregion.png"><br/>';
  echo '<a href="http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportSearchD">Consulter les rapports de sa région</a>';
  echo '</div>';
  
  echo '<div id="nouveaurap" class="rapmenu">';
  echo '<img class="fit-picture" src="images/viewnewrapportregion.png"><br/>';
  echo '<a href="http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportNouveaux">Consulter les nouveaux rapports de sa région</a>';
  echo '</div>';
}
?>

<script>
    document.getElementById("rapregion").onclick = function () {
    	location.href = "http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportSearchD";
    }
  </script>

<script>
    document.getElementById("nouveaurap").onclick = function () {
    	location.href = "http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportNouveaux";
    }
  </script>
</div>
</div>