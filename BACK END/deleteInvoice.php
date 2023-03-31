<?php
include("connect.php");
$idInvoice = $_POST["ID_Invoice"];
$query="DELETE FROM invoice where ID_Invoice = ?";
$result=$connect->prepare($query);
$result->bind_param("i",$idInvoice);
$result->execute();
$result=$result->get_result();
if($result){
    echo json_encode(array("success"=>"yes"));
}
else{
    echo json_encode(array("success"=>"no"));
}
?>