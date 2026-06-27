<?php

require_once "services.php";

function creerWalletController()
{
    printf("Numéro : ");
    $telephone = trim(fgets(STDIN));

    printf("Nom : ");
    $nom = trim(fgets(STDIN));

    printf("Solde initial : ");
    $solde = trim(fgets(STDIN));

    printf("Code secret : ");
    $code = trim(fgets(STDIN));

    creerWalletService(
        $telephone,
        $nom,
        $solde,
        $code
    );
}

function depotController()
{
    printf("Numéro : ");
    $telephone = trim(fgets(STDIN));

    printf("Montant : ");
    $montant = trim(fgets(STDIN));

    faireDepotService(
        $telephone,
        $montant
    );
}
function retraitController()
{
    printf("Numéro : ");
    $telephone = trim(fgets(STDIN));

    printf("Montant : ");
    $montant = trim(fgets(STDIN));

    faireRetraitService(
        $telephone,
        $montant
    );
}
function listerTransactionsController()
{
    listerTransactionsService();
}