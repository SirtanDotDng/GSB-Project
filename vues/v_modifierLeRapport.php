<?php 
$leRapport = getLeRapportAttente($_GET['rap']);

$matricule =    $leRapport[0][0];
$rapport =      $leRapport[0][1];
$date =         $leRapport[0][2];
$bilan =        $leRapport[0][3];
$saisie =       $leRapport[0][4];
$etat =         $leRapport[0][5];
$praticien =    $leRapport[0][6];
$medicament1 =  $leRapport[0][7];
$medicament2 =  $leRapport[0][8];
$motif =        $leRapport[0][9];
$autreMotif =   $leRapport[0][10];
$remplacant =   $leRapport[0][11];
?>

<div class="list">
<section class="newrap">
<h1> Modifier le rapports n°<?php echo $rapport ?></h1>
<form class="saisieRapport" action="?c=rapports&a=updateRapport" method="post">
    <div>
        <label for="rapDate">Date Rapport :</label>
        <input value="<?php echo $date; ?>" class="casesinput" type="date" name="rapDate" id="rapDate" required/>
    </div>
    <div>
        <label for="rapBilan">Bilan Rapport :</label>
        <textarea class="casesinput" type="text" name="rapBilan" id="rapBilan" required/><?php echo $bilan; ?></textarea>
    </div>
    <div>
        <label for="praNum">Praticien :</label>
        <select name="praNum" id="praNum" required/>
            <?php foreach(getListePra() as $laLigne){ ?>
            	<option value="<?php echo $laLigne['idPra'];?>"<?php if($laLigne['idPra'] == $praticien)echo "selected";?>><?php echo $laLigne['Nom']; echo " "; echo $laLigne['Prenom'] ?></option>
      		<?php } ?>
        </select>
    </div>
    <div>
        <label for="medDepotLeg">Nom Médicament :</label>
        <select name="medDepotLeg" id="medDepotLeg" />
      		<option selected="selected" value=""></option>
            <?php foreach(getListeMed() as $laLigne){ ?>
            <option value="<?php echo $laLigne['idMed'];?>"<?php if($laLigne['idMed'] == $medicament1)echo "selected";?>><?php echo $laLigne['Nom commercial']; ?></option>
      		<?php } ?>
        </select>
    </div>
    <div>
    <label for="medDepotLeg2">Nom Médicament :</label>
        <select name="medDepotLeg2" id="medDepotLeg2"/>
      		<option selected="selected" value=""></option>
            <?php foreach(getListeMed() as $laLigne){ ?>
            <option value="<?php echo $laLigne['idMed'];?>"<?php if($laLigne['idMed'] == $medicament2)echo "selected";?>><?php echo $laLigne['Nom commercial']; ?></option>
      		<?php } ?>
        </select>
    </div>
	<div>
        <label for="idMotif">Motif :</label>
        <select name="idMotif" id="idMotif" />
                <option value="0" <?php if(0 == $motif)echo "selected";?>>Autre</option>
      			<option value="1" <?php if(1 == $motif)echo "selected";?>>Périodique</option>
      			<option value="2" <?php if(2 == $motif)echo "selected";?>>Actualisation</option>
      	</select>
	</div>

	<div id="motifTitle">
        <label for="motifAutre">Motif Autre :</label>
        <input value="<?php echo $autreMotif; ?>"class="casesinput" type="text" name="motifAutre" id="motifAutre" />
    </div>

    <script>
    var ddl = document.getElementById("idMotif");
    ddl.onchange=hideMotif;
    function hideMotif()
    {   
        var ddl = document.getElementById("idMotif");
        var selectedValue = ddl.options[ddl.selectedIndex].value;


        if (selectedValue == "0")
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
            	<option value="<?php echo $laLigne['idPra'];?>"<?php if($laLigne['idPra'] == $remplacant)echo "selected";?>><?php echo $laLigne['Nom']; echo " "; echo $laLigne['Prenom'] ?></option>
      		<?php } ?>
        </select>
    </div><br>



	<div id="cont">
    <table style="width:100%" id="empTable">
            <tr>
                <th></th>
                <th>Quantité</th>
                <th>Médicament</th>
            </tr>
            <tr>
                <td>
                <input style="border-left: #388a02 solid 4px; background: #eefff0;" type="button" id="addRow" value="Ajouter un échantillon"/>
                </td>
                <td>
                    <input min="1" name="qte1" type="number">
                </td>
                <td>
                    <select name="echantillon1" id="echantillon"/>
                        <option selected="selected" value="">
                        </option><?php foreach(getListeMed() as $laLigne){ ?><option value="<?php echo $laLigne['idMed'];?>"><?php echo $laLigne['Nom commercial']; ?></option><?php }?>
                    </select>
                </td>
            </tr>
    </table>
    </div>
    
    <div>
        <label for="rapEtat">Saisie définitive |</label>
        <input name="rapEtat" type="checkbox" value="1"/>
	</div>

<br>
</section>
    <div style="text-align:center">
	    <input style="border-radius:0px; margin-top:-4%; width:50%; size:24px; font-weight:400" class="btn btn-success bouton" type="submit" name="bouton" value="Enregistrer">
	</div>
</form>
</div>

<script>
    
    var id=1;
    var arrHead = new Array();
    arrHead = ['', 'Quantité', 'Médicament'];
    
    function addRow() {

        id++;
        
        if(id<=10){
            var empTab = document.getElementById('empTable');
            var rowCnt = empTab.rows.length;
            var tr = empTab.insertRow(rowCnt);
            
            tr = empTab.insertRow(rowCnt);

            for (var c = 0; c < arrHead.length; c++) {
                var td = document.createElement('td');
                td = tr.insertCell(c);

                if (c == 0) {
                    var button = document.createElement('input');
                
                    button.setAttribute('type', 'button');
                    button.setAttribute('value', 'Supprimer');
                    button.setAttribute('style', 'background:#ffeeee; border-left: #8a0202 solid 4px');
                    button.setAttribute('onclick', 'removeRow(this)');

                    td.appendChild(button);
                }
                if (c == 1) {
                    var qte = document.createElement('input');
                    qte.setAttribute('type', 'number');
                    qte.setAttribute('min','1');
                    qte.setAttribute('name','qte'+id);
                    var option = document.createElement("option")
                    option.value = "value";
                    option.text = "text";
                    qte.appendChild(option);
                
                    td.appendChild(qte);
                }
                if (c == 2) {
                    var med = document.createElement('select');
                    med.setAttribute('value', "");
                    med.setAttribute('name','echantillon'+id);
                    med.setAttribute('id','echantillon');
                    
                    td.appendChild(med);
                }
            }
        }
    }

    function removeRow(button) {

        id--;

        var empTab = document.getElementById('empTable');
        empTab.deleteRow(button.parentNode.parentNode.rowIndex);
    }

    document.getElementById("addRow").addEventListener("click", addRow);

</script>