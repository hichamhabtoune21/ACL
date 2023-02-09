<?php
session_start();
include("../../BACK END/connect.php");
$clientID=$_POST["client"];
$number=$_POST["num"];
$date=$_POST["date"];
$bus_name=$_POST["bus_name"];
$pay_type=$_POST["pay_type"];
$amount=$_POST["amount"];
mysqli_query($connect, "SET FOREIGN_KEY_CHECKS=0");
$values= array("clientID"=>$_POST["client"],"number"=>$_POST["num"],$date=>$_POST["date"],"bus_name"=>$_POST["bus_name"],"pay_type"=>$_POST["pay_type"],"amount"=>$_POST["amount"]);
$query= "insert into fattura values ('NULL', '$number', '$date', '$bus_name',
        '$amount','$pay_type', '$clientID', 'NULL')"; 
$result=mysqli_query($connect,$query);

if($result){
    echo json_encode($values);
}
        


//echo $_POST["bus_name"];



?>