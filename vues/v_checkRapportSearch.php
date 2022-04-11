
<?php
if(isset($_POST['date1'])){
  echo "OUAIS1 ".$_POST['date1'];
}
if(isset($_POST['date2'])){
  echo " OUAIS2 ".$_POST['date2'];
  var_dump($_POST['date2']);
}

?>
<form class="shadow" action="http://gsb.mattatyalexis.fr/?c=rapports&a=checkRapport" method="post">
  <h1 style="margin-bottom:2%"> Consultation des rapports </h1>
  <p class=dateRapForm>Rapport saisie entre le <input class=dateRap type="date" id="date1" name="date1"> et le <input class=dateRap type="date" id="date2" name="date2"></p>
  <div>
        <label for="searchPra">Cherchez vous un praticien en particulier ?</label>
        <select name="searchPra" id="searchPra" />
                <option value="non">Non</option>
      			<option value="oui">Oui</option>
      	</select>
	</div>
    <div id="praTitle">
          <label for="praticienSelected">Praticien :</label>
              <select name="idPra" id="idPra" required/>
      			<option selected="selected" value="aucun"></option>
                <?php foreach(getListePraRap() as $laLigne){ ?>
               	<option value=<?php echo $laLigne[2]; ?>><?php echo $laLigne[2]." ".$laLigne[0]." ".$laLigne[1]; ?></option>
               <?php } ?>
           </select>
  </div>
  <div>
	 <input class="btn btn-success bouton" type="submit" name="bouton" value="Selectionner">
  </div>

  <script>
    var ddl = document.getElementById("searchPra");
    ddl.onchange=hidePra;
    document.getElementById("praTitle").style.display = "none";
    function hidePra()
    {   
        var ddl = document.getElementById("searchPra");
        var selectedValue = ddl.options[ddl.selectedIndex].value;
        
        if (selectedValue == "oui")
        {   document.getElementById("praTitle").style.display = "block";
        }
        else
        {
           document.getElementById("praTitle").style.display = "none";
        }
    }
    </script>
  
  
  
  
</form>