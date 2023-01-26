<?php
session_start();
include("connect.php");
include("navbar.html");

$email = $_POST["email"];
$password = $_POST["password"];

$query  = mysqli_query($connect,"SELECT * FROM user WHERE email='$email' AND password = '$password' ");
if(mysqli_num_rows($query)>0){
    header("Location: ../FRON END/dashboard/admin-dashboard.html");
}

//$check_email = mysqli_query($connect, "SELECT Email FROM user where Email = '$email' ");


?>