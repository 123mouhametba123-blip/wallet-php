<?php

require_once "repository.php";
require_once "validator.php";

function creerWalletService($telephone, $nom, $solde, $code)
{
    global $wallets;

    if (!numeroValide($telephone))
    {
        printf("Numéro invalide.\n");
        return;
    }

    if (numeroExiste($telephone))
    {
        printf("Ce numéro existe déjà.\n");
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
        printf("Ce code existe déjà.\n");
        return;
    }

    $wallets[] = [
        "telephone" => $telephone,
        "nom" => $nom,
        "solde" => $solde,
        "code" => $code
    ];

    printf("Wallet créé avec succès.\n");
}



function faireDepotService($telephone, $montant)
{
    global $wallets;

    $position = chercherWallet($telephone);

    if ($position == -1)
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

    printf("Dépôt effectué avec succès.\n");
    printf(
        "Nouveau solde : %d CFA\n",
        $wallets[$position]["solde"]
    );
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

    $frais = $montant * 0.01;

    if ($frais > 5000)
    {
        $frais = 5000;
    }

    return $frais;
}
function faireRetraitService($telephone, $montant)
{
    global $wallets;

    $position = chercherWallet($telephone);

    if ($position == -1)
    {
        printf("Wallet introuvable.\n");
        return;
    }

    if (!montantValide($montant))
    {
        printf("Montant invalide.\n");
        return;
    }

    $frais = calculerFrais($montant);

    $total = $montant + $frais;

    if ($wallets[$position]["solde"] < $total)
    {
        printf("Solde insuffisant.\n");
        return;
    }

    $wallets[$position]["solde"] -= $total;

    ajouterTransaction(
        "RETRAIT",
        $telephone,
        $montant,
        $frais
    );

    printf("Retrait effectué.\n");
    printf("Frais : %d CFA\n", $frais);
    printf(
        "Nouveau solde : %d CFA\n",
        $wallets[$position]["solde"]
    );
}
function listerTransactionsService()
{
    global $transactions;

    if (count($transactions) == 0)
    {
        printf("Aucune transaction.\n");
        return;
    }

    printf("\n===== LISTE DES TRANSACTIONS =====\n");

    foreach ($transactions as $transaction)
    {
        printf(
            "Type : %s | Numéro : %s | Montant : %d CFA | Frais : %d CFA\n",
            $transaction["type"],
            $transaction["telephone"],
            $transaction["montant"],
            $transaction["frais"]
        );
    }
}