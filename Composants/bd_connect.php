<?php

$servername = 'localhost';
    $db_name = 'easydelivery';
	$username = 'root';
	$password = '';
	
    //On essaie de se connecter
    
	try{
        $conn = new PDO("mysql:host=$servername;dbname=".$db_name, $username, $password);
        
        // On définit le mode d'erreur de PDO sur Exception
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo 'Connexion réussie </br>';
	}

	/*On capture les exceptions si une exception est lancée et on affiche
    *les informations relatives à celle-ci*/
    
	catch(PDOException $e){
        // Annule les transactions et restaure le mode autocommit
        $conn->rollBack();
	echo "Erreur : " . $e->getMessage(). "</br>";
    }
    
    // // On "kill" la connexion
    // $conn = null;

