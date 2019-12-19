<?php
    session_start();
    require_once ("bd_login.php");

    if (isset($_SESSION['login'])){
        
        $_SESSION['status_connexion'] = "success";

        require_once("headerlogged.html");

        require_once("footerlogged.html");
    }else{
        header("Location: menu_accueil.php"); /* Redirection du navigateur */
        $_SESSION['status_connexion'] = "failed";
        
        exit;
    }
?>








