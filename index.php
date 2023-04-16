<?php
$lang = "it";
$locale = "it_IT";

//phpinfo();
/*
putenv("LC_ALL=$locale");
setlocale(LC_ALL, $locale);
bindtextdomain("login", "BACK END/language");
textdomain("messages");


echo _("Login");
*/
header("location: FRONT END/form login/login.php");
?>