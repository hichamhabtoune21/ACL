<?php
require 'init.php';
$_SESSION['lang']=$_POST['language'];
$translator->setLocale($_POST['language']);
echo json_encode(array("text" => $_POST['language']));

?>