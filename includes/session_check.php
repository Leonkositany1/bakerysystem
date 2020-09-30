<?php
    session_start();
    if(!isset($_SESSION["baker_login"])){
        header("location:login.php");
    }

?>