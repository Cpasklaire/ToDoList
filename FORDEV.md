# Pour les contributeurs
​
# Require
​
- Avoir lancer le projets (voir README)
- PHPUnit 9.5
​
# Lancer le projet en mode developpeur
​
Créé une base de données test (par défaut : ToDoList_test).
Insérer les fixtures.

# Comment contribuer au projet ?

ToDo &Co ne demande qu'à étre améliorer ! Quelques soit vos idées, elles sont les bienvenue.
Avant de vous lancer créé une nouvelle branch git https://github.com/Cpasklaire/ToDoList à votre nom (ou pseudo). Si vous souhaitez version votre contribution vous pouvez rajouter des branch sur le modele "votrenom_cequevousfaite".

Il vous ai demander de respecter le structure MCV du projet actuel et les normes de qualités au moment où vous coder. Pour chaque ajout, n'oublier pas de mettre les tests à jours ! 
Pour les tests, le dossiers /test est à la racine du projet. La couverture est dans public/test-coverage.

​# Commande utile
```bash
vendor/bin/phpunit
vendor/bin/phpunit --coverage-html public/test-coverage
```

Vous trouverez dans le docier .doc les diagramme UML et le rapport d'audit qui vous aiderons à trouver des idée de contribution.

Amusez vous bien ! 