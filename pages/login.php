<?php 

$mail = $_POST['mail'];
$password = $_POST['pass'];

require('../includes/fonctions.php');
login($mail, $password);

?>