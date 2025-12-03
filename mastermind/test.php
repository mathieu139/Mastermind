<?php
const LONGUEUR_CODE = 4;
const MAX_TENTATIVES = 12;
$initialesCouleurs = ['R', 'V', 'B', 'J', 'P', 'N'];
$emojisCouleurs = ['🔴', '🟢', '🔵', '🟡', '🟣', '⚫'];
const CLE_BIEN_PLACE = '🔑';
const PION_MAL_PLACE = '⚪';


echo "
================================================================
           MASTERMIND EN CONSOLE PHP (BTS SIO 1)
================================================================
Objectif : Deviner la combinaison secrète de " . LONGUEUR_CODE . " pions en " . MAX_TENTATIVES . " tentatives maximum.
Couleurs disponibles : ";
$victoire = false;
for ($tentative = 1; $tentative <= MAX_TENTATIVES; $tentative++) {
    echo "\n--- Tentative $tentative / " . MAX_TENTATIVES . " ---\n";
    $a = readline("Inscrivez votre premier tentative les couleurs disponibles sont ");
    PHP_EOL;
    $a = strtoupper($a);
    $a = str_replace(' ', '', $a);
    if ($a != $combinaison) {
        $couleurEssayer = explode("", $a);



        if (strlen($a) != 4) {
            echo "Le nombre de caractère est incorrecte";
            continue;
        }else{
            if () {
                # code...
            }
        }
    } else {
        echo "vous avez gagnez";
    }
    $bienPlace = 0;
    $malPlace = 0;
    //$combinaison = rand($initialesCouleurs) . rand($initialesCouleurs) . rand($initialesCouleurs) . rand($initialesCouleurs);




    $propositionAffichage = $proposition;
    $secreteTravail = $combinaisonSecrete;
}