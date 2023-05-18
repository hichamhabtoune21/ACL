<?php
session_start();
// Includi l'autoloader di Composer
require_once 'lib/vendor/autoload.php';
if(!isset($_SESSION['lang'])){
    $_SESSION['lang']='en_US';
}

// Crea un'istanza del componente Translation
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\ArrayLoader;

$translator = new Translator($_SESSION['lang']);
$translator->addLoader('array', new ArrayLoader());

// Aggiungi le traduzioni per la lingua italiana
require 'locale/en_US.php';
require 'locale/it_IT.php';
require 'locale/es_ES.php';


$translator->addResource('array', $itTranslations, 'it_IT');

// Aggiungi le traduzioni per la lingua inglese

$translator->addResource('array', $enTranslations, 'en_US');

$translator->addResource('array', $esTranslations, 'es_ES');

// Imposta la lingua corrente dell'utente

?>