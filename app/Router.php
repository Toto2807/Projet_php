<?php
namespace app;

class Router {
    private $routes = [];

    public function add($path, $callback) {
        $this->routes[$path] = $callback;
    }

    public function dispatch($url) {
    
        if (array_key_exists($url, $this->routes)) {
            call_user_func($this->routes[$url]);
        } else {
            http_response_code(404);
            echo "Erreur 404 : Page non trouvée.";
        }
    }      
}
