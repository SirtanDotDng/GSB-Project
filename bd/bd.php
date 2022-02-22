<?php
    function connexionPDO() {
        $login = 'dbu1876732';
        $mdp = 'GSBProjectSIO2';
        $bd = 'dbs5026208';
        $serveur = 'db5006000118.hosting-data.io';

        try {
            $conn = new PDO("mysql:host=$serveur;dbname=$bd",$login,$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
            //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            print "Erreur de connexion PDO ";
            die();
        }
    }
?>