# TP - Implémentation du Jeu Mastermind en PHP

**BTS SIO 1 - Séquence 4**  
**Objectif** : Développer un jeu Mastermind complet en console PHP en appliquant les concepts de tableaux, boucles, conditions et algorithmes.

---

## 📋 Présentation du Jeu

Le **Mastermind** est un jeu de déduction où le joueur doit deviner une combinaison secrète de couleurs en un nombre limité de tentatives. À chaque tentative, le joueur reçoit des indices :
- 🔑 **Clé noire (bien placé)** : Un pion de la bonne couleur est à la bonne position
- ⚪ **Pion blanc (mal placé)** : Un pion de la bonne couleur existe dans la combinaison secrète mais n'est pas à la bonne position

### Règles importantes
- Chaque pion de la proposition ne peut être compté qu'une seule fois
- Les pions bien placés sont comptés en priorité
- Les pions mal placés ne peuvent pas utiliser un pion déjà compté comme bien placé

---

## 🎯 Objectifs Pédagogiques

À l'issue de ce TP, vous serez capable de :
- Manipuler des tableaux indexés et associatifs en PHP
- Utiliser les boucles `for` et `while` de manière efficace
- Implémenter un algorithme de comparaison complexe
- Gérer la saisie et la validation des données utilisateur
- Structurer un programme en blocs logiques

---

## 📝 Spécifications Techniques

### Configuration du jeu
- **Longueur du code secret** : 4 pions
- **Nombre maximum de tentatives** : 12
- **Couleurs disponibles** : 6 couleurs
  - 🔴 Rouge (R)
  - 🟢 Vert (V)
  - 🔵 Bleu (B)
  - 🟡 Jaune (J)
  - 🟣 Violet (V)
  - ⚫ Noir (N)

### Interface utilisateur
- Le jeu s'exécute en ligne de commande (console)
- Affichage des couleurs avec emojis pour une meilleure lisibilité
- Messages d'erreur clairs en cas de saisie invalide
- Affichage de la combinaison secrète à la fin de la partie

---

## 🏗️ Structure du Programme

Votre programme devra être organisé en **4 blocs principaux** :

1. **Bloc de configuration et d'initialisation**
2. **Génération de la combinaison secrète**
3. **Boucle principale du jeu**
4. **Affichage du résultat final**

---

## 🎨 Utilisation des Emojis dans le Code

Avant de commencer l'implémentation, il est important de savoir comment utiliser les emojis dans votre code PHP.

### Comment obtenir les emojis ?

Les emojis sont des caractères Unicode spéciaux. Voici plusieurs méthodes pour les obtenir :

#### Méthode 1 : Copier depuis ce document
Vous pouvez simplement **copier-coller** les emojis directement depuis ce document :
- Sélectionnez l'emoji dans le texte (par exemple : 🔴)
- Copiez-le (Ctrl+C / Cmd+C)
- Collez-le dans votre code PHP entre guillemets

#### Méthode 2 : Utiliser le clavier de votre système
- **Sur macOS** : Appuyez sur `Cmd + Ctrl + Espace` pour ouvrir le sélecteur d'emojis
- **Sur Windows** : Appuyez sur `Windows + .` (point) pour ouvrir le sélecteur d'emojis
- **Sur Linux** : Utilisez `Ctrl + .` ou installez un sélecteur d'emojis

