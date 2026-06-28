<?php

namespace App\Repository;

$wallets = [];
$transactions = [];

function ajouterWallet(array &$wallets, array $wallet): void
{
    $wallets[] = $wallet;
}

function rechercherWallet(array $wallets, string $telephone): ?array
{
    $resultat = array_filter(
        $wallets,
        fn($wallet) => $wallet['telephone'] === $telephone
    );

    return empty($resultat) ? null : array_values($resultat)[0];
}

function mettreAJourSolde(
    array &$wallets,
    string $telephone,
    float $nouveauSolde
): void {
    foreach ($wallets as &$wallet) {
        if ($wallet['telephone'] === $telephone) {
            $wallet['solde'] = $nouveauSolde;
            break;
        }
    }
}

function ajouterTransaction(array &$transactions, array $transaction): void
{
    $transactions[] = $transaction;
}