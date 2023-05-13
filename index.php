<?php
require './BACK END/translation/init.php';
// Utilizza la funzione trans() per tradurre il testo
/*
echo $translator->trans('hello'); // Output: Ciao
echo $translator->trans('goodbye'); // Output: Arrivederci
*/
$translator->setLocale('en_US');

header('location: FRONT END/form login/login.php');
?>
