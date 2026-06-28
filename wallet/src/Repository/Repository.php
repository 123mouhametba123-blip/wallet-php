<?php

namespace App\Repository;

$wallets = [];
$transactions = [];

function numeroExiste($telephone)
{
    global $wallets;

    return count(
        array_filter(
            $wallets,
            fn($wallet)
                => $wallet["telephone"] == $telephone
        )
    ) > 0;
}

function codeExiste($code)
{
    global $wallets;

    return count(
        array_filter(
            $wallets,
            fn($wallet)
                => $wallet["code"] == $code
        )
    ) > 0;
}

function chercherWallet($telephone)
{
    global $wallets;

    $telephones = array_column(
        $wallets,
        "telephone"
    );

    return array_search(
        $telephone,
        $telephones
    );
}

function ajouterTransaction(
    $type,
    $telephone,
    $montant,
    $frais
)
{
    global $transactions;

    $transactions[] = [
        "type" => $type,
        "telephone" => $telephone,
        "montant" => $montant,
        "frais" => $frais
    ];
}