<?php
const LONGUEUR_CODE = 4;
const MAX_TENTATIVES = 12;
$initialesCouleurs = ['R', 'V', 'B', 'J', 'P', 'N'];
$emojisCouleurs = ['🔴', '🟢', '🔵', '🟡', '🟣', '⚫'];
const CLE_BIEN_PLACE = '🔑';
const PION_MAL_PLACE = '⚪';

$a = 0;

for ($i = 0; $i < 4; $i++) {
    // Sélection aléatoire d'un caractère du tableau
    $combinaisonSecrete[$i] = $initialesCouleurs[array_rand($initialesCouleurs)];
    echo $combinaisonSecrete[$i];
}
for ($tentative = 1; $tentative <= MAX_TENTATIVES; $tentative++) {
    echo "\n--- Tentative $tentative / " . MAX_TENTATIVES . " ---\n";


    $a = trim(strtoupper(readline("Inscrivez votre premier tentative les couleurs disponibles sont ")));
    $a = str_replace(' ', '', $a);
    echo "\nVous avez saisi : $a\n" . PHP_EOL;




    $verife = false;
    #Verification de la combinaison
    if ($a != $combinaisonSecrete) {
        $couleurEssayer = str_split($a);

        if (strlen($a) > 4 or strlen($a) < 4) {
            echo "Le nombre de caractère est incorrecte";
            #        }elseif () {
            $tentative--;

        } else {
            $manquantes = array_diff($couleurEssayer, $combinaisonSecrete);
            echo "Les couleurs suivantes n'existent pas : " . implode('', $manquantes);
            $tentative--;
        }

    } else {
        $verife = true;
    }
}


?>