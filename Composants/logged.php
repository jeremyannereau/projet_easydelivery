

<?php
    session_start();
    echo "En cours : session de ". $_SESSION["login"];

    require_once("headerlogged.html");

    require_once("footerlogged.html");
?>








