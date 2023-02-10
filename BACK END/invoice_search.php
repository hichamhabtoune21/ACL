<?php
include("connect.php");
$id_invoice=$_POST["ID_Invoice"];

$query="SELECT * FROM invoice WHERE ID_Invoice='$id_invoice'";

$result=mysqli_query($connect,$query);



if(mysqli_num_rows($result)>0){
    $invoice=mysqli_fetch_array($result);
    $id_client=$invoice["ID_Client"];
    $query="SELECT * FROM client WHERE ID_Client='$id_client'";
    $client=mysqli_query($connect,$query);
    $client=mysqli_fetch_array($client);
    echo json_encode(array("clientName"=>$client["Name"], "clientSurname"=>$client["Surname"],"num"=>$invoice["Progressive number"], "date"=> $invoice["Issuing date"],
                            "amount"=>$invoice["Amount"], "pay_type"=>$invoice["Payment type"], "ID_Invoice"=>$invoice["ID_Invoice"], "bus_name"=>$invoice["Business name"],
                            "clientID"=>$client["ID_Client"]));
}




?>