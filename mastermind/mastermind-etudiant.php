<?php

// ===================================================================================
// 1. BLOC DE CONFIGURATION ET D'INITIALISATION
// ===================================================================================

// Définition des constantes pour la configuration du jeu
const LONGUEUR_CODE = 4;
const MAX_TENTATIVES = 12;

// Tableaux indexés des couleurs disponibles
// NOTE: Les deux tableaux doivent avoir le même ordre pour maintenir la correspondance !
$initialesCouleurs = ['R', 'V', 'B', 'J', 'P', 'N']; // Les initiales que le joueur saisit
$emojisCouleurs = ['🔴', '🟢', '🔵', '🟡', '🟣', '⚫']; // Les emojis pour l'affichage

// Emojis pour les indices
const CLE_BIEN_PLACE = '🔑';
const PION_MAL_PLACE = '⚪';

echo "
================================================================
           MASTERMIND EN CONSOLE PHP (BTS SIO 1)
================================================================
Objectif : Deviner la combinaison secrète de " . LONGUEUR_CODE . " pions en " . MAX_TENTATIVES . " tentatives maximum.
Couleurs disponibles : ";

// Affichage des options de couleur pour le joueur

// VOTRE CODE ICI


// ===================================================================================
// 2. GÉNÉRATION DE LA COMBINAISON SECRÈTE
// ===================================================================================

// VOTRE CODE ICI


// ===================================================================================
// 3. BOUCLE PRINCIPALE DU JEU
// ===================================================================================

$victoire = false;

// La boucle tourne tant que le joueur n'a pas gagné ET que le nombre max de tentatives n'est pas atteint
for ($tentative = 1; $tentative <= MAX_TENTATIVES; $tentative++) {
    echo "\n--- Tentative $tentative / " . MAX_TENTATIVES . " ---\n";

    // -------------------------------------------------------------------------------
    // 3.1. BLOC DE SAISIE ET VALIDATION
    // -------------------------------------------------------------------------------


    // VOTRE CODE ICI

    // -------------------------------------------------------------------------------
    // 3.2. BLOC D'ANALYSE (ALGORITHME MASTERMIND)
    // -------------------------------------------------------------------------------

    $bienPlace = 0;
    $malPlace = 0;

    // On sauvegarde la proposition pour l'affichage (elle sera modifiée pendant les calculs)
    $propositionAffichage = $proposition;

    // On fait une copie de la combinaison secrète pour pouvoir marquer (mettre à null) les pions
    // qui ont déjà été utilisés sans modifier l'original, ce qui permet de respecter
    // la règle du compte unique de Mastermind.
    // NOTE: $proposition peut être modifiée directement car elle est réinitialisée à chaque tentative.
    $secreteTravail = $combinaisonSecrete;

    // ÉTAPE 1 : CALCUL DES BIEN PLACÉ (Clés Noires 🔑)
    // On utilise un simple "for" pour comparer position par position.

    // VOTRE CODE ICI

    // ÉTAPE 2 : CALCUL DES MAL PLACÉ (Pions Blancs ⚪)
    // On compare les éléments non NULL restants.

    // VOTRE CODE ICI

    // -------------------------------------------------------------------------------
    // 3.3. BLOC D'AFFICHAGE ET GESTION DE LA FIN DE PARTIE
    // -------------------------------------------------------------------------------

    // Affichage de la proposition du joueur en emojis

    // VOTRE CODE ICI

    // Affichage des indices

    // VOTRE CODE ICI

} // Fin de la boucle principale

// ===================================================================================
// 4. BLOC DE RÉSULTAT FINAL
// ===================================================================================

// Affichage de la combinaison secrète à la fin (Victoire ou Défaite)

// VOTRE CODE ICI
