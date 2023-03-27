<?php
$connect = new mysqli("db", "admin","admin","crud"); //con docker
//$connect = new mysqli("localhost", "root","","crud"); //con xampp
if(!$connect){
    echo "Connection server error";
}
?>