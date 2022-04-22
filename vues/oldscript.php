<script>
	
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
       
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        
        for(var i=0; i<rowCount; i++) {
            
            var row = table.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            
            if(null != chkbox && true == chkbox.checked) {
                if(rowCount <= 1) {
                    alert("Vous ne pouvez pas supprimer toutes les lignes.");
                }
                table.deleteRow(i);
                a--;
                rowCount--;
                i--;
            }
		}
	}
</script>