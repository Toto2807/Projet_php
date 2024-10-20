<?php
namespace app;

class Router {
    private $routes = [];

    // Ajouter une route au routeur
    public function add($path, $callback) {
        $this->routes[$path] = $callback;
    }

    // Dispatcher la requête en fonction de l'URL
    public function dispatch($url) {
        if (array_key_exists($url, $this->routes)) {
            // Si la route existe, on appelle la fonction associée
            call_user_func($this->routes[$url]);
        } else {
            // Si la route n'existe pas, on affiche une erreur 404
            http_response_code(404);
            echo "Erreur 404 : Page non trouvée.";
        }
    }
}
