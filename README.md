# gestion-des-ligues
Gestion des membres de l'association sportive


## Contexte
- Diplôme : BTS SIO
- Ecole : ITIC Paris
- Année : 2014/2015


## Enoncé
Créer une application simple de création, modification des membres d'une association sportive, par les administrateurs des ligues


## Arborescence des fichiers

### /
- index.php : page de connexion utilisateur
- gestion-des-ligues-php.sql : fichier SQL de la base de données

### /bootstrap
Fichiers CSS et JS de la librairie Bootstrap et jQuery

### /include
- ajout.php : script d'ajout d'un membre à une ligue
- connexion.php : script de connexion de l'utilisateur
- modifInfoAdmin.php : script de moficiation des informations de l'administrateur
- modifInfoMembre.php : script de modification d'un membre d'une ligue
- sql.php : classe de toutes les requêtes SQL de l'application et connexion à la base de données

### /vues
- admin.php : page de la liste des membres de la ligue de l'administrateur
- ajouterMembre.php : page d'ajout d'un nouveau membre de la ligue de l'administrateur
- info_admin.php : page des informations de l'administrateur
- membre.php : page des informations du membre
- supprimerUser.php : script de suppression d'un membre de la ligue


### Utilisation

Il y a deux types d'utilisateurs différents :
- les membres : ils peuvent seulement modifier leurs informations et voir leur ligue
- les administrateurs : ils gèrent les membres de leur ligue, soit un admin par ligue

Lorsqu'un nouveau membre est ajouté dans une ligue, le mot de passe par défaut est azerty.


## Installation

1. Créez un fichier .env.php à la racine du dossier, copiez le code suivant et remplissez les informations de votre base de données :

``
    define('BDD_USER', ''); 
    define('BDD_PASSWORD', ''); 
    define('BDD_HOST', '');  
    define('BDD_PORT', '');  
    define('BDD_NAME', 'gestion-des-ligues-php');
``

2. Importez le fichier gestion-des-formations-php.sql dans votre base de données

3. Testez

Les ligues sportives sont :
- Football
- VolleyBall
- Cyclisme
- Natation

Connexion des administrateurs :
- login : [nom_ligue_en_minuscule]@mail.com
- mot de passe : azerty


## Optimisations pour la V2
- Design
- Version en Symfony
- Un header et un footer commun
- Des mails d'identification uniques
- Les membres peuvent appartenir à plusieurs ligues
- Déplacer /vues/supprimerUser.php dans /include
- D'autres fonctionnalités : créer/modifier/supprimer des administrateurs, créer/modifier/supprimer des ligues
