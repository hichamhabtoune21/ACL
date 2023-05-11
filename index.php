<?php
// Imposta la lingua predefinita per la tua applicazione
$default_language = "it_IT";

// Imposta la cartella contenente i file di traduzione
$locale_directory = "./BACK END/locale";

// Imposta il dominio per la tua applicazione
$domain = "signup";

// Imposta le variabili di ambiente per la lingua e la cartella delle traduzioni
putenv("LC_ALL=$default_language");
setlocale(LC_ALL, $default_language);
bindtextdomain($domain, $locale_directory);
textdomain($domain);
?>
