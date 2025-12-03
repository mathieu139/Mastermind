<?php

// =================================================================
// 1. INITIALISATION DES DONNÉES
// =================================================================

$questions = [
    "Quel langage est principalement utilisé pour le style des pages web ?|HTML|CSS|Python|SQL|2",
    "Que signifie le sigle WWW ?|World Wide Web|Web World Wide|Wide Web World|World Web Wide|1",
    "Quelle balise HTML permet de créer un lien hypertexte ?|link|a|href|url|2",
    "En PHP, quel signe commence une variable ?|%|@|#|$|4",
    "Quel est le port standard pour le protocole HTTP ?|21|22|80|443|3",
    "Quel composant de l'ordinateur stocke les données à long terme ?|RAM|Processeur|Disque Dur|Carte Graphique|3",
    "Que signifie SIO dans BTS SIO ?|Services Informatiques aux Organisations|Sciences Informatiques et Ordinateurs|Systèmes Internes et Opérationnels|Services Internet et Outils|1",
    "Quel système d'exploitation est open-source ?|Windows|macOS|Linux|iOS|3",
    "En réseau, que signifie IP ?|Internet Protocol|Internal Process|Interconnection Point|Intranet Protocol|1",
    "Quelle fonction PHP permet d'afficher du texte ?|print_line()|echo|write()|display()|2",
    "Quel langage est exécuté côté client ?|PHP|Java|JavaScript|C#|3",
    "Combien d'octets y a-t-il dans un Kilo-octet (Ko) selon la norme historique ?|1000|1024|8|256|2",
    "Quel est l'équivalent binaire du chiffre décimal 5 ?|100|110|101|011|3",
    "Quelle commande permet de lister les fichiers sous Linux ?|cd|mkdir|ls|pwd|3",
    "Que signifie SQL ?|Structured Query Language|Simple Question Language|Style Query Layout|System Quality Level|1",
    "Quel est le rôle du DNS ?|Sécuriser la connexion|Traduire des noms de domaine en IP|Stocker les emails|Gérer les bases de données|2",
    "En programmation objet, comment appelle-t-on un modèle d'objet ?|Une instance|Une méthode|Un attribut|Une classe|4",
    "Quel caractère termine une instruction en PHP ?|.|:|,|;|4",
    "Lequel n'est PAS un navigateur web ?|Firefox|Chrome|Apache|Edge|3",
    "En HTML, quelle balise crée une liste à puces non ordonnée ?|ol|ul|li|list|2"
];
$question = 0;
foreach ((array) $question as $questions) {
    list($question, $key, $key1, $key2, $gecos, $home, $shell,$nu) = explode(":", $data)
    echo $reponse[0];
    #. $reponse[1] . $reponse[2] . $reponse[3] . $reponse[4];
}