<div class="list" id="poi">
    <section class="newrap">
        <h1> Modifier le rapports n°<?php echo $rapport ?></h1>
            <form class="saisieRapport" action="?c=rapports&a=updateRapport&rap=<?php echo $_GET['rap'] ?>" method="post">
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
                        <?php foreach($praticiens as $laLigne){ ?>
                            <option value="<?php echo $laLigne['idPra'];?>"<?php if($laLigne['idPra'] == $praticien)echo "selected";?>><?php echo $laLigne['Nom']; echo " "; echo $laLigne['Prenom'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="medDepotLeg">Nom Médicament</label>
                    <select name="medDepotLeg" id="medDepotLeg" />
                        <option selected="selected" value=""></option>
                        <?php foreach($medicaments as $laLigne){ ?>
                        <option value="<?php echo $laLigne['idMed'];?>"<?php if($laLigne['idMed'] == $medicament1)echo "selected";?>><?php echo $laLigne['Nom commercial']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                <label for="medDepotLeg2">Nom Médicament</label>
                    <select name="medDepotLeg2" id="medDepotLeg2"/>
                        <option selected="selected" value=""></option>
                        <?php foreach($medicaments as $laLigne){ ?>
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
                            <option value="3" <?php if(3 == $motif)echo "selected";?>>Nouveauté</option>
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
                        <?php foreach($praticiens as $laLigne){ ?>
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



	var nbEchantillon = <?php echo $nbEchantillons[0];?>;

    function init(){
    
    	if(nbEchantillon != 0){
        var empTab = document.getElementById('empTable');
        <?php $key = 1; ?>
        <?php foreach(getEchantillon($_GET['rap']) as $laLigne){?>
        
        	arrayTD.push('button'+<?php echo $key?>);
        	var rowCnt = empTab.rows.length;
        	var tr = empTab.insertRow(rowCnt);
            tr.setAttribute('id','row'+ <?php echo $key ?> );

            for (var c = 0; c < arrHead.length; c++) {
                var td = document.createElement('td');
                td = tr.insertCell(c);

                if (c == 0) {
                    var button = document.createElement('input');
                    button.setAttribute('type', 'button');
                    <?php if($key !=  1){ ?>
                    	button.setAttribute('id','button'+<?php echo $key ?>);
                        button.setAttribute('value', 'Supprimer');
                        button.setAttribute('class', 'delechantillon');
                        button.setAttribute('onclick', 'removeRow(this)');
                    <?php }else{ ?>
                    	button.setAttribute('value', 'Ajouter un échantillon');
                        button.setAttribute('class', 'addechantillon');
                        button.setAttribute('id', 'addRow');
                        <?php } ?>
                    td.appendChild(button);

                }
                if (c == 1) {
                    var qte = document.createElement('input');
                    qte.setAttribute('type', 'number');
                    qte.setAttribute('min','1');
                    qte.setAttribute('name','qte'+<?php echo $key ?>);
                    qte.setAttribute('id','qte'+<?php echo $key ?>);
                    qte.setAttribute('value','<?php echo $laLigne['OFF_QTE'];?>');

                    td.appendChild(qte);
                }
                if (c == 2) {
                    var med = document.createElement('select');
                    med.setAttribute('value', '');
                    med.setAttribute('name','echantillon'+<?php echo $key ?>);
                    med.setAttribute('id','med'+<?php echo $key ?>);

                    var option = document.createElement("option");
                    option.setAttribute('value', '');
                    option.text = '';
                    med.appendChild(option);

                    <?php foreach($medicaments as $leMed){ ?>
                        var option = document.createElement("option");
                        option.setAttribute('value',"<?php echo $leMed['idMed'] ?>");
                        option.text ="<?php echo $leMed['Nom commercial']?>";
                  		<?php if($leMed['idMed'] == $laLigne['MED_DEPOTLEGAL']){?>
                        option.setAttribute('selected','true');
                        <?php } ?>
                        med.appendChild(option);
                    <?php } ?>

                    td.appendChild(med);
                    <?php $key++ ?>
                 }
             }
    <?php } ?>
    }else{
    		var empTab = document.getElementById('empTable');
        	var rowCnt = empTab.rows.length;
        	var tr = empTab.insertRow(rowCnt);
            tr.setAttribute('id','row1');

            for (var c = 0; c < arrHead.length; c++) {
                var td = document.createElement('td');
                td = tr.insertCell(c);

                if (c == 0) {
                    var button = document.createElement('input');
                    button.setAttribute('type', 'button');
                    button.setAttribute('value', 'Ajouter un échantillon');
                    button.setAttribute('class', 'addechantillon');
                    button.setAttribute('id', 'addRow');
                    td.appendChild(button);
                }
                if (c == 1) {
                    var qte = document.createElement('input');
                    qte.setAttribute('type', 'number');
                    qte.setAttribute('min','1');
                    qte.setAttribute('name','qte1');
                    qte.setAttribute('id','qte1');
                    td.appendChild(qte);
                }
                if (c == 2) {
                    var med = document.createElement('select');
                    med.setAttribute('value', '');
                    med.setAttribute('name','echantillon1');
                    med.setAttribute('id','med1');

                    var option = document.createElement("option");
                    option.setAttribute('value', '');
                    option.text = '';
                    med.appendChild(option);

                    <?php foreach($medicaments as $leMed){ ?>
                        var option = document.createElement("option");
                        option.setAttribute('value',"<?php echo $leMed['idMed'] ?>");
                        option.text ="<?php echo $leMed['Nom commercial']?>";
                  		<?php if($leMed['idMed'] == $laLigne['MED_DEPOTLEGAL']){?>
                        option.setAttribute('selected','true');
                        <?php } ?>
                        med.appendChild(option);
                    <?php } ?>

                    td.appendChild(med);
                 }
             }
		}  
     }
     init();


    
    function addRow(id){

        if( id < 11 ){

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
                    
                    var option = document.createElement("option");
                    option.setAttribute('value', '');
                    option.text = '';
                    med.appendChild(option);

                    <?php foreach($medicaments as $laLigne){ ?>
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
        for( var i = 0; i < <?php echo $nbEchantillons?>; i++){
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
        document.getElementById("cont").addEventListener("click", removeRow(this));
    }

    document.getElementById("addRow").addEventListener("click", idCheck);
    document.getElementById("removeRow").addEventListener("click", removeRow(this));
    document.getElementById("poi").addEventListener("load", nbEchantillon);   

</script>