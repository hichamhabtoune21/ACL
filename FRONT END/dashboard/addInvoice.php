<?php
session_start();
include("../../BACK END/connect.php");

mysqli_query($connect, "SET FOREIGN_KEY_CHECKS=0");
echo $_POST["bus_name"];



?>