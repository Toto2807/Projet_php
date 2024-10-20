<?php
require_once '../vendor/autoload.php';
require_once '../app/Router.php';
require_once '../app/Controllers/ArticleController.php';
require_once '../app/Models/Article.php';

// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', 'root');

// Initialisation du routeur
$router = new app\Router();

// Déclaration des routes
$router->add('/', function() {
    echo "Welcome to the homepage!";
});

$router->add('/article', function() use ($pdo) {
    $controller = new app\Controllers\ArticleController($pdo);
    $controller->listArticles();
});

// Récupération de l'URL demandée
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Suppression de la barre oblique finale
$url = rtrim($url, '/');

// Détection du chemin complet jusqu'à public/index.php
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);

// Suppression de '/index.php' dans l'URL uniquement si présent
$url = str_replace($scriptDir . '/index.php', '', $url);

// Si l'URL est vide, rediriger vers '/'
if ($url === '' || $url === '/') {
    $url = '/';
}


// Lancement du routeur
$router->dispatch($url);
