<?php
require_once '../vendor/autoload.php';
require_once '../app/Router.php';
require_once '../app/Controllers/ArticleController.php';
require_once '../app/Models/Article.php';

$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', 'root');

$router = new app\Router();

$router->add('/', function() {
    echo "Welcome to the homepage!";
});

$router->add('/articles', function() use ($pdo) {
    $controller = new app\Controllers\ArticleController($pdo);
    $controller->listArticles();
});

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$url = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$scriptDir = dirname($_SERVER['SCRIPT_NAME']);

$url = str_replace($scriptDir . '/index.php', '', $url);

if ($url === '' || $url === '/') {
    $url = '/';
}


$router->dispatch($url);

