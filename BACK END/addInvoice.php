<?php
session_start();
include("connect.php");
$clientID=$_POST["client"];
$number=$_POST["num"];
$date=$_POST["date"];
$bus_name=$_POST["bus_name"];
$pay_type=$_POST["pay_type"];
$amount=$_POST["amount"];

mysqli_query($connect, "SET FOREIGN_KEY_CHECKS=0");


$query= "insert into fattura values ('NULL', '$number', '$date', '$bus_name',
        '$amount','$pay_type', '$clientID', 'NULL')"; 


$result=mysqli_query($connect,$query);


$query= "SELECT * FROM cliente where ID_Cliente='$clientID'";

$result = mysqli_query($connect,$query);
$client = mysqli_fetch_array($result);
$values= array('clientName'=>$client["Nome"], 'clientSurname'=>$client["Cognome"],'number'=>$_POST["num"], 'date'=>$_POST["date"], 'bus_name'=> $_POST["bus_name"], 'pay_type' => $_POST["pay_type"],'amount'=>$_POST["amount"]);


if($result){
    
   echo json_encode($values);
   
  //$val=array("bello"=>10);
//echo json_encode($val);
    //echo json_encode(array('success' => "bello"));

}
//echo json_encode(array('success' => "bello"));

        


//echo $_POST["bus_name"];



?>