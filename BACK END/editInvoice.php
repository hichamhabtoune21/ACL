<?php
session_start();
include("connect.php");

$clientID=$_POST["client"];
$number=$_POST["num"];
$date=$_POST["date"];
$bus_name=$_POST["bus_name"];
$pay_type=$_POST["pay_type"];
$amount=$_POST["amount"];
$invoiceID=$_POST["id"];

$query="SELECT * FROM invoice WHERE ID_Invoice='$invoiceID'";
$result=mysqli_query($connect,$query);
if(mysqli_num_rows($result)>0){
    $invoice=mysqli_fetch_array($result);
    $query="SELECT * FROM client WHERE ID_Client='$clientID'";
    $result=mysqli_query($connect,$query);
    if(mysqli_num_rows($result)>0){
        $client=mysqli_fetch_array($result);
        $query="UPDATE invoice SET `Progressive number`='$number',`Issuing date`='$date',`Business name`='$bus_name',`Amount`='$amount',`Payment type` = '$pay_type', `ID_Client`='$clientID' WHERE `ID_Invoice`='$invoiceID'";
        $connect->query($query);
        echo json_encode(array("text"=>"success","clientName"=>$client["Name"], "clientSurname"=>$client["Surname"],"num"=>$invoice["Progressive number"], "date"=> $invoice["Issuing date"],
        "amount"=>$invoice["Amount"], "pay_type"=>$invoice["Payment type"], "ID_Invoice"=>$invoice["ID_Invoice"], "bus_name"=>$invoice["Business name"],
        "clientID"=>$client["ID_Client"]));
    }
}
else{
    echo json_encode(array("text"=>"failed"));
}






?>