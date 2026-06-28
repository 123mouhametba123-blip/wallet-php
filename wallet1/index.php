<?php

require_once 'vendor/autoload.php';

use App\Controller\Controller;

do {
    echo "\n=== MENU DISTRIBUTEUR ===\n";
    echo "1 - Créer Wallet\n";
    echo "2 - Faire Dépôt\n";
    echo "3 - Faire Retrait\n";
    echo "4 - Lister les Transactions\n";
    echo "0 - Quitter\n";

    $choix = readline("Votre choix : ");

    Controller\gererMenu($choix);

} while ($choix != 0);