<?php
include "connect.php";
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password1 = $_POST["password1"];
$t["text"]="";
mysqli_query($connect, "SET FOREIGN_KEY_CHECKS=0");

if($password!=$password1){
    $t["text"] = $t["text"] . "The passwords entered are different\n";
}

$check_email = mysqli_query($connect, "SELECT Email FROM user where Email = '$email' "); //cerca se ci sono email uguali a quelle già messe

if (mysqli_num_rows($check_email) > 0) { // se esiste già un'email uguale
    $t["text"]=  $t["text"] . "The email entered already exists\n";

} else { //altrimenti inserisco i dati nel database
    $sql = "insert into `user` values('NULL','$email','$password','$username','$name','$surname','NULL')";
    $result = mysqli_query($connect, $sql);

}

if ($t["text"]=="") {
    $t["text"]= $t["text"] ."Thanks! You are now registered\n";
}
echo json_encode(array("text" => $t["text"]));

?>