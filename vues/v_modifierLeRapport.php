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

<div class="list" id="poi">
<section class="newrap">
<h1> Modifier le rapports n°<?php echo $rapport ?></h1>
<form class="saisieRapport" action="?c=rapports&a=updateRapport" method="post">
    <div>
        <label for="rapDate">Date Rapport</label>
        <input value="<?php echo $date; ?>" class="casesinput" type="date" name="rapDate" id="rapDate" required/>
    </div>
    <div>
        <label for="rapBilan">Bilan Rapport</label>
        <textarea class="casesinput" type="text" name="rapBilan" id="rapBilan" required/><?php echo $bilan; ?></textarea>
    </div>
    <div>
        <label for="praNum">Praticien</label>
        <select name="praNum" id="praNum" required/>
            <?php foreach(getListePra() as $laLigne){ ?>
            	<option value="<?php echo $laLigne['idPra'];?>"<?php if($laLigne['idPra'] == $praticien)echo "selected";?>><?php echo $laLigne['Nom']; echo " "; echo $laLigne['Prenom'] ?></option>
      		<?php } ?>
        </select>
    </div>
    <div>
        <label for="medDepotLeg">Nom Médicament</label>
        <select name="medDepotLeg" id="medDepotLeg" />
      		<option selected="selected" value=""></option>
            <?php foreach(getListeMed() as $laLigne){ ?>
            <option value="<?php echo $laLigne['idMed'];?>"<?php if($laLigne['idMed'] == $medicament1)echo "selected";?>><?php echo $laLigne['Nom commercial']; ?></option>
      		<?php } ?>
        </select>
    </div>
    <div>
    <label for="medDepotLeg2">Nom Médicament</label>
        <select name="medDepotLeg2" id="medDepotLeg2"/>
      		<option selected="selected" value=""></option>
            <?php foreach(getListeMed() as $laLigne){ ?>
            <option value="<?php echo $laLigne['idMed'];?>"<?php if($laLigne['idMed'] == $medicament2)echo "selected";?>><?php echo $laLigne['Nom commercial']; ?></option>
      		<?php } ?>
        </select>
    </div>
	<div>
        <label for="idMotif">Motif</label>
        <select name="idMotif" id="idMotif" />
                <option value="0" <?php if(0 == $motif)echo "selected";?>>Autre</option>
      			<option value="1" <?php if(1 == $motif)echo "selected";?>>Périodique</option>
      			<option value="2" <?php if(2 == $motif)echo "selected";?>>Actualisation</option>
      	</select>
	</div>

	<div id="motifTitle">
        <label for="motifAutre">Motif Autre</label>
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
        <label for="remplacant">Remplacant Praticien</label>
        <select name="remplacant" id="remplacant"/>
      	<option selected="selected" value=""></option>
            <?php foreach(getListePra() as $laLigne){ ?>
            	<option value="<?php echo $laLigne['idPra'];?>"<?php if($laLigne['idPra'] == $remplacant)echo "selected";?>><?php echo $laLigne['Nom']; echo " "; echo $laLigne['Prenom'] ?></option>
      		<?php } ?>
        </select>
    </div><br>



	<div id="cont">
    <table style="width:100%" id="empTable">
    <?php 
            if(!empty(getEchantillon($_GET['rap']))){
                $id = 1;?>
                
            <tr>
                <th></th>
                <th>Quantité</th>
                <th>Médicament</th>
            </tr>
            <?php foreach(getEchantillon($_GET['rap']) as $laLigne){?>
            <tr id='row<?php echo $id?>'>
                <td>
                    <?php if($id==1){
                echo'<input class="addechantillon" type="button" id="addRow" value="Ajouter un échantillon"/>';
            }else{
                echo'<input class="delechantillon" type="button" id="removeRow" value="Supprimer"/>';}?>
                </td>
                <td>
                    <input min="1" name="qte<?php echo $id?>" type="number" value="<?php echo $laLigne['OFF_QTE'];?>">
                </td>
                <td>
                    <select name="echantillon<?php echo $id?>" id="echantillon"/>
                    <?php foreach(getListeMed() as $leMed){ ?>
                        <option value="<?php echo $leMed['idMed'];?>"<?php if($leMed['idMed'] == $laLigne['MED_DEPOTLEGAL'])echo "selected";?>><?php echo $leMed['Nom commercial']; ?></option><?php }?>
                    </select>
                </td>
            </tr>
            <?php $id++;}}else{?>
                
                <tr>
                <th></th>
                <th>Quantité</th>
                <th>Médicament</th>
                </tr>

                <tr>
                <td>
                <input class="addechantillon" type="button" id="addRow" value="Ajouter un échantillon"/>
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



            <?php } ?>
    </table>
    </div>
    
    <div>
        <label for="rapEtat">Saisie définitive |</label>
        <input name="rapEtat" type="checkbox" value="1"/>
	</div>
