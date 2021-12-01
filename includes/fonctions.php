<?php

    require('bd.php');

    function login($email,$password){
    global $db;

    $pass = $password;
    $mail = $email;

    $monPdo = connexionPDO();
    $req="SELECT Mail, password FROM compte WHERE Mail = ? AND password = ?";
    $query = $monPdo->prepare($req);
    $query->execute(array($mail, $password));
    $laLigne=$query->fetch();
    if($laLigne){
        session_start();
        $_SESSION['email']=$email;
        header("location:../index.php");
    }else{
        echo "Identifiants invalides";
    }
}

?>