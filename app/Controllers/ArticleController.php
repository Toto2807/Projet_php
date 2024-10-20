<?php
namespace app\Controllers;

use app\Models\Article;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ArticleController {
    private $articleModel;
    private $twig;

    public function __construct($pdo) {
        $this->articleModel = new Article($pdo);

        $loader = new FilesystemLoader('../app/Views');
        $this->twig = new Environment($loader);
    }

    public function listArticles() {
        $articles = $this->articleModel->getAllArticles();
        echo $this->twig->render('articles.twig', ['articles' => $articles]);
    }     
}