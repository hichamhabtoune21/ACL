<?php
require "translation/init.php";
include("connect.php");

$idUser = $_POST["ID_User"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_changed = $_POST["password_changed"];
$hashed_password=$password;
if ($password_changed=="true") {
    $hashed_password = md5($password);
}

$query = "SELECT * FROM user WHERE Email = ? OR Username = ?";
$result = $connect->prepare($query);
$result->bind_param("ss", $email, $username);
$result->execute();
$result = $result->get_result();

if (mysqli_num_rows($result) > 1) {
    // Email o username già esistenti nel database
    echo json_encode(array("text" => $translator->trans("Email or username already exists")));
} else {
    // Esegui l'aggiornamento delle informazioni dell'utente
    $query = "UPDATE user SET Email=?, Password=?, Username=?, Name=?, Surname=? WHERE ID_User=?";
    $result = $connect->prepare($query);
    $result->bind_param("sssssi", $email, $hashed_password, $username, $name, $surname, $idUser);
    $result->execute();
    echo json_encode(array("text" => $translator->trans("User information updated successfully")));
}
?>