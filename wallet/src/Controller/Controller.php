<?php

namespace App\Controller;

use function App\Services\creerWalletService;
use function App\Services\faireDepotService;
use function App\Services\faireRetraitService;
use function App\Services\listerTransactionsService;

function menu()
{
    $choix = -1;

    while ($choix != 0)
    {
        printf("\n===== MENU =====\n");
        printf("1 - Créer Wallet\n");
        printf("2 - Faire Dépôt\n");
        printf("3 - Faire Retrait\n");
        printf("4 - Lister les Transactions\n");
        printf("0 - Quitter\n");

        $choix = trim(fgets(STDIN));

        switch ($choix)
        {
            case 1:
                printf("Numéro : ");
                $telephone = trim(fgets(STDIN));

                printf("Nom : ");
                $nom = trim(fgets(STDIN));

                printf("Solde : ");
                $solde = trim(fgets(STDIN));

                printf("Code : ");
                $code = trim(fgets(STDIN));

                creerWalletService(
                    $telephone,
                    $nom,
                    $solde,
                    $code
                );
                break;

            case 2:
                printf("Numéro : ");
                $telephone = trim(fgets(STDIN));

                printf("Montant : ");
                $montant = trim(fgets(STDIN));

                faireDepotService(
                    $telephone,
                    $montant
                );
                break;

            case 3:
                printf("Numéro : ");
                $telephone = trim(fgets(STDIN));

                printf("Montant : ");
                $montant = trim(fgets(STDIN));

                faireRetraitService(
                    $telephone,
                    $montant
                );
                break;

            case 4:
                listerTransactionsService();
                break;

            case 0:
                printf("Au revoir.\n");
                break;

            default:
                printf("Choix invalide.\n");
        }
    }
}