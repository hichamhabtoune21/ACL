<?php
session_start();
include("connect.php");
if(isset($_SESSION["id"]) && $_SESSION["ruolo"]=="Admin"){
    header("location: ../FRONT END/dashboard/all_users.php");
    //include("../FRONT END/dashboard/all_users.php");
}
else{
    echo "Access denied";
}
?>
