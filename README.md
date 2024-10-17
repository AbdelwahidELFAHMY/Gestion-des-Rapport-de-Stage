# Gestion des Rapports de Stage Numérisés

## Description
**Gestion des Rapports de Stage Numérisés** est une application web développée pour faciliter la gestion des rapports de stage fin d'études ou fin d'année. Elle permet aux étudiants de consulter et télécharger les rapports de stage, et aux administrateurs, chefs de département, et secrétaires de département de déposer et gérer ces rapports.

## Objectifs de l'application
- **Étudiants** : Rechercher, consulter et télécharger des rapports de stage au format PDF.
- **Administrateurs** : Déposer, modifier, et supprimer les rapports de stage. Gérer les informations des rapports et des étudiants.
- **Chefs de Département** : Dépôt et gestion des rapports de stage pour leur département.
- **Secrétaires de Département** : Gestion des rapports de stage spécifiques à leur filière, avec des options de filtrage et d'impression.

## Fonctionnalités

### Pour les Étudiants
- Rechercher des rapports de stage par filière, année, ou mots-clés.
- Télécharger les rapports au format PDF.
- Formulaire de recherche avancée disponible.

### Pour les Administrateurs
- Authentification sécurisée avec gestion des rôles (administrateur).
- Dépôt de rapports avec des détails tels que l'année, la filière, le titre et l'étudiant concerné.
- Modification et suppression des rapports déposés.
- Impression des listes de rapports filtrées par filière ou année.

### Pour les Chefs de Département
- Dépôt des rapports de stage en spécifiant les étudiants concernés, la filière, et le titre du projet.
- Modification et suppression des rapports déposés.
- Gestion des rapports pour leur département uniquement.

### Pour les Secrétaires de Département
- Consultation et gestion des rapports de stage déposés pour leur filière.
- Visualisation des rapports, impression et filtrage par année ou filière.
- Modification des informations des rapports si nécessaire.

## Architecture du Projet
- **Frontend** : Interfaces web intuitives pour les étudiants, administrateurs, chefs de département, et secrétaires de département.
- **Backend** : Gestion des rapports via des interfaces sécurisées.
- **Base de Données** : MySQL pour la gestion des utilisateurs, rapports, filières, niveaux, et rôles.

## Interfaces Principales
- **Page de Connexion** : Authentification des utilisateurs (étudiants, chefs de département, secrétaires de département, administrateurs).
- **Dashboard** : Différent selon le rôle (étudiant, chef de département, secrétaire de département, administrateur).
- **Déposer un Rapport** : Formulaire de dépôt pour les chefs de département.
- **Consulter un Rapport** : Interface de recherche et téléchargement pour les étudiants.
- **Gestion des Rapports** : Gestion des rapports pour les secrétaires de département.
- **Administration** : Tableau de bord avec gestion des rôles, des filières et des rapports pour les administrateurs.

## Technologies Utilisées
- **Frontend** : HTML, CSS, JavaScript
- **Backend** : PHP, MySQL
- **Base de Données** : MySQL

## Schéma de la Base de Données
![Relational Schema](./Schema_Relational_.png)  
