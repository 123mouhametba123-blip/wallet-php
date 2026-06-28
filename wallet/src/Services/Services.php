<?php

namespace App\Services;

use function App\Repository\numeroExiste;
use function App\Repository\codeExiste;
use function App\Repository\chercherWallet;
use function App\Repository\ajouterTransaction;

use function App\Validator\numeroValide;
use function App\Validator\codeValide;
use function App\Validator\soldeValide;
use function App\Validator\montantValide;

global $wallets;

function creerWalletService(
    $telephone,
    $nom,
    $solde,
    $code
)
{
    global $wallets;

    if (!numeroValide($telephone))
    {
        printf("Numéro invalide.\n");
        return;
    }

    if (numeroExiste($telephone))
    {
        printf("Numéro déjà utilisé.\n");
        return;
    }

    if ($nom == "")
    {
        printf("Nom obligatoire.\n");
        return;
    }

    if (!soldeValide($solde))
    {
        printf("Solde invalide.\n");
        return;
    }

    if (!codeValide($code))
    {
        printf("Code invalide.\n");
        return;
    }

    if (codeExiste($code))
    {
        printf("Code déjà utilisé.\n");
        return;
    }

    $wallets[] = [
        "telephone" => $telephone,
        "nom" => $nom,
        "solde" => $solde,
        "code" => $code
    ];

    printf("Wallet créé.\n");
}

function faireDepotService(
    $telephone,
    $montant
)
{
    global $wallets;

    $position = chercherWallet($telephone);

    if ($position === false)
    {
        printf("Wallet introuvable.\n");
        return;
    }

    if (!montantValide($montant))
    {
        printf("Montant invalide.\n");
        return;
    }

    $wallets[$position]["solde"] += $montant;

    ajouterTransaction(
        "DEPOT",
        $telephone,
        $montant,
        0
    );

    printf("Dépôt effectué.\n");
}

function calculerFrais($montant)
{
    if ($montant <= 10000)
    {
        return 200;
    }

    if ($montant <= 100000)
    {
        return 500;
    }

    return min(
        $montant * 0.01,
        5000
    );
}

function faireRetraitService(
    $telephone,
    $montant
)
{
    global $wallets;

    $position = chercherWallet($telephone);

    if ($position === false)
    {
        printf("Wallet introuvable.\n");
        return;
    }

    $frais = calculerFrais($montant);

    if (
        $wallets[$position]["solde"]
        < ($montant + $frais)
    )
    {
        printf("Solde insuffisant.\n");
        return;
    }

    $wallets[$position]["solde"]
        -= ($montant + $frais);

    ajouterTransaction(
        "RETRAIT",
        $telephone,
        $montant,
        $frais
    );

    printf("Retrait effectué.\n");
}

function listerTransactionsService()
{
    global $transactions;

    if (empty($transactions))
    {
        printf("Aucune transaction.\n");
        return;
    }

    array_map(
        function ($transaction)
        {
            printf(
                "%s | %s | %d | %d\n",
                $transaction["type"],
                $transaction["telephone"],
                $transaction["montant"],
                $transaction["frais"]
            );
        },
        $transactions
    );
}