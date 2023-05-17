<?php
session_start();
$lang=$_SESSION["lang"];
session_destroy();
session_unset();
$_SESSION["lang"]=$lang;

header('location: ../FRONT END/form login/login.php');

?>