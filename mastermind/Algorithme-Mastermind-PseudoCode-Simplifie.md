# Algorithme Mastermind - Pseudo-code Simplifié

**BTS SIO 1 - Séquence 4**  
**Document de référence : Algorithme du jeu Mastermind en pseudo-code**

---

## 📋 Introduction

Ce document présente l'algorithme complet du jeu Mastermind en **pseudo-code**. Le pseudo-code est une description simplifiée de l'algorithme qui permet de comprendre la logique sans se préoccuper des détails d'implémentation.

### Conventions utilisées

- Les mots-clés sont en **gras**
- Les variables sont en *italique*
- Les commentaires sont précédés de `//`
- Les structures de contrôle sont indentées
- Les tableaux utilisent la notation `[valeur1, valeur2, ...]`

---

## 🏗️ Structure Globale

L'algorithme Mastermind est organisé en **4 blocs principaux** :

1. **Bloc de configuration et d'initialisation**
2. **Génération de la combinaison secrète**
3. **Boucle principale du jeu**
4. **Affichage du résultat final**

---

## 📝 Algorithme Complet

### BLOQUE 1 : Configuration et Initialisation

```
DÉBUT

    // Définition des constantes
    CONSTANTE LONGUEUR_CODE ← 4
    CONSTANTE MAX_TENTATIVES ← 12
    CONSTANTE CLE_BIEN_PLACE ← '🔑'
    CONSTANTE PION_MAL_PLACE ← '⚪'
    
    // Création des tableaux de couleurs (même ordre obligatoire)
    TABLEAU initialesCouleurs ← ['R', 'V', 'B', 'J', 'V', 'N']
    TABLEAU emojisCouleurs ← ['🔴', '🟢', '🔵', '🟡', '🟣', '⚫']
    
    // Affichage du message d'accueil
    AFFICHER "================================================================\n"
    AFFICHER "           MASTERMIND EN CONSOLE PHP (BTS SIO 1)\n"
    AFFICHER "================================================================\n"
    AFFICHER "Objectif : Deviner la combinaison secrète de " + LONGUEUR_CODE + " pions en " + MAX_TENTATIVES + " tentatives maximum.\n"
    AFFICHER "Couleurs disponibles : "
    
    POUR CHAQUE index DE 0 À TAILLE(initialesCouleurs) - 1 FAIRE
        AFFICHER emojisCouleurs[index] + " (" + initialesCouleurs[index] + ") "
    FIN POUR
    
    AFFICHER "\n================================================================\n"

FIN
```

**Explication** : Ce bloc initialise toutes les constantes et tableaux nécessaires au jeu, puis affiche un message de bienvenue avec la liste des couleurs disponibles.

---

### BLOQUE 2 : Génération de la Combinaison Secrète

```
DÉBUT

    // Initialisation du tableau vide
    TABLEAU combinaisonSecrete ← []
    
    // Génération aléatoire de LONGUEUR_CODE pions
    POUR i DE 0 À LONGUEUR_CODE - 1 FAIRE
        indexAleatoire ← GÉNÉRER_INDEX_ALÉATOIRE(initialesCouleurs)
        AJOUTER initialesCouleurs[indexAleatoire] À combinaisonSecrete
    FIN POUR

FIN
```

**Explication** : Ce bloc génère aléatoirement une combinaison secrète de 4 pions en choisissant des initiales au hasard dans le tableau des couleurs disponibles.

---

### BLOQUE 3 : Boucle Principale du Jeu