<div style="text-align:center">
	    <input style="margin-top:1%; font-size:14px" class="addechantillon" type="submit" name="bouton" value="Enregistrer">
	</div>
</section>
</form>
</div>

<script>

    var arrHead = new Array(); arrHead = ['', 'Quantité', 'Médicament'];
    var arrayTD = ['button1'];
    
    function addRow(id){

        if(id<11){

            var empTab = document.getElementById('empTable');
            var rowCnt = empTab.rows.length;
            var tr = empTab.insertRow(rowCnt);
            
            tr.setAttribute('id','row'+id);

            for (var c = 0; c < arrHead.length; c++) {
                var td = document.createElement('td');
                td = tr.insertCell(c);

                if (c == 0) {
                    var button = document.createElement('input');
                
                    button.setAttribute('type', 'button');
                    button.setAttribute('value', 'Supprimer');
                    button.setAttribute('class', 'delechantillon');
                    button.setAttribute('onclick', 'removeRow(this)');
                    button.setAttribute('id','button'+id);
                    td.appendChild(button);
                }
                if (c == 1) {
                    var qte = document.createElement('input');
                    qte.setAttribute('type', 'number');
                    qte.setAttribute('min','1');
                    qte.setAttribute('name','qte'+id);
                    qte.setAttribute('id','qte'+id);
                
                    td.appendChild(qte);
                }
                if (c == 2) {
                    var med = document.createElement('select');
                    med.setAttribute('value', '');
                    med.setAttribute('name','echantillon'+id);
                    med.setAttribute('id','med'+id);
                    
                    var option = document.createElement("option")
                    option.setAttribute('value', '');
                    option.text = '';
                    med.appendChild(option);

                    <?php foreach(getListeMed() as $laLigne){ ?>
                        var option = document.createElement("option");
                        option.setAttribute('value',"<?php echo $laLigne['idMed'] ?>");
                        option.text ="<?php echo $laLigne['Nom commercial']?>";
                        med.appendChild(option);
                    <?php } ?>
                    
                    td.appendChild(med);
                }
            }
        }
    }


    function nbEchantillon(){
        for( var i = 0; i < <?php echo getNbEchantillon($_GET['rap'])?>; i++){
            arrayTD.push('button'+i);
        }
    }

    
    function idCheck(){
        
        var index = 1;
        var added = false;
        
        while(!added && index < 11){
            
            var indexQte = 'button'+index;
            
            if(!contains(indexQte, arrayTD)){
                arrayTD.push(indexQte)
                addRow(index);
                added = true;
            }
            
            index++;
        
        }
    }

    function contains(indexQte, arrayTD){
        return (arrayTD.includes(indexQte));
    }


    function removeRow(button){

        var empTab = document.getElementById('empTable');
        for( var i = 0; i < arrayTD.length; i++){ 
            if ( arrayTD[i] == button.id ){ 
                arrayTD.splice(i, 1); 
            }
        }
        empTab.deleteRow(button.parentNode.parentNode.rowIndex);
    }

    document.getElementById("addRow").addEventListener("click", idCheck);
    document.getElementById("removeRow").addEventListener("click", removeRow(this));
    document.getElementById("poi").addEventListener("load", nbEchantillon);

</script>