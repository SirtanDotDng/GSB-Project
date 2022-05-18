<form style='background:#fff;' class="shadow" action="index.php?c=rapports&a=checkRapportD" method="post">
  <h1 style="margin-bottom:2%"> Consultation des rapports </h1>
  <p class=dateRapForm>Rapport saisie entre le <input class=dateRap type="date" id="date1" name="date1"> et le <input class=dateRap type="date" id="date2" name="date2"></p>
  <div>
        <label for="searchCol">Cherchez vous un visiteur en particulier ?</label>
        <select name="searchCol" id="searchCol" />
                <option value="non">Non</option>
      			<option value="oui">Oui</option>
      	</select>
	</div>
    <div id="colTitle">
          <label for="collaborateurSelected">Visiteur :</label>
              <select name="idCol" id="idCol" required/>
      			<option selected="selected" value="aucun"></option>
                <?php foreach($listeColReg as $laLigne){ ?>
               	<option value=<?php echo $laLigne[2]; ?>><?php echo $laLigne[2]." ".$laLigne[0]." ".$laLigne[1]; ?></option>
               <?php } ?>
           </select>
  </div>
  <br>
  <div>
	 <input style="border-radius:0px" class="btn btn-success bouton" type="submit" name="bouton" value="Selectionner">
  </div>

  <script>
    var ddl = document.getElementById("searchCol");
    ddl.onchange=hideCol;
    document.getElementById("colTitle").style.display = "none";
    function hideCol()
    {   
        var ddl = document.getElementById("searchCol");
        var selectedValue = ddl.options[ddl.selectedIndex].value;
        
        if (selectedValue == "oui")
        {   document.getElementById("colTitle").style.display = "block";
        }
        else
        {
           document.getElementById("colTitle").style.display = "none";
        }
    }
    </script>
  
  
  
  
</form>