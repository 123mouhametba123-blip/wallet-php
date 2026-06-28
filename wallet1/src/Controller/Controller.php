<?php

namespace App\Controller;

function gererMenu($choix): void
{
    switch ($choix) {
        case 1:
            echo "Création Wallet\n";
            break;

        case 2:
            echo "Dépôt\n";
            break;

        case 3:
            echo "Retrait\n";
            break;

        case 4:
            echo "Liste des transactions\n";
            break;

        case 0:
            echo "Au revoir !\n";
            break;

        default:
            echo "Choix invalide\n";
    }
}