<?php
$connect = new mysqli("db", "admin","admin","crud");
if(!$connect){
    echo "Connection server error";
}
?>