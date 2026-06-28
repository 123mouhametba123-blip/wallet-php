<?php

namespace App\Validator;

function numeroValide($numero)
{
    return preg_match(
        "/^(70|75|76|77|78)[0-9]{7}$/",
        $numero
    );
}

function codeValide($code)
{
    return preg_match(
        "/^[0-9]{4}$/",
        $code
    );
}

function soldeValide($solde)
{
    return is_numeric($solde)
        && $solde >= 0;
}

function montantValide($montant)
{
    return is_numeric($montant)
        && $montant > 0;
}