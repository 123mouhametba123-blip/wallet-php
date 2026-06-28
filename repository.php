<?php

$wallets = [];

function numeroExiste($telephone)
{
    global $wallets;

    foreach ($wallets as $wallet)
    {
        if ($wallet["telephone"] == $telephone)
        {
            return true;
        }
    }

    return false;
}

function codeExiste($code)
{
    global $wallets;

    foreach ($wallets as $wallet)
    {
        if ($wallet["code"] == $code)
        {
            return true;
        }
    }

    return false;
}


function chercherWallet($telephone)
{
    global $wallets;

    foreach ($wallets as $i => $wallet)
    {
        if ($wallet["telephone"] == $telephone)
        {
            return $i;
        }
    }

    return -1;
}

function ajouterTransaction($type, $telephone, $montant, $frais)
{
    global $transactions;

    $transactions[] = [
        "type" => $type,
        "telephone" => $telephone,
        "montant" => $montant,
        "frais" => $frais
    ];
}