<div class="list">
<h1> Médicaments </h1>

<form action="http://gsb.mattatyalexis.fr/?c=menu&a=leMedicament" method="post" style="text-align: center;">
  <div>
  <p>Sélectionnez un médicament dont vous souhaitez connaître les informations :</p>
  <select name="medDepotLeg" id="medDepotLeg" style="width: 25%; margin: 3%;" required/>
     <?php foreach(getListeMed() as $laLigne){ ?>
        <option value="<?php echo $laLigne['idMed'];?>"><?php echo $laLigne['Nom commercial']; ?></option>
     <?php } ?>
  </select>
  </div>
  <div>
	 <input style="width: 25%; border-radius:0px" class="btn btn-success bouton" type="submit" name="bouton" value="Sélectionner">
  </div>
</form>
</div>