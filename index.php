<?php
$lang = "en";
$locale = "en_US";

putenv("LC_ALL=$locale");
setlocale(LC_ALL, $locale);
bindtextdomain('signup', __DIR__.'/BACK END/locale');
bindtextdomain('login', __DIR__.'/BACK END/locale');
putenv("LC_ALL=$locale");
setlocale(LC_ALL, $locale);
textdomain("signup");

echo _("Signup");


header("location: FRONT END/form login/login.php");
?>