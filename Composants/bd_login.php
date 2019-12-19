<?php
    if (isset($_POST['submit_connect']) ){
        // Protection contre les caractères spéciaux & espaces début et fin
        $login = htmlentities(trim($_POST['login']));
        // Cryptage du mdp
        $password = password_hash(trim($_POST['password']),PASSWORD_DEFAULT);
     
        require_once('requete_login_pdo.php')
        // Requête SELECT de tous les login
    } else {
        
    }

