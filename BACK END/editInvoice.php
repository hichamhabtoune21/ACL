<?php
session_start();
include("connect.php");

$clientID = $_POST["client"];
$number = $_POST["num"];
$date = $_POST["date"];
$bus_name = $_POST["bus_name"];
$pay_type = $_POST["pay_type"];
$amount = $_POST["amount"];
$invoiceID = $_POST["id"];
$success = false;
$query = "SELECT * FROM invoice WHERE ID_Invoice=?";
$result = $connect->prepare($query);
$result->bind_param("i", $invoiceID);
$result->execute();
$result = $result->get_result();

if (mysqli_num_rows($result) > 0) {
    $invoice = mysqli_fetch_array($result);
    $query = "SELECT * FROM client WHERE ID_Client=?";
    $result = $connect->prepare($query);
    $result->bind_param("i", $clientID);
    $result->execute();
    $result = $result->get_result();
    if (mysqli_num_rows($result) > 0) {
        $client = mysqli_fetch_array($result);
        $query = "UPDATE invoice SET `Progressive number`= ?,`Issuing date`= ?,`Business name`= ?,`Amount`= ?,`Payment type` = ?, `ID_Client`= ? WHERE `ID_Invoice`= ?";
        $result = $connect->prepare($query);
        $result->bind_param("issisii", $number, $date, $bus_name, $amount, $pay_type, $clientID, $invoiceID);
        $result->execute();
        $success = true;

    }
}
if ($success) {
    echo json_encode(
        array(
            "text" => "success",
            "clientName" => $client["Name"],
            "clientSurname" => $client["Surname"],
            "num" => $number,
            "date" => $date,
            "amount" => $amount,
            "pay_type" => $pay_type,
            "ID_Invoice" => $invoiceID,
            "bus_name" => $bus_name,
            "clientID" => $clientID,
            "role" => $_SESSION["ruolo"]
        )
    );
} else {
    echo json_encode(array("text" => "failed"));
}






?>