<div class="list">
<h1>Mon Compte</h1>
<?php
echo "<p>Adresse mail : ".$_SESSION['mail']."</p>";
echo "<p>Grade : ".$grade."</p>";

$indicInfo = array("Matricule","Nom","Prenom","Rue","CP","Ville","Date d'embauche","Secteur code");

for($i=0;$i<8;$i++){
    echo "<div>".$indicInfo[$i]." : ".$infos[$i]."</div>";
 }

?>

<form action="index.php?c=compte&a=deconnexion" method="post">
  <div style="text-align:center">
    <input style="font-size:14px; width: 25%; border-radius:0px" class="btn btn-danger bouton" type="submit" name="bouton" value="Déconnexion">
  </div>
</form>
</div>