```
DÉBUT

    victoire ← FAUX
    
    // Boucle principale : de 1 à MAX_TENTATIVES
    POUR tentative DE 1 À MAX_TENTATIVES FAIRE
        
        AFFICHER "\n--- Tentative " + tentative + " / " + MAX_TENTATIVES + " ---\n"
        
        // ========================================================
        // 3.1 Saisie et Validation
        // ========================================================
        
        TABLEAU proposition ← []
        valide ← FAUX
        
        TANT QUE valide = FAUX FAIRE
            
            // Lecture de la saisie
            AFFICHER "Entrez votre proposition (" + LONGUEUR_CODE + " initiales, ex: RVBJ) : "
            saisie ← LIRE_LIGNE()
            
            // Nettoyage : majuscules et suppression des espaces
            saisie ← METTRE_EN_MAJUSCULES(saisie)
            saisie ← SUPPRIMER_ESPACES(saisie)
            
            // Validation de la longueur
            SI LONGUEUR(saisie) ≠ LONGUEUR_CODE ALORS
                AFFICHER "Erreur : La proposition doit contenir exactement " + LONGUEUR_CODE + " caractères.\n"
                CONTINUER
            FIN SI
            
            // Validation des caractères
            caracteresValides ← VRAI
            proposition ← DÉCOMPOSER_EN_CARACTÈRES(saisie)
            
            POUR CHAQUE caractere DANS proposition FAIRE
                SI caractere N'EST_PAS_DANS initialesCouleurs ALORS
                    AFFICHER "Erreur : Le caractère '" + caractere + "' n'est pas une initiale de couleur valide.\n"
                    caracteresValides ← FAUX
                    SORTIR_DE_LA_BOUCLE
                FIN SI
            FIN POUR
            
            SI caracteresValides = VRAI ALORS
                valide ← VRAI
            FIN SI
            
        FIN TANT QUE
        
        // ========================================================
        // 3.2 Analyse : Calcul des Indices (Algorithme Mastermind)
        // ========================================================
        
        bienPlace ← 0
        malPlace ← 0
        
        // Création de copies pour le marquage (règle du compte unique)
        propositionAffichage ← COPIER(proposition)
        secreteTravail ← COPIER(combinaisonSecrete)
        
        // ÉTAPE 1 : Calcul des bien placés (🔑)
        POUR i DE 0 À LONGUEUR_CODE - 1 FAIRE
            SI proposition[i] = secreteTravail[i] ALORS
                bienPlace ← bienPlace + 1
                // Marquage pour éviter de compter deux fois
                secreteTravail[i] ← NULL
                proposition[i] ← NULL
            FIN SI
        FIN POUR
        
        // ÉTAPE 2 : Calcul des mal placés (⚪)
        POUR CHAQUE index, couleurProp DANS proposition FAIRE
            SI couleurProp ≠ NULL ALORS
                indexTrouve ← RECHERCHER(couleurProp, secreteTravail)
                SI indexTrouve ≠ FAUX ALORS
                    malPlace ← malPlace + 1
                    // Marquage pour éviter de compter deux fois
                    secreteTravail[indexTrouve] ← NULL
                FIN SI
            FIN SI
        FIN POUR
        
        // ========================================================
        // 3.3 Affichage et Vérification de la Victoire
        // ========================================================
        
        // Conversion de la proposition en emojis
        affichageProposition ← ""
        POUR CHAQUE initiale DANS propositionAffichage FAIRE
            index ← RECHERCHER(initiale, initialesCouleurs)
            affichageProposition ← affichageProposition + emojisCouleurs[index] + " "
        FIN POUR
        
        // Préparation des indices
        affichageIndices ← ""
        POUR i DE 1 À bienPlace FAIRE
            affichageIndices ← affichageIndices + CLE_BIEN_PLACE + " "
        FIN POUR
        POUR i DE 1 À malPlace FAIRE
            affichageIndices ← affichageIndices + PION_MAL_PLACE + " "
        FIN POUR
        
        // Affichage
        AFFICHER "Proposition : " + affichageProposition + "\n"
        AFFICHER "Indices     : " + affichageIndices + "\n"
        
        // Vérification de la victoire
        SI bienPlace = LONGUEUR_CODE ALORS
            victoire ← VRAI
            SORTIR_DE_LA_BOUCLE
        FIN SI
        
    FIN POUR

FIN
```

**Explication** : Ce bloc contient la boucle principale du jeu. Pour chaque tentative :
1. **Saisie et validation** : On demande au joueur sa proposition et on vérifie qu'elle est valide (longueur correcte, caractères valides).
2. **Analyse** : On calcule les indices (bien placés et mal placés) en respectant la règle du compte unique.
3. **Affichage** : On affiche la proposition en emojis et les indices obtenus.

**Important - Règle du compte unique** : Chaque pion ne peut être compté qu'une seule fois. On marque les pions utilisés avec `NULL` pour éviter de les compter plusieurs fois.

---

### BLOQUE 4 : Affichage du Résultat Final

