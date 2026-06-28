<?php

namespace App\Validator;

function telephoneValide(string $telephone): bool
{
    return preg_match('/^(70|75|76|77|78)[0-9]{7}$/', $telephone);
}

function montantValide(float $montant): bool
{
    return $montant > 0;
}

function soldeInitialValide(float $solde): bool
{
    return $solde >= 0;
}

function codeValide(string $code): bool
{
    return preg_match('/^[0-9]{4}$/', $code);
}