<div class="list" >
<?php  

echo "<h1>".$medicament[1]."</h1>";
for($i=0;$i<(count($medicament))/2-1;$i++){
  echo "<div class='row'>".$indicMed[$i].' : '.$medicament[$i]."</div>";
}

?>
  <form class="leX" action="index.php?c=menu&a=medicaments" method="post">
    <div style="text-align:center">
      <input style="font-size:14px; width:25%; border-radius:0px; box-shadow:none; height:32px;" class="btn btn-warning bouton" type="submit" name="bouton" value="Retour">
    </div>
  </form>
</div>