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
use Davibennun\LaravelTranslationManager\Manager;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Config\FileLocator;

// Configura la cartella "lang"
$langPath = __DIR__ . '/lang';

// Crea un'istanza del gestore delle traduzioni
$manager = new Manager();

// Carica le traduzioni per la lingua di default (solitamente inglese)
$translator = new Translator('en');
$translator->addLoader('php', new PhpFileLoader());
$translator->addResource('php', $langPath.'/en.php', 'en');
$manager->addTranslations('en', $translator);

// Aggiungi una nuova traduzione o aggiorna una traduzione esistente
$manager->setTranslation('en', 'key', 'value');

// Salva le modifiche apportate ai file di traduzione
$locator = new FileLocator($langPath);
$loader = new PhpFileLoader();
foreach ($manager->translations('en') as $domain => $translations) {
    $messages = $translator->getCatalogue('en')->all($domain);
    $loader->dump($messages, ['path' => $langPath, 'resource' => $domain.'.php']);
}

?>
