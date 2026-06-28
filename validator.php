<?php

function numeroValide($numero)
{
    if (strlen($numero) != 9)
    {
        return false;
    }

    for ($i = 0; $i < strlen($numero); $i++)
    {
        if ($numero[$i] < '0' || $numero[$i] > '9')
        {
            return false;
        }
    }

    $prefixe = $numero[0] . $numero[1];

    return $prefixe == "70"
        || $prefixe == "75"
        || $prefixe == "76"
        || $prefixe == "77"
        || $prefixe == "78";
}

function codeValide($code)
{
    if (strlen($code) != 4)
    {
        return false;
    }

    for ($i = 0; $i < 4; $i++)
    {
        if ($code[$i] < '0' || $code[$i] > '9')
        {
            return false;
        }
    }

    return true;
}

function soldeValide($solde)
{
    return is_numeric($solde) && $solde >= 0;
}



function montantValide($montant)
{
    return is_numeric($montant) && $montant > 0;
}