#### Méthode 3 : Sites web spécialisés
Vous pouvez également copier les emojis depuis des sites comme :
- [Emojipedia](https://emojipedia.org/)
- [Unicode.org](https://unicode.org/emoji/charts/)

### Liste complète des emojis à utiliser

Voici tous les emojis nécessaires pour ce TP, que vous pouvez copier directement :

**Couleurs des pions :**
- 🔴 (Rouge - R)
- 🟢 (Vert - V)
- 🔵 (Bleu - B)
- 🟡 (Jaune - J)
- 🟣 (Violet - V)
- ⚫ (Noir - N)

**Indices :**
- 🔑 (Clé noire - Bien placé)
- ⚪ (Pion blanc - Mal placé)

**Messages finaux :**
- 🎉 (Félicitations)
- 😭 (Dommage)

### Comment les utiliser dans le code PHP ?

Les emojis s'utilisent exactement comme des chaînes de caractères normales en PHP. Voici des exemples :

```php
// Dans un tableau
$emojisCouleurs = ['🔴', '🟢', '🔵', '🟡', '🟣', '⚫'];

// Dans une constante
const CLE_BIEN_PLACE = '🔑';
const PION_MAL_PLACE = '⚪';

// Dans une chaîne de caractères
echo "Proposition : 🔴 🟢 🔵 🟡\n";
echo "🎉 FÉLICITATIONS !\n";
```

### ⚠️ Points importants

1. **Encodage du fichier** : Assurez-vous que votre fichier PHP est sauvegardé en **UTF-8** (c'est généralement le cas par défaut dans les éditeurs modernes)

2. **Terminal/Console** : Vérifiez que votre terminal supporte l'affichage des emojis. La plupart des terminaux modernes (Terminal macOS, PowerShell Windows, Linux moderne) les supportent. Si les emojis ne s'affichent pas correctement, vous pouvez :
   - Utiliser un terminal plus récent
   - Vérifier les paramètres de police de votre terminal
   - Tester avec un autre terminal

3. **Éditeur de code** : La plupart des éditeurs modernes (VS Code, PhpStorm, Sublime Text, etc.) affichent correctement les emojis dans le code

4. **Test rapide** : Pour vérifier que tout fonctionne, vous pouvez créer un petit fichier de test :
   ```php
   <?php
   echo "Test emojis : 🔴 🟢 🔵 🟡 🟣 ⚫ 🔑 ⚪\n";
   ```
   Exécutez-le et vérifiez que tous les emojis s'affichent correctement.

---

## 📚 Guide d'Implémentation Étape par Étape

### Étape 1 : Configuration et Initialisation

#### 1.1 Définir les constantes
Créez deux constantes pour la configuration du jeu :
- `LONGUEUR_CODE` : nombre de pions dans la combinaison (4)
- `MAX_TENTATIVES` : nombre maximum de tentatives autorisées (12)

#### 1.2 Créer les tableaux de couleurs
Créez deux tableaux indexés **parallèles** (même ordre obligatoire) :
- `$initialesCouleurs` : contient les initiales que le joueur saisira (`['R', 'V', 'B', 'J', 'V', 'N']`)
- `$emojisCouleurs` : contient les emojis correspondants pour l'affichage (`['🔴', '🟢', '🔵', '🟡', '🟣', '⚫']`)

**⚠️ Note** : Vous remarquerez qu'il y a deux 'V' dans les initiales. Le premier 'V' correspond au Vert (🟢) et le deuxième 'V' correspond au Violet (🟣). C'est normal et cela fonctionne car chaque initiale est associée à son emoji via l'index du tableau.

**⚠️ Important** : Les deux tableaux doivent avoir le même ordre pour maintenir la correspondance entre initiales et emojis.

#### 1.3 Définir les constantes d'indices
Créez deux constantes pour les emojis d'indices :
- `CLE_BIEN_PLACE` : '🔑' (clé noire pour bien placé)
- `PION_MAL_PLACE` : '⚪' (pion blanc pour mal placé)

#### 1.4 Afficher le message d'accueil
Affichez un message de bienvenue qui présente :
- Le titre du jeu
- L'objectif (deviner la combinaison de X pions en Y tentatives)
- La liste des couleurs disponibles avec leurs initiales

**Exemple de sortie attendue** :
```
================================================================
           MASTERMIND EN CONSOLE PHP (BTS SIO 1)
================================================================
Objectif : Deviner la combinaison secrète de 4 pions en 12 tentatives maximum.
Couleurs disponibles : 🔴 (R) 🟢 (V) 🔵 (B) 🟡 (J) 🟣 (P) ⚫ (N) 
================================================================
```

**💡 Aide** : Utilisez une boucle `foreach` avec l'index pour parcourir les tableaux et afficher chaque couleur avec son initiale.

---

### Étape 2 : Génération de la Combinaison Secrète

#### 2.1 Initialiser le tableau de la combinaison secrète
Créez un tableau vide `$combinaisonSecrete` qui stockera les initiales de couleur (R, V, B, etc.).

#### 2.2 Générer la combinaison aléatoirement
Utilisez une boucle `for` pour générer `LONGUEUR_CODE` pions :
- Utilisez `array_rand($initialesCouleurs)` pour obtenir un index aléatoire
- Ajoutez l'initiale correspondante au tableau `$combinaisonSecrete`

**💡 Aide** : `array_rand()` retourne un index aléatoire du tableau. Utilisez cet index pour récupérer l'initiale dans `$initialesCouleurs`.

**⚠️ Note** : Pour le débogage, vous pouvez temporairement afficher la combinaison secrète, mais n'oubliez pas de commenter cette ligne avant la remise !

---

### Étape 3 : Boucle Principale du Jeu

Créez une boucle `for` qui s'exécute de 1 à `MAX_TENTATIVES`. Cette boucle contiendra trois sous-blocs :

#### 3.1 Bloc de Saisie et Validation

##### 3.1.1 Initialisation
- Créez un tableau `$proposition` pour stocker la proposition du joueur
- Créez une variable booléenne `$valide` initialisée à `false`

##### 3.1.2 Boucle de validation
Utilisez une boucle `while (!$valide)` pour forcer une saisie valide :

1. **Lire la saisie** : Utilisez `readline()` pour demander au joueur sa proposition
   - Message : `"Entrez votre proposition (4 initiales, ex: RVBJ) : "`

2. **Nettoyer la saisie** :
   - Convertir en majuscules avec `strtoupper()`
   - Supprimer les espaces avec `str_replace(' ', '', $saisie)`

3. **Valider la longueur** :
   - Vérifier que `strlen($saisie) === LONGUEUR_CODE`
   - Si non valide, afficher un message d'erreur et utiliser `continue` pour recommencer

4. **Valider les caractères** :
   - Convertir la chaîne en tableau avec `str_split($saisie)`
   - Parcourir chaque caractère avec `foreach`
   - Vérifier avec `in_array()` que chaque caractère existe dans `$initialesCouleurs`
   - Si un caractère est invalide, afficher un message d'erreur et utiliser `break` pour sortir du `foreach`, puis `continue` pour recommencer la saisie

5. **Valider la saisie** : Si toutes les validations passent, mettre `$valide = true`

**Exemples de messages d'erreur** :
- `"Erreur : La proposition doit contenir exactement 4 caractères."`
- `"Erreur : Le caractère 'X' n'est pas une initiale de couleur valide."`

#### 3.2 Bloc d'Analyse (Algorithme Mastermind)

C'est la partie la plus complexe ! L'algorithme doit respecter la règle du **compte unique** : chaque pion ne peut être compté qu'une seule fois.

##### 3.2.1 Initialisation
- Initialisez `$bienPlace = 0` et `$malPlace = 0`
- Créez une copie de `$proposition` dans `$propositionAffichage` (pour l'affichage final, car `$proposition` sera modifiée)
- Créez une copie de `$combinaisonSecrete` dans `$secreteTravail` (pour pouvoir marquer les pions utilisés)

##### 3.2.2 Étape 1 : Calcul des bien placés (🔑)
Utilisez une boucle `for` pour comparer position par position :
- Si `$proposition[$i] === $secreteTravail[$i]` :
  - Incrémentez `$bienPlace`
  - **Marquez les pions utilisés** : mettez `$secreteTravail[$i] = null` et `$proposition[$i] = null`
  
**⚠️ Important** : Le marquage (mise à `null`) est essentiel pour éviter de compter deux fois le même pion.

##### 3.2.3 Étape 2 : Calcul des mal placés (⚪)
Utilisez une boucle `foreach` sur `$proposition` :
- Pour chaque pion de la proposition qui n'est **pas** `null` (donc pas déjà compté comme bien placé) :
  - Utilisez `array_search($couleurProp, $secreteTravail)` pour chercher cette couleur dans la combinaison secrète restante
  - Si trouvé (`$indexTrouve !== false`) :
    - Incrémentez `$malPlace`
    - **Marquez le pion de la secrète** : mettez `$secreteTravail[$indexTrouve] = null` pour éviter de le compter à nouveau

**💡 Explication** : `array_search()` retourne l'index de la première occurrence trouvée, ou `false` si non trouvé. Le marquage à `null` garantit qu'un pion de la secrète ne peut être utilisé qu'une seule fois.

#### 3.3 Bloc d'Affichage et Gestion de la Fin de Partie

##### 3.3.1 Affichage de la proposition en emojis
- Créez une chaîne vide `$affichageProposition`
- Parcourez `$propositionAffichage` avec `foreach`
- Pour chaque initiale :
  - Utilisez `array_search()` pour trouver l'index de l'initiale dans `$initialesCouleurs`
  - Utilisez cet index pour récupérer l'emoji correspondant dans `$emojisCouleurs`
  - Concaténez l'emoji à `$affichageProposition` (avec un espace)

##### 3.3.2 Affichage des indices
- Utilisez `str_repeat()` pour répéter l'emoji 🔑 `$bienPlace` fois
- Concaténez avec `str_repeat()` pour répéter l'emoji ⚪ `$malPlace` fois
- Stockez le résultat dans `$affichageIndices`

##### 3.3.3 Afficher les résultats
Affichez :
- `"Proposition : " . $affichageProposition`
- `"Indices     : " . $affichageIndices`

##### 3.3.4 Vérifier la victoire
- Si `$bienPlace === LONGUEUR_CODE`, le joueur a gagné :
  - Mettez `$victoire = true`
  - Utilisez `break` pour sortir de la boucle principale

**Exemple de sortie attendue** :
```
--- Tentative 1 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : RVBJ
Proposition : 🔴 🟢 🔵 🟡 
Indices     : 🔑 ⚪ ⚪ 
```

---

### Étape 4 : Affichage du Résultat Final

Après la boucle principale :

#### 4.1 Afficher la combinaison secrète en emojis
- Créez une chaîne vide `$affichageSecrete`
- Parcourez `$combinaisonSecrete` avec `foreach`
- Pour chaque initiale, utilisez la même méthode qu'à l'étape 3.3.1 pour convertir en emoji

#### 4.2 Afficher le message final
- Affichez un séparateur (`"================================================================\n"`)
- Si `$victoire === true` :
  - Affichez : `"🎉 FÉLICITATIONS ! Vous avez trouvé la combinaison secrète en X tentatives !"`
- Sinon :
  - Affichez : `"😭 DOMMAGE ! Vous avez atteint la limite de 12 tentatives."`
- Affichez : `"La combinaison secrète était : " . $affichageSecrete`
- Affichez un séparateur final

---

## 🧪 Tests à Effectuer

Avant de remettre votre travail, testez votre programme avec les scénarios suivants :

### Test 1 : Saisie invalide
- Tester avec une chaîne trop courte : `"RV"`
- Tester avec une chaîne trop longue : `"RVBJN"`
- Tester avec un caractère invalide : `"RVXJ"`
- Vérifier que les messages d'erreur s'affichent correctement

### Test 2 : Partie gagnante
- Jouer jusqu'à trouver la combinaison secrète
- Vérifier que le message de victoire s'affiche avec le bon nombre de tentatives

### Test 3 : Partie perdante
- Faire 12 tentatives incorrectes
- Vérifier que le message de défaite s'affiche et que la combinaison secrète est révélée

### Test 4 : Validation de l'algorithme
Testez manuellement avec une combinaison secrète connue (en décommentant la ligne de debug) :
- Combinaison secrète : `R V B J`
- Proposition : `B R V J`
- Résultat attendu : 1 🔑 (le J bien placé) et 2 ⚪ (le R et le V mal placés, le B ne compte pas car le J a déjà utilisé un pion)

---

## 📺 Exemple Complet d'Exécution

Voici un exemple complet d'exécution d'une partie de Mastermind pour vous donner une idée précise de l'interface utilisateur attendue :

```
================================================================
           MASTERMIND EN CONSOLE PHP (BTS SIO 1)
================================================================
Objectif : Deviner la combinaison secrète de 4 pions en 12 tentatives maximum.
Couleurs disponibles : 🔴 (R) 🟢 (V) 🔵 (B) 🟡 (J) 🟣 (P) ⚫ (N) 
================================================================

--- Tentative 1 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : rv
Erreur : La proposition doit contenir exactement 4 caractères.
Entrez votre proposition (4 initiales, ex: RVBJ) : RVBJN
Erreur : La proposition doit contenir exactement 4 caractères.
Entrez votre proposition (4 initiales, ex: RVBJ) : RVXJ
Erreur : Le caractère 'X' n'est pas une initiale de couleur valide.
Entrez votre proposition (4 initiales, ex: RVBJ) : RVBJ
Proposition : 🔴 🟢 🔵 🟡 
Indices     : 🔑 ⚪ 

--- Tentative 2 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : r v b n
Proposition : 🔴 🟢 🔵 ⚫ 
Indices     : 🔑 🔑 

--- Tentative 3 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : RVBN
Proposition : 🔴 🟢 🔵 ⚫ 
Indices     : 🔑 🔑 ⚪ 

--- Tentative 4 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : RVNB
Proposition : 🔴 🟢 ⚫ 🔵 
Indices     : 🔑 🔑 ⚪ ⚪ 

--- Tentative 5 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : RNVB
Proposition : 🔴 ⚫ 🟢 🔵 
Indices     : 🔑 🔑 🔑 ⚪ 

--- Tentative 6 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : RNBV
Proposition : 🔴 ⚫ 🔵 🟢 
Indices     : 🔑 🔑 🔑 🔑 

================================================================
🎉 FÉLICITATIONS ! Vous avez trouvé la combinaison secrète en 6 tentatives !
La combinaison secrète était : 🔴 ⚫ 🔵 🟢 
================================================================
```

### Exemple d'une partie perdante

Voici également un exemple de partie où le joueur n'a pas réussi à trouver la combinaison :

```
================================================================
           MASTERMIND EN CONSOLE PHP (BTS SIO 1)
================================================================
Objectif : Deviner la combinaison secrète de 4 pions en 12 tentatives maximum.
Couleurs disponibles : 🔴 (R) 🟢 (V) 🔵 (B) 🟡 (J) 🟣 (P) ⚫ (N) 
================================================================

--- Tentative 1 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : RVBJ
Proposition : 🔴 🟢 🔵 🟡 
Indices     : ⚪ 

--- Tentative 2 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : JBNV
Proposition : 🟡 🔵 ⚫ 🟢 
Indices     : ⚪ ⚪ 

--- Tentative 3 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : BVNJ
Proposition : 🔵 🟢 ⚫ 🟡 
Indices     : ⚪ ⚪ 

[... autres tentatives ...]

--- Tentative 12 / 12 ---
Entrez votre proposition (4 initiales, ex: RVBJ) : VJNB
Proposition : 🟢 🟡 ⚫ 🔵 
Indices     : ⚪ ⚪ ⚪ 

================================================================
😭 DOMMAGE ! Vous avez atteint la limite de 12 tentatives.
La combinaison secrète était : 🟣 🔴 🟡 ⚫ 
================================================================
```

### Points importants à observer dans ces exemples

1. **Gestion des erreurs** : Les messages d'erreur s'affichent immédiatement et la saisie est redemandée sans compter comme une tentative
2. **Nettoyage automatique** : Les espaces sont automatiquement supprimés (exemple : `"r v b n"` devient `"RVBN"`)
3. **Conversion en majuscules** : Les minuscules sont automatiquement converties en majuscules
4. **Affichage cohérent** : Les emojis sont toujours alignés et espacés de manière uniforme
5. **Indices** : Les indices sont affichés dans l'ordre : d'abord les 🔑 (bien placés), puis les ⚪ (mal placés)
6. **Message final** : Le message de victoire ou de défaite est clair et la combinaison secrète est toujours révélée

---

**Bon courage et bon développement ! 🎮**

