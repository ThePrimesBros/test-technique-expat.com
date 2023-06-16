# Test Technique

Voici mon code pour le test technique d'Expat.com

Avant de commencer, assurez-vous d'avoir installé les éléments suivants :

    PHP (version 7.4)
    MySQL (version 5.7)
    Node.js (version 18.16)
    Composer (version 2.2.6)

## Installation

Clonez ce dépôt sur votre machine locale :

    `git clone git@github.com:ThePrimesBros/test-technique-expat.com.git`

Accédez au répertoire du projet :

Installez les dépendances PHP en utilisant Composer :

    `composer install`

Installez les dépendances JavaScript en utilisant npm :

    `npm install`

Démarrez le projet :

    `docker compose up -d --build`

Importez la base de données une fois le docker lancé :

    `node migrations.js`

Importez les fixtures une fois la base créé :

    `node fixtures.js`

## Utilisation

Accédez à l'application dans votre navigateur en utilisant l'URL http://localhost:80.<br />
Un adminer a aussi été mis en place, en utilisant l'URL : http://localhost:8080.
