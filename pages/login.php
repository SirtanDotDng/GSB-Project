<?php 
require('../includes/bd.php'); 
require('../includes/fonctions.php');
?>

<?php 

$mail = $_POST['mail'];
$password = $_POST['password'];

login($mail, $password);

?>