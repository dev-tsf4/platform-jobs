# Présentation

![](doc/screenshot.jpg)

## But de l'exercice

Simple exercice, afin de travailler sur un objet de filtre de résultat, facilement adaptable à d'autre projet. 

## Requirements
* PHP >= 7.1
* MySQL >= 5.7

## Installation du projet dans votre environnement local
Cloner le projet.

```
git clone https://github.com/dev-tsf4/platform-jobs.git
```

Accéder au répertoire du projet, récupérer les dépendances avec composer.

```
composer install
```

Editer le fichier .env à la racine du projet et changer les paramètres d'accès à votre base de données. 

```
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
```
Construire la base de données
```
php bin/console doctrine:database:create
```
Construire le schéma (tables, charger les fixtures)
```
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
```
Lancer le serveur
```
php bin/console server:run
```

## Website

### Liste des URLs

- http://127.0.0.1:8000/nos-jobs
- http://127.0.0.1:8000/nos-jobs/{slug}

## Todo

- Sauvegarder les critères de recherche
- Sécuriser le formulaire de recherche
- ...