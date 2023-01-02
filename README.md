[![Codacy Badge](https://app.codacy.com/project/badge/Grade/f8484e8d9d9c46a995760a5f33b997c3)](https://www.codacy.com/gh/Cpasklaire/ToDoList/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Cpasklaire/ToDoList&amp;utm_campaign=Badge_Grade)

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