```
DÉBUT

    // Conversion de la combinaison secrète en emojis
    affichageSecrete ← ""
    POUR CHAQUE initiale DANS combinaisonSecrete FAIRE
        index ← RECHERCHER(initiale, initialesCouleurs)
        affichageSecrete ← affichageSecrete + emojisCouleurs[index] + " "
    FIN POUR
    
    // Affichage du message final
    AFFICHER "\n================================================================\n"
    
    SI victoire = VRAI ALORS
        AFFICHER "🎉 FÉLICITATIONS ! Vous avez trouvé la combinaison secrète en " + tentative + " tentatives !\n"
    SINON
        AFFICHER "😭 DOMMAGE ! Vous avez atteint la limite de " + MAX_TENTATIVES + " tentatives.\n"
    FIN SI
    
    AFFICHER "La combinaison secrète était : " + affichageSecrete + "\n"
    AFFICHER "================================================================\n"

FIN
```

**Explication** : Ce bloc affiche le résultat final de la partie (victoire ou défaite) et révèle la combinaison secrète au joueur.

---

## 🔍 Algorithme de Calcul des Indices - Explication Détaillée

L'algorithme de calcul des indices est la partie la plus importante. Il fonctionne en **deux étapes** :

### Étape 1 : Calcul des Bien Placés (🔑)

On compare position par position :
- Si la couleur ET la position sont correctes → on compte un bien placé
- On marque immédiatement ces pions avec `NULL` pour ne plus les utiliser

### Étape 2 : Calcul des Mal Placés (⚪)

Pour chaque pion restant (non `NULL`) de la proposition :
- On cherche cette couleur dans la combinaison secrète restante
- Si trouvée → on compte un mal placé
- On marque le pion trouvé avec `NULL` pour ne plus l'utiliser

### Exemple Concret

**Combinaison secrète** : `['R', 'N', 'B', 'V']`  
**Proposition** : `['R', 'V', 'B', 'N']`

**Étape 1 - Bien placés :**
- Position 0 : `'R' = 'R'` ? OUI → bienPlace = 1, marquage
- Position 1 : `'V' = 'N'` ? NON
- Position 2 : `'B' = 'B'` ? OUI → bienPlace = 2, marquage
- Position 3 : `'N' = 'V'` ? NON
- Résultat : bienPlace = 2

**Étape 2 - Mal placés :**
- Position 0 : `NULL` → ignoré
- Position 1 : `'V'` trouvé dans secrète (index 3) → malPlace = 1, marquage
- Position 2 : `NULL` → ignoré
- Position 3 : `'N'` trouvé dans secrète (index 1) → malPlace = 2, marquage
- Résultat : malPlace = 2

**Résultat final** : 2 🔑 et 2 ⚪

---

## 📝 Résumé de l'Algorithme Complet

```
ALGORITHME PRINCIPAL : Mastermind

DÉBUT
    // Bloc 1 : Configuration
    Initialiser constantes et tableaux
    Afficher message d'accueil
    
    // Bloc 2 : Génération
    Générer combinaison secrète aléatoirement
    
    // Bloc 3 : Boucle principale
    POUR tentative DE 1 À MAX_TENTATIVES FAIRE
        // Saisie et validation
        TANT QUE saisie non valide FAIRE
            Lire et nettoyer saisie
            Valider longueur et caractères
        FIN TANT QUE
        
        // Analyse
        Calculer bienPlace (étape 1)
        Calculer malPlace (étape 2)
        
        // Affichage
        Afficher proposition et indices
        
        // Vérification victoire
        SI bienPlace = LONGUEUR_CODE ALORS
            victoire ← VRAI
            SORTIR_DE_LA_BOUCLE
        FIN SI
    FIN POUR
    
    // Bloc 4 : Résultat final
    Afficher message de victoire ou défaite
    Afficher combinaison secrète
FIN
```

---

## 🔑 Points Importants à Retenir

1. **Règle du compte unique** : Chaque pion ne peut être compté qu'une seule fois. On utilise le marquage avec `NULL` pour éviter les doublons.

2. **Ordre de traitement** : Les bien placés sont comptés **AVANT** les mal placés. C'est essentiel pour respecter la règle du compte unique.

3. **Copies de travail** : On crée des copies de la proposition et de la combinaison secrète pour pouvoir les modifier (marquage) sans perdre les données originales.

4. **Validation stricte** : La saisie doit être exactement de la bonne longueur et contenir uniquement des caractères valides.

---


