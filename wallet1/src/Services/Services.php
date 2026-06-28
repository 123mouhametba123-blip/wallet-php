<?php

namespace App\Services;

function calculerFrais(float $montant): float
{
    if ($montant <= 10000) {
        return 200;
    }

    if ($montant <= 100000) {
        return 500;
    }

    $frais = $montant * 0.01;

    if ($frais > 5000) {
        $frais = 5000;
    }

    return $frais;
}