<?php

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

for ($index = 0; $index < count($initialesCouleurs); $index++) {
    echo $emojisCouleurs[$index] . " (" . $initialesCouleurs[$index] . ") ";
}
echo "\n";


// ===================================================================================
// 2. GÉNÉRATION DE LA COMBINAISON SECRÈTE
// ===================================================================================


$combinaisonSecrete = [];


#for ($i = 0; $i < LONGUEUR_CODE; $i++) {
#    $indexAleatoire = array_rand($initialesCouleurs);
#    $combinaisonSecrete[$i] = $initialesCouleurs[$indexAleatoire];
#}
for ($i = 0; $i < LONGUEUR_CODE; $i++) {
    $combinaisonSecrete[$i] = $initialesCouleurs[array_rand($initialesCouleurs)];
    #    echo $combinaisonSecrete[$i];
#    print_r($combinaisonSecrete);
}
$solution = implode('', $combinaisonSecrete);
#echo "Combinaison secrète (pour test) : " . $combinaisonSecrete . "\n";

// ===================================================================================
// 3. BOUCLE PRINCIPALE DU JEU
// ===================================================================================

$victoire = false;

// -------------------------------------------------------------------------------
// 3.1. BLOC DE SAISIE ET VALIDATION
// -------------------------------------------------------------------------------
// VOTRE CODE ICI
for ($tentative = 1; $tentative <= MAX_TENTATIVES; $tentative++) {
    echo "\n--- Tentative $tentative / " . MAX_TENTATIVES . " ---\n";


    $saisie = trim(strtoupper(readline("Inscrivez votre premier tentative les couleurs disponibles sont ")));
    $saisie = str_replace(' ', '', $saisie);
    echo "\nVous avez saisi : $saisie\n" . PHP_EOL;

    $verife = false;
    #Verification de la combinaison
    if ($verife == false) {
        $couleurEssayer = str_split($saisie);

        if (strlen($saisie) != 4) {
            echo "Le nombre de caractère est incorrecte";
            #        }elseif () {
            $tentative--;

        } else {
            $manquantes = array_diff($couleurEssayer, $initialesCouleurs);
            echo "Les couleurs suivantes n'existent pas : " . implode('', $manquantes);
            $tentative--;
        }

        $verife = true;
    }
}

// -------------------------------------------------------------------------------
// 3.2. BLOC D'ANALYSE (ALGORITHME MASTERMIND)
// -------------------------------------------------------------------------------

$bienPlace = 0;
$malPlace = 0;

// On sauvegarde la proposition pour l'affichage (elle sera modifiée pendant les calculs)
$propositionAffichage = $proposition;


$secreteTravail = $solution;

// ÉTAPE 1 : CALCUL DES BIEN PLACÉ (Clés Noires 🔑)
// On utilise un simple "for" pour comparer position par position.

for ($i = 0; $i < LONGUEUR_CODE; $i++) {
    if ($proposition[$i] === $secreteTravail[$i]) {
        $bienPlace++;
        // Marquer les pions utilisés
        $secreteTravail[$i] = null;
        $proposition[$i] = null;
    }
}

// ÉTAPE 2 : CALCUL DES MAL PLACÉ (Pions Blancs ⚪)
// On compare les éléments non NULL restants.

foreach ($proposition as $couleurProp) {
    if ($couleurProp !== null) {
        $indexTrouve = array_search($couleurProp, $secreteTravail);

        if ($indexTrouve !== false) {
            $malPlace++;
            $secreteTravail[$indexTrouve] = null;
        }
    }
}

// -------------------------------------------------------------------------------
// 3.3. BLOC D'AFFICHAGE ET GESTION DE LA FIN DE PARTIE
// -------------------------------------------------------------------------------

// 3.3.1 Affichage de la proposition en emojis
$affichageProposition = "";

foreach ($propositionAffichage as $initiale) {
    if ($initiale !== null) {
        $indexEmoji = array_search($initiale, $initialesCouleurs);
        $affichageProposition .= $emojisCouleurs[$indexEmoji] . " ";
    }
}

// 3.3.2 Affichage des indices
$affichageIndices = str_repeat(CLE_BIEN_PLACE . " ", $bienPlace) .
    str_repeat(PION_MAL_PLACE . " ", $malPlace);

if (empty($affichageIndices)) {
    $affichageIndices = "(aucun indice)";
}

// 3.3.3 Afficher les résultats
echo "Proposition : " . $affichageProposition . "\n";
echo "Indices : " . $affichageIndices . "\n";

// 3.3.4 Vérifier la victoire
if ($bienPlace === LONGUEUR_CODE) {
    $victoire = true;
    echo "\n🏆 Victoire ! Vous avez trouvé la combinaison en $tentative tentative(s) ! 🏅\n";
}

// Fin de la boucle principale

// ===================================================================================
// 4. BLOC DE RÉSULTAT FINAL
// ===================================================================================

// Affichage de la combinaison secrète à la fin (Victoire ou Défaite)

if ($victoire) {
    echo "Bravo ! La combinaison était : ";
} else {
    echo "\n❌ Défaite ! Vous n'avez pas trouvé la combinaison en " . MAX_TENTATIVES . " tentatives❌.\n";
    echo "La combinaison était : ";
}

// Afficher la combinaison secrète en emojis
foreach ($combinaisonSecrete as $initiale) {
    $indexEmoji = array_search($initiale, $initialesCouleurs);
    echo $emojisCouleurs[$indexEmoji] . " ";
}

echo "\n\n================================================================\n";
echo "                        FIN DU JEU\n";
echo "================================================================\n";
?>