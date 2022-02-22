<div class="list">
<h1> Praticiens </h1>

<form action="http://gsb.mattatyalexis.fr/?c=menu&a=lePraticien" method="post">
  <div>
  <select name="idPra" id="idPra" required/>
     <?php foreach(getListePra() as $laLigne){ ?>
        <option value="<?php echo $laLigne['idPra'];?>"><?php echo $laLigne['Nom'].' '.$laLigne['Prenom']; ?></option>
     <?php } ?>
  </select>
  </div>
  <div>
	 <input class="btn btn-success bouton" type="submit" name="bouton" value="Selectionner">
  </div>
</form>
</div>