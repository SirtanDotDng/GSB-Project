<div class="list">
  <h1> GSB </h1>
  <p>Chers visiteurs,</p>
  <p>Bienvenue dans notre nouvelle application GSB Compte-rendu !</p>
  <p>Ici, vous pourrez :</p>
  <ul>
    <li>Consulter la liste des <a href="https://gsb.mattatyalexis.fr/?c=menu&a=praticiens">praticiens</a> enregistrés, ainsi que celle des <a href="https://gsb.mattatyalexis.fr/?c=menu&a=medicaments">médicaments</a></li>
    <li><a href="https://gsb.mattatyalexis.fr/?c=rapports&a=addRapport">Taper vos rapports de visite</a> avec toutes les informations nécessaires, et même <a href="https://gsb.mattatyalexis.fr/?c=rapports&a=modifyRapports">les reprendre</a> si vous les avez laissés en suspend</li>
    <li><a href="https://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportSearch">Consulter ces dit rapports</a> une fois enregistrés en tant que rapports définitifs</li>
    <?php
  if($_SESSION['grade'] == 2){
  echo '<li>Et en tant que Délégué, alors vous pourrez <a href="https://gsb.mattatyalexis.fr/?c=rapports&a=checkRapportSearchD">consulter ceux de votre région attitrée</a></li>';}?>
  </ul>
  <p>De plus vous pourrez si vous le souhaitez, regarder vos informations personnelles dans l'onglet <a href="https://gsb.mattatyalexis.fr/?c=compte&a=monCompte">MON COMPTE</a>, c'est ici que vous devrez vous déconnecter une fois l'activité terminée.</p>
</div>