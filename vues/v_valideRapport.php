<div class="list" style="display: flex; align-items: center;">
<div style="text-align: center; display: flex; flex-direction: column;">
<?php
echo "<h1>Le rapport n°".$_GET['rap']." du collaborateur immatriculé ".$_GET['mat']." a bien été validé.</h1>";
echo "<p>Vous allez être redirigé automatiquement</p>";
?>
<script>
setTimeout(function(){
    window.location.href = 'index.php?c=rapports&a=checkRapportNouveaux';
}, 4000);
</script>
</div>
</div>