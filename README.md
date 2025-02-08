# Gestion des Vaisseaux Spatiaux - Starship API

Ce projet est une application permettant de gérer une flotte de vaisseaux spatiaux, incluant les utilisateurs, les pilotes et les vaisseaux. Le système offre des fonctionnalités comme la gestion des accès, la journalisation des actions et l'application des principes de conformité aux données (RGPD). Le backend est développé en **PHP avec Symfony**, et la base de données utilisée est **MySQL**.

## Description des Choix Techniques

### Backend - PHP avec Symfony & MySQL
* **Symfony** est utilisé pour développer une API REST robuste et gérer les opérations backend.
* **MySQL** est utilisé pour stocker toutes les données liées aux utilisateurs, pilotes et vaisseaux.
* **Doctrine ORM** est employé pour interagir avec la base de données et simplifier les opérations CRUD.
* **Composer** est utilisé pour gérer les dépendances et structurer le projet.

### Gestion des Authentifications et Permissions
* **LexikJWTAuthenticationBundle** permet la gestion des tokens JWT pour sécuriser l'API.
* **Rôles et permissions** sont mis en place pour restreindre les accès selon les profils (Admin, Pilote, Ingénieur).
* **Monolog** est utilisé pour enregistrer les actions sensibles (connexion, modification de données critiques).

## Fonctionnalités Principales
* **Authentification et gestion des utilisateurs** : Système sécurisé avec JWT.
* **Gestion des vaisseaux** : Création, modification et affichage des vaisseaux spatiaux.
* **Suivi des accès et journalisation** : Enregistrement des actions critiques pour garantir la traçabilité.
* **Droit à l'oubli et anonymisation des données** : Possibilité pour les utilisateurs de demander la suppression ou l’anonymisation de leurs données.
* **Gestion des consentements** : API permettant aux utilisateurs de gérer leurs préférences en matière de stockage et d’utilisation des données.

## Prérequis

Avant de démarrer le projet, assure-toi d'avoir installé les éléments suivants :

* **PHP** 8.1 ou supérieur
* **Composer** pour gérer les dépendances
* **Symfony CLI** pour exécuter l’application
* **MySQL** 8.0 ou supérieur
* **Postman** (optionnel, pour tester l’API)

## Instructions pour l'installation

### Cloner le projet
```bash
git clone <lien_du_repo>
cd starship
```

Démarrer le serveur 
```bash
symfony serve
```
