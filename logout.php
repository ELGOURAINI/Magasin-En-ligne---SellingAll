<?php
    session_start();
    unset($_SESSION["emailadmin"]);
    //session_destroy();
    header('location:index.php');
?>
