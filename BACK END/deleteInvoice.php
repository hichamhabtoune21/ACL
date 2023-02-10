<?php
include("connect.php");
$idInvoice = $_POST["ID_Invoice"];
$query="DELETE FROM invoice where ID_Invoice= '$idInvoice'";
$result = mysqli_query($connect,$query);

if($result){
    echo json_encode(array("success"=>"yes"));
}
else{
    echo json_encode(array("success"=>"no"));
}








?>