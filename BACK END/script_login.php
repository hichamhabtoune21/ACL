<?php
session_start();
include("connect.php");
include("navbar.html");

$email = $_POST["email"];
$password = $_POST["password"];

$query  = mysqli_query($connect,"SELECT * FROM user WHERE email='$email' AND password = '$password' ");
if(mysqli_num_rows($query)>0){
    header("Location: ../FRONT END/dashboard/admin-dashboard.php");
    $_SESSION["id"] = session_id();

    //$user_get = mysqli_query($connect, "SELECT * FROM user WHERE email='$email' AND password = '$password'");
    $user = mysqli_fetch_array($query);
    $_SESSION["username"] = $user["Username"];
    //console . log($_SESSION["username"]);


}
else{
    echo "Email or password incorrect";
}

//$check_email = mysqli_query($connect, "SELECT Email FROM user where Email = '$email' ");


?>