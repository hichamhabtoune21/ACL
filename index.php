<?php
// Set language to French
putenv('LC_ALL=    it_IT');
setlocale(LC_ALL, 'it_IT');

// Specify location of translation tables for 'myPHPApp' domain
bindtextdomain("myPHPApp", "./BACK END/templates");

// Select 'myPHPApp' domain
textdomain("myPHPApp");


echo _("Login");
//header("location: FRONT END/form login/login.html");
?>