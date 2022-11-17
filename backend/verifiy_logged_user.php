<?php
ini_set("display_errors",0);

session_start();
if($_SESSION['loggedin'] == false){
    header("location:/sa_unipet/src/pages/login.php");
}