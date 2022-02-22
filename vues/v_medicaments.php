<div class="list">
<h1> Médicaments </h1>

<form action="http://gsb.mattatyalexis.fr/?c=menu&a=leMedicament" method="post">
  <div>
  <select name="medDepotLeg" id="medDepotLeg" required/>
     <?php foreach(getListeMed() as $laLigne){ ?>
        <option value="<?php echo $laLigne['idMed'];?>"><?php echo $laLigne['Nom commercial']; ?></option>
     <?php } ?>
  </select>
  </div>
  <div>
	 <input class="btn btn-success bouton" type="submit" name="bouton" value="Selectionner">
  </div>
</form>
</div>