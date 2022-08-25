<?php

use M2i\Mvc\App;

require __DIR__.'/../vendor/autoload.php';

// Dossier du projet à changer peut être...
define('BASE_URL', '/php-oo-main/13-tp/public');

$app = new App();
$app->setBasePath(BASE_URL);

$app->addRoutes([
    // @todo Créer une page d'accueil: Il faut un controller (nouvelle classe), une méthode et une vue.
    // Poser une navigation (views/partials/header par exemple) qu'on peut réutiliser sur les autres pages
    // comme la liste utilisateur.
    ['GET', '/', 'BookController@list'],
    ['GET', '/book/[:id]', 'BookController@show'],
    ['GET|POST', '/create', 'BookController@create'],
    ['GET|POST', '/book/[:id]/edit', 'BookController@edit'],
    ['GET|POST', '/book/[:id]/delete', 'BookController@delete'],
    ['GET|POST', '/search', 'SearchController@search'],
]);

$app->run();
