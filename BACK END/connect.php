<?php
//$connect = new mysqli("db", "admin","admin","crud"); //con docker
$connect = new mysqli("localhost", "root","root","crud"); //con xampp
if(!$connect){
    echo "Connection server error";
}
?>