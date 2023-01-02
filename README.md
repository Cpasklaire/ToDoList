# ToDoList
 OpenClassRoom - Dev PHP - Projet 7 - Améliorez une application existante de ToDo & Co
​
# Require
​
- Symfony 6 (and CLI)
- MySQL 8
- Composer
​
# Lancer le projet
​
Cloner le projet, installer les dépendances
Modifier le .env selon votre configuration
​
```bash
brew install symfony-cli/tap/symfony-cli (mac OS)
git clone https://github.com/Cpasklaire/ToDoList.git ToDoList
cd ToDoList
composer install
cp .env.example .env
vi .env
```
​
Préparer la base de données
​
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
symfony server:start
```
​
# Pour les developpeurs
Vou avez besoin de PHPUnit 9.5

Créé une base de données test (par défaut : ToDoList_test).
Insérer les fixtures.

L'architecture du projet est en MVC.
src
    |_Controller
    |_DataFixtures
    |_Entity
    |_Form
    |_Repository

templates
    |_default
    |_security
    |_task
    |_user

Pour les tests, le dossiers /test est à la racine du projet. La couverture est dans public/test-coverage
commande utile
```bash
vendor/bin/phpunit
vendor/bin/phpunit --coverage-html public/test-coverage
```