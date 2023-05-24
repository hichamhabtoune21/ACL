<?php
$connect = new mysqli("host_database", "username","password","name_database"); //con docker
  //$connect = new mysqli("localhost", "root","root","crud"); //con xampp
if(!$connect){ 
    echo "Connection server error";
}
?>