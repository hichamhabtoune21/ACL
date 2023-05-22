<?php
$connect = new mysqli("db", "admin","ACL_GROUP_1","crud"); //con docker
  //$connect = new mysqli("localhost", "root","root","crud"); //con xampp
if(!$connect){
    echo "Connection server error";
}
?>