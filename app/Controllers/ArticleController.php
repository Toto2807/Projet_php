<?php
namespace App\Controllers;

use app\Models\Article;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ArticleController {
    private $articleModel;
    private $twig;

    public function __construct($pdo) {
        $this->articleModel = new Article($pdo);

        // Configuration de Twig
        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    // Affiche la liste de tous les articles
    public function listArticles() {
        $articles = $this->articleModel->getAllArticles();
        echo $this->twig->render('articles.twig', ['articles' => $articles]);
    }

    // Affiche les articles par catégorie
    public function listArticlesByCategory($category) {
        $articles = $this->articleModel->getArticlesByCategory($category);
        echo $this->twig->render('articles.twig', ['articles' => $articles]);
    }
}