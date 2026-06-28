<?php

require_once "controller.php";

$choix = -1;

while ($choix != 0)
{
    printf("\n===== MENU DISTRIBUTEUR =====\n");
    printf("1 - Créer Wallet\n");
    printf("2 - Faire Dépôt\n");
    printf("3 - Faire Retrait\n");
    printf("4 - Lister les Transactions\n");
    printf("0 - Quitter\n");
    printf("Choix : ");
    $choix = trim(fgets(STDIN));

    switch ($choix)
    {
        case 1:
            creerWalletController();
            break;
        
        case 2:
            depotController();
            break;

        case 3:
            retraitController();
            break;
        case 4:
            listerTransactionsController();
            break;

        case 0:
            printf("Au revoir.\n");
            break;

        default:
            printf("Choix invalide.\n");
    }
}