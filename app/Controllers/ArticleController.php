namespace app\Controllers;

use app\Models\Article;
use twig\Environment;
use twig\Loader\FilesystemLoader;

class ArticleController {
    private $articleModel;
    private $twig;

    public function __construct($pdo) {
        $this->articleModel = new Article($pdo);

        // Configuration de Twig
        $loader = new FilesystemLoader(__DIR__ . '/../Views'); // Utilisez un chemin absolu
        $this->twig = new Environment($loader);
    }

    // Affiche la liste de tous les articles
    public function listArticles() {
        $articles = $this->articleModel->getAllArticles();
        echo $this->twig->render('articles.twig', ['articles' => $articles]);
    }
}
