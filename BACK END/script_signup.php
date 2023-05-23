<?php
include "connect.php";
require 'translation/init.php';
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password1 = $_POST["password1"];
$t["text"] = "";
$warning = false;


$hashed_password = md5($password);

mysqli_query($connect, "SET FOREIGN_KEY_CHECKS=0");

if ($password != $password1) {
    $t["text"] = $t["text"] . $translator->trans("The passwords entered are different")."<br>";
    $warning = true;


}
$query = "SELECT Email FROM user where Email = ?";
$check_email = $connect->prepare($query);
$check_email->bind_param("s", $email);
$check_email->execute();




if (mysqli_num_rows($check_email->get_result()) > 0) { // se esiste già un'email uguale
    $t["text"] = $t["text"] . $translator->trans("The email inserted already exists") . '<br>';
    $warning = true;
}



$query = "SELECT Username FROM user where Username = ?";
$check_username = $connect->prepare($query);
$check_username->bind_param("s", $username);
$check_username->execute();

if (mysqli_num_rows($check_username->get_result()) > 0) { // se esiste già un'email uguale
    $t["text"] = $t["text"] . $translator->trans("The username inserted already exists") . '<br>';
    $warning = true;
}


if (!$warning) {
    //altrimenti inserisco i dati nel database
    $query = "INSERT INTO `user` (`Email`, `Password`, `Username`, `Name`, `Surname`) VALUES (?,?,?,?,?)";
    $result = $connect->prepare($query);
    $result->bind_param("sssss", $email, $hashed_password, $username, $name, $surname);
    $result->execute();
    if (mysqli_affected_rows($connect) > 0) {
        $t["text"] = true;
        echo json_encode(array("text" => $t["text"]));
    } else {
        $t["text"] = false;
        $t["problem"] = mysqli_error($connect);
    }
} else {

    echo json_encode(array("text" => $t["text"]));
}

?>