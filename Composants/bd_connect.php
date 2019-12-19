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

        // Démarre la transaction et désactive l'autocommit
        $conn->beginTransaction();

        /* On execute la requete 1 si pas préparée
        */
        $sql1 = "INSERT INTO user(name_user,firstname_user,position_user,login_user,password_user)
        VALUES('dupdo1nt','jo1de','ma1dnager','jddupont','mdp')";

        $conn->exec($sql1);

        echo 'Entrée 1 ajoutée dans la table </br>';

        /* On execute la requete 2 si pas préparée
        */
        $sql2 = "INSERT INTO user(name_user,firstname_user,position_user,login_user,password_user)
        VALUES('durand','phil','directeur','pdurand','mdp2')";

        $conn->exec($sql2);

        //Autorise l'envoie de la transaction
        $conn->commit();
        echo 'Entrée 2 ajoutée dans la table </br>';

	}

	/*On capture les exceptions si une exception est lancée et on affiche
    *les informations relatives à celle-ci*/
    
	catch(PDOException $e){
        // Annule les transactions et restaure le mode autocommit
        $conn->rollBack();
	echo "Erreur : " . $e->getMessage(). "</br>";
    }
    
    // On "kill" la connexion
    $conn = null;

