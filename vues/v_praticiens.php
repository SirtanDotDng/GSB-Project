<div class="list">
<h1> Praticiens </h1>

<form action="http://gsb.mattatyalexis.fr/?c=menu&a=lePraticien" method="post" style="text-align: center;">
  <div>
  <p>Sélectionnez un praticien dont vous souhaitez connaître les informations :</p>
  <select name="idPra" id="idPra" style="width: 25%; margin: 3%;" required/>
     <?php foreach(getListePra() as $laLigne){ ?>
        <option value="<?php echo $laLigne['idPra'];?>"><?php echo $laLigne['Nom'].' '.$laLigne['Prenom']; ?></option>
     <?php } ?>
  </select>
  </div>
  <div>
	 <input class="btn btn-success bouton" type="submit" name="bouton" value="Sélectionner" style="width: 25%;">
  </div>
</form>
</div>