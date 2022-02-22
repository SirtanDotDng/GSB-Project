<?php session_start(); ?>

<?php include('includes/head.php'); ?>

<?php
if(isConnected()){
    include('includes/header.php'); 
}
?>
<div class="a1">
  <section class="content">
<?php 

if(isset($_GET['c']) && isConnected()){
    $c=$_GET['c'];
}else{
    $c="";
}

switch ($c) {
    
  case "menu" :
    include('controllers/c_menu.php');
    break;
  default :
    include('controllers/c_compte.php');
    break;
}

?>
  </section>
</div>
<?php
if(isConnected()){
  include('includes/footer.php');
}
?>