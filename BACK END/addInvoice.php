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


$query= "insert into invoice values ('NULL', '$number', '$date', '$bus_name',
        '$amount','$pay_type', '$clientID')"; 


$result=mysqli_query($connect,$query);

$last_id = mysqli_insert_id($connect); //id appena inserito della fattura

$query= "SELECT * FROM client where ID_Client='$clientID'";

$result = mysqli_query($connect,$query);
$client = mysqli_fetch_array($result);
$values= array('clientName'=>$client["Name"], 'clientSurname'=>$client["Surname"],'number'=>$_POST["num"], 'date'=>$_POST["date"], 'bus_name'=> $_POST["bus_name"], 'pay_type' => $_POST["pay_type"],'amount'=>$_POST["amount"],
                'ID_Invoice' => $last_id);


if($result){
    
   echo json_encode($values);
   
  //$val=array("bello"=>10);
//echo json_encode($val);
    //echo json_encode(array('success' => "bello"));

}
//echo json_encode(array('success' => "bello"));

        


//echo $_POST["bus_name"];



?>