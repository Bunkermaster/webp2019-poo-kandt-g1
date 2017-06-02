# Procédures

## Remarques
* Attention aux responsabilités des classes (ex: le controller nourrit les models, les models ne tapent pas dans $_POST directement).
* La gestion des erreurs doit être pensée en amont. Anticiper les problèmes catastrophiques fait partie du boulot.

## Ajouter une fonctionnalité
1. Créer la table, si elle n'existe pas.
1. Préparer la requete SQL en dur dans MySQL. Pas de variabilisation.
1. Ajouter dans le model, la méthode qui correspond au traitement souhaité. Faire attention aux controles des données (données disponibles et obligatoires). Variabiliser la requête avec des bind PDO. 
1. Ajouter dans le controller, la méthode d'action qui correspond à la fonctionnalité souhaitée. Faire attention aux méthodes HTTP, au flux de données (entrées, sorties)
1. Créer la vue (PHP ou Twig), apporter une attention particulière aux données qui sont utilisées dans notre vue.
1. Ajouter la route dans le FrontController
1. Optionnel: rajouter les liens vers la nouvelle route dans les pages existantes, si besoin.
1. Tester.