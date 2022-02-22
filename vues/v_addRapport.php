<div class="list">
<h1> Ajout Rapports </h1>
<form class="saisieRapport" action="?c=menu&a=insertRapport" method="post">
    <div>
        <label for="rapDate">Date Rapport :</label>
        <input class="casesinput" type="date" name="rapDate" id="rapDate" required/>
    </div>
    <div>
        <label for="rapBilan">Bilan Rapport :</label>
        <textarea class="casesinput" type="text" name="rapBilan" id="rapBilan" required/></textarea>
    </div>
    <div>
        <label for="rapEtat">Etat Rapport :</label>
        <select name="rapEtat" id="rapEtat" required/>
            <?php for($i=1;$i<3;$i++){ ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php } ?>
      	</select>
	</div>
    <div>
        <label for="praNum">Praticien :</label>
        <select name="praNum" id="praNum" required/>
            <?php foreach(getListePra() as $laLigne){ ?>
            	<option value="<?php echo $laLigne['idPra'];?>"><?php echo $laLigne['Nom']; echo " "; echo $laLigne['Prenom'] ?></option>
      		<?php } ?>
        </select>
    </div>
    <div>
        <label for="medDepotLeg">Nom Médicament :</label>
        <select name="medDepotLeg" id="medDepotLeg" />
      		<option selected="selected" value=""></option>
            <?php foreach(getListeMed() as $laLigne){ ?>
            <option value="<?php echo $laLigne['idMed'];?>"><?php echo $laLigne['Nom commercial']; ?></option>
      		<?php } ?>
        </select>
    </div>
    <div>
    <label for="medDepotLeg2">Nom Médicament :</label>
        <select name="medDepotLeg2" id="medDepotLeg2"/>
      		<option selected="selected" value=""></option>
            <?php foreach(getListeMed() as $laLigne){ ?>
            <option value="<?php echo $laLigne['idMed'];?>"><?php echo $laLigne['Nom commercial']; ?></option>
      		<?php } ?>
        </select>
    </div>
	<div>
        <label for="idMotif">Motif :</label>
        <select name="idMotif" id="idMotif" />
                <option value="">Autre</option>
      			<option value="1">Périodique</option>
      			<option value="2">Actualisation</option>
      	</select>
	</div>

	<div id="motifTitle">
        <label for="motifAutre">Motif Autre :</label>
        <input class="casesinput" type="text" name="motifAutre" id="motifAutre" />
    </div>

    <script>
    var ddl = document.getElementById("idMotif");
    ddl.onchange=hideMotif;
    function hideMotif()
    {   
        var ddl = document.getElementById("idMotif");
        var selectedValue = ddl.options[ddl.selectedIndex].value;


        if (selectedValue == "")
        {   document.getElementById("motifTitle").style.display = "block";
        }
        else
        {
           document.getElementById("motifTitle").style.display = "none";
        }
    }
    </script>

    <div>
        <label for="remplacant">Remplacant Praticien :</label>
        <select name="remplacant" id="remplacant"/>
      	<option selected="selected" value=""></option>
            <?php foreach(getListePra() as $laLigne){ ?>
            	<option value="<?php echo $laLigne['idPra'];?>"><?php echo $laLigne['Nom']; echo " "; echo $laLigne['Prenom'] ?></option>
      		<?php } ?>
        </select>
    </div><br>



	<div>
    <label for="echantillon">Echantillon :</label>
    <table id="dataTable">
        <tr>
            <td><input type="checkbox" name="chk" style="width:25px;height:25px"/></td>
            <td>
              <input type="number" id="qte" name="qte" min="1" max="64" style="height:25px">
          	</td>
            <td>
                <select name="echantillon" id="echantillon" style="height:25"/>
                    <option selected="selected" value=""></option>
                    <?php foreach(getListeMed() as $laLigne){ ?>
                    <option value="<?php echo $laLigne['idMed'];?>"><?php echo $laLigne['Nom commercial']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
    </table>
	<div>
	<input type="button" value="Ajouter un echantillon" onclick="addRow('dataTable')" style="height:25px;width:auto" class="btn btn-success bouton"/>
    <input type="button" value="Supprimer les échantillons sélectionnés" onclick="deleteRow('dataTable')" style="height:25px;width:auto" class="btn btn-success bouton"/>
	</div>
	</div>


<br>


    <div>
	    <input class="btn btn-success bouton" type="submit" name="bouton" value="Enregistrer">
	</div>
</form>
</div>

<script language="javascript">
		var a=1;
		function addRow(tableID) {
        a++;
        if(a<11){
              var table = document.getElementById(tableID);
              var rowCount = table.rows.length;
              var row = table.insertRow(rowCount);
              var colCount = table.rows[0].cells.length;
              for(var i=0; i<colCount; i++) {
                  var newcell	= row.insertCell(i);
                  newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                  //alert(newcell.childNodes);
                  switch(newcell.childNodes[0].type) {
                      case "text":
                              newcell.childNodes[0].value = "";
                              break;
                      case "checkbox":
                              newcell.childNodes[0].checked = false;
                              break;
                      case "select-one":
                              newcell.childNodes[0].selectedIndex = 0;
                              break;
                  }
              }
           } 
		}
		function deleteRow(tableID) {
			try {
			var table = document.getElementById(tableID);
			var rowCount = table.rows.length;
			for(var i=0; i<rowCount; i++) {
            	a--;
				var row = table.rows[i];
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {
					if(rowCount <= 1) {
						alert("Cannot delete all the rows.");
						break;
					}
					table.deleteRow(i);
					rowCount--;
					i--;
				}
			}
			}catch(e) {
				alert(e);
			}
		}
</script>