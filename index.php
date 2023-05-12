<?php
/*
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
echo _("Signup");
phpinfo();
*/
// Includi l'autoloader di Composer
require_once __DIR__ . '/BACK END/translation/lib/vendor/autoload.php';


// Crea un'istanza del componente Translation
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;

$translator = new Translator('it_IT');
$translator->addLoader('array', new ArrayLoader());

// Aggiungi le traduzioni per la lingua italiana
require 'BACK END/translation/locale/en_US.php';
require 'BACK END/translation/locale/it_IT.php';

$translator->addResource('array', $itTranslations, 'it_IT');

// Aggiungi le traduzioni per la lingua inglese

$translator->addResource('array', $enTranslations, 'en_US');

// Imposta la lingua corrente dell'utente
$translator->setLocale('it_IT');

// Utilizza la funzione trans() per tradurre il testo
echo $translator->trans('hello'); // Output: Ciao
echo $translator->trans('goodbye'); // Output: Arrivederci
//header('location: FRONT END/form login/login.php');
